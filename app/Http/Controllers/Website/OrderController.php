<?php

namespace App\Http\Controllers\Website;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->get();

        if ($cart->isEmpty()) {
            return back()->with('error', 'No items in cart');
        }

        DB::beginTransaction();
        try {
            // ✅ Create Order
            $currentDateTime = Carbon::now();
            $order = Order::create([
                'user_id' => $user->id,
                'receiver_name' => $request->firstname.' '.$request->lastname,
                'receiver_company_name' => $request->receiver_company_name,
                'receiver_country' => $request->receiver_country,
                'receiver_city' => $request->receiver_city,
                'receiver_address' => $request->receiver_address,
                'receiver_district' => $request->receiver_district,
                'receiver_phoneNo' => $request->receiver_phoneNo,
                'receiver_email' => $request->receiver_email,
                'receiver_zipCode' => $request->receiver_zipCode,
                'order_date' => $currentDateTime,
                'comment' => $request->comment,
                'amount' => 0,
                'order_status' => 'Initial',
            ]);

            Order::where('id', $order->id)->update([
                'order_id' => substr($request->receiver_city, 0, 3).'-'.Carbon::now()->format('mdY').'-'.$order->id.'-'.rand(10000, 99999)
            ]);

            $order_total_cost = 0;
            foreach ($cart as $prod) {
                $productdata = Product::find($prod['product_id']);
                if ($productdata) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $prod['product_id'],
                        'user_id' => $user->id,
                        'quantity' => $prod['quantity'],
                        'order_status' => 'placed',
                        'price' => $prod['unit_price'],
                    ]);
                }
                $order_total_cost += $prod['total'];
            }

            $order->update(['amount' => $order_total_cost]);
            DB::commit();

            // ✅ Safepay SDK
            $safepay = new \Safepay\SafepayClient([
                "api_key" => env("SAFEPAY_SECRET_KEY"),
                "api_base" => env("SAFEPAY_ENVIRONMENT") === "production"
                    ? "https://api.getsafepay.com"
                    : "https://sandbox.api.getsafepay.com",
            ]);

            // 1️⃣ Create session (tracker)
            $session = $safepay->order->setup([
                "merchant_api_key" => env("SAFEPAY_PUBLIC_KEY"),
                "intent" => "CYBERSOURCE",
                "mode" => "payment",
                "currency" => "PKR",
                "amount" => (int) round($order_total_cost * 100), // paisa
            ]);

            // 2️⃣ Attach metadata (Order ID save karwana)
            $safepay->order->metadata($session->tracker->token, [
                "data" => [
                    "order_id" => (string) $order->id,
                ],
            ]);

            // 3️⃣ TBT token
            $tbt = $safepay->passport->create();

            // 4️⃣ Checkout URL
            $checkoutURL = \Safepay\Checkout::constructURL([
                "environment" => env("SAFEPAY_ENVIRONMENT", "sandbox"),
                "tracker" => $session->tracker->token,
                "tbt" => $tbt->token,
                "source" => "hosted",
                "redirect_url" => url("/safepay-callback/$order->id"),
                "cancel_url" => url("/checkout"),
                "branding" => [
                    "logo_url" => url("public/website/assets/img/logo/logo001.png"),
                    "primary_color" => "#FF5733",       // Header / highlight color
                    "button_color" => "#28a745",        // Payment button color
                    "font_family" => "Arial, sans-serif" // Optional font
                ]
            ]);

            return redirect()->away($checkoutURL);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/cart')->with('error', $e->getMessage());
        }
    }

    // ✅ Callback using SafepayClient

    public function safepayCallback(Request $request, $id)
    {
        $tracker = $request->input('tracker');
        $status  = $request->input('status');
        // ✅ Metadata se order_id nikaal lo
        $orderId = $id ?? null;
    
        if (!$orderId) {
            return redirect('/')->with('error', 'Order ID not found in Safepay!');
        }
    
        $order = Order::find($orderId);
        if (!$order) {
            return redirect('/')->with('error', 'Order not found!');
        }
    
        if ($orderId) {
            $user = auth('web')->user();
            if ($user) {
                Cart::where('user_id', $user->id)->delete();
            }
            $order->update(['order_status' => 'Placed']);
            return redirect("thanks/{$order->order_id}")
                ->with('success', 'Payment successful!');
        } else {
            $order->update(['order_status' => 'Payment Failed']);
            return redirect('/checkout')->with('error', 'Payment failed!');
        }
    }

}