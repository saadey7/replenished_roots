<?php

namespace App\Http\Controllers\Website;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request){
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->get();
        $order_data = [];
        $order_detail_data=[];
        if ($cart) {
            try {
                $currentDateTime = Carbon::now();
                $newDateTime = Carbon::now()->addMinutes(5);
                $order_data['user_id']=$user->id;
                $order_data['receiver_name']=$request->firstname.' '.$request->lastname;
                $order_data['receiver_company_name']=$request->receiver_company_name;
                $order_data['receiver_country']=$request->receiver_country;
                $order_data['receiver_city']=$request->receiver_city;
                $order_data['receiver_address']=$request->receiver_address;
                $order_data['receiver_district']=$request->receiver_district;
                $order_data['receiver_phoneNo']=$request->receiver_phoneNo;
                $order_data['receiver_email']=$request->receiver_email;
                $order_data['receiver_zipCode']=$request->receiver_zipCode;
                $order_data['order_date'] =  $currentDateTime;
                $order_data['comment'] =  $request->comment;
                $order_data['amount'] = 0;
                $order_data['order_status'] = 'Placed';
                $order=Order::create($order_data);
                $updateOrderID = Order::where('id', $order->id)->update(['order_id' => substr("$request->receiver_city", 0, 3).'-'.Carbon::now()->format('mdY').'-'.$order->id.'-'.rand(10000, 99999)]);
                $order_total_cost = 0;
                foreach ($cart as $prod) {
                    $productdata = Product::find($prod['product_id']);
                    if($productdata)
                    {
                        $order_detail_data['order_id'] = $order->id;
                        $order_detail_data['product_id'] = $prod['product_id'];
                        $order_detail_data['user_id']= $user->id;
                        $order_detail_data['quantity'] = $prod['quantity'];
                        $order_detail_data['order_status'] = 'placed';
                        $order_detail_data['price'] = $prod['unit_price'];
                        $order_detail = OrderDetail::create($order_detail_data);
                    }
                    
                    $get_order = Order::find($order->id);
                    $total_cost = $get_order->amount + $prod['total'];
                    $bookUpdate=Order::where('id', $order->id)->update(['amount' => $total_cost]);
                }
            }
            catch (\Exception $e) {
                if(isset($order))
                {
                    $order->delete();
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
        }
        else
        {
            return redirect()->back()->with('error' , 'No item in cart');
        }

        if($order){
            return redirect()->back()->with('success' , 'Your Order is created Successfully');
        }
        else{
            return redirect()->back()->with('error' , 'Order not Placed');
        }
    }
        
}