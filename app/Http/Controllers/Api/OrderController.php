<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Store;
use App\Models\Schedule;
use App\Models\ScheduleTime;
use App\Models\OrderDetail;
use App\Models\DeliveryFees;
use App\Http\Resources\OrderListResource;
use App\Http\Resources\ScheduleResource;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use Mail;

class OrderController extends Controller
{
    public $success = 200;
    public $error = 404;
    public $validate_error = 401;

    public function order(Request $request)
    {
        $user = Auth::user();
        $cart = $request->cart;
        $order_data = [];
        $order_detail_data=[];
        if ($cart) {
            try {
                $currentDateTime = Carbon::now();
                $newDateTime = Carbon::now()->addMinutes(5);
                $order_data['user_id']=$user->id;
                $order_data['receiver_name']=$user->firstname.' '.$user->lastname;
                $order_data['receiver_address']=$request->address;
                $order_data['receiver_province']=$request->province;
                $order_data['receiver_phone']=$request->receiver_phone;
                $order_data['receiver_city']=$request->city;
                $order_data['receiver_zipCode']=$request->zipCode;
                $order_data['order_date'] =  $request->order_date;
                $order_data['order_time'] =  Carbon::now();
                $order_data['cancel_time'] =  Carbon::now()->addMinutes(10);
                $order_data['payment'] =  $request->payment;
                $order_data['date'] =  $request->date;
                $order_data['time_to'] =  $request->time_to;
                $order_data['time_from'] =  $request->time_from;
                $order_data['tip'] =  $request->tip;
                $order_data['comment'] =  $request->comment;
                $order_data['amount'] = 0;
                $order_data['totalAmount'] = 0;
                $order_data['order_status'] = 'Placed';
                $order=Order::create($order_data);
                $updateOrderID = Order::where('id', $order->id)->update(['order_id' => substr("$request->city", 0, 3).'-'.Carbon::now()->format('mdY').'-'.$order->id.'-'.rand(10000, 99999)]);
                $order_total_cost = 0;
                foreach ($cart as $prod) {
                    $productdata = Product::find($prod['product_id']);
                    if($productdata)
                    {
                        $order_detail_data['order_id'] = $order->id;
                        $order_detail_data['product_id'] = $prod['product_id'];
                        $order_detail_data['store_id'] = $productdata->store_id;
                        $order_detail_data['user_id']= $user->id;
                        $order_detail_data['quantity'] = $prod['quantity'];
                        $order_detail_data['delivery_fees'] = $productdata->cost;
                        $order_detail_data['order_status'] = 'placed';
                        $order_detail_data['price'] = $productdata->price;
                        $order_detail = OrderDetail::create($order_detail_data);
                    }
                    
                    $get_order = Order::find($order->id);
                    $total_cost = $get_order->amount + ($prod['quantity'] * $productdata->price);
                    $fee = DeliveryFees::sum('price');
                    $bookUpdate=Order::where('id', $order->id)->update(['amount' => $total_cost, 'all_delivery_fees' => $fee]);
                }
                $get_order = Order::find($order->id);
                $total_tax = number_format((13/100) * $get_order->amount,2);
                $totalAmount =  $total_tax + $get_order->amount + $get_order->all_delivery_fees + $request->tip;
                $taxUpdate=Order::where('id', $order->id)->update(['sales_tax' => $total_tax, 'totalAmount' => $totalAmount]);
            }
          
            catch (\Exception $e) {
                if(isset($order))
                {
                    return response()->json(['message' => $e->getMessage(), 'status' => 'error'], $this->error);
                }
            }
        }
        else
        {
            return response()->json(['message' => 'No item in cart','order_data'=>$cart, 'status' => 'error'], $this->error);
        }

        if($order){
            $message = "Your Order Has Been Placed";
            $data_array = [
                'title' => 'Order Placed',
                'body' => $message,
                'type' => 'placed',
                'user' => $user,
                'id' => $order->id,
                'description' => $message
            ];
            $user->sendNotification($user->id, $data_array, $message);
            $notify = NotificationUser::create([
                'user_id' => $user->id,
                'send_to' => $user->id,
                'message' => $message,
                'title' => 'Order Placed',
                'type' => "placed",
                'redirect' => $order->id
            ]);
            $getOrder = Order::where('id', $order->id)->with('orderdetail')->first();
            $storeId = $getOrder->orderdetail[0]->store_id;
            $storeName = Store::find($storeId)->name;
            $data = array(
                'order'=>"$getOrder", 
                'orderdetail' => $getOrder->orderdetail, 
                'receiver_address' => $getOrder->receiver_address, 
                'receiver_province' => $getOrder->receiver_province,
                'receiver_city' => $getOrder->receiver_city,
                'receiver_zipCode' => $getOrder->receiver_zipCode,
                'date' => $getOrder->date, 
                'time_to' => $getOrder->time_to, 
                'time_from' => $getOrder->time_from, 
                'order_id' => $getOrder->order_id, 
                'amount' => $getOrder->amount, 
                'sales_tax' => $getOrder->sales_tax,
                'all_delivery_fees' => $getOrder->all_delivery_fees,
                'tip' => $getOrder->tip,
                'totalAmount' => $getOrder->totalAmount
            );
            Mail::send('ordermail', $data, function($message) use($getOrder, $storeName) {
                $message->to("quicsirv@gmail.com", "Quic Sirv")->subject("Order placed for $storeName - Order # $getOrder->order_id");
            });
            return response()->json(['message' => 'Your Order is created Successfully','order_data'=>$order_data,'order_id'=>$order->id,'cart_detail'=>$cart, 'status' => 'success'], $this->success);
        }
        else{
            return response()->json(['message' => 'Order not Placed', 'status' => 'error'], $this->error);
        }
    }
    
    public function all_order(){
        $user = Auth::user();
        // $order = OrderDetail::where('user_id', $user->id)->with(['orderdata','user', 'product', 'product.images'])->get();
        $order_list = Order::where('user_id', $user->id)->with(['orderdetail', 'user', 'orderdetail.product', 'orderdetail.product.images'])->get();
        $order_list =  OrderListResource::collection($order_list);
        return response()->json([
            'my_order' => $order_list,
            // 'order_list' => $order_list,
            'message' => 'My All Order',
            'status' => 'success'
        ], $this->success);
    }
    
    // public function saveStoreId(){
    //     $getOrderDetail = OrderDetail::get();
    //     foreach($getOrderDetail as $orderdetail){
    //         $getstoreId = Product::where('id', $orderdetail->product_id)->first();
    //         $saveStoreId = OrderDetail::where('id', $orderdetail->id)->update(['store_id' => $getstoreId->store_id]);
    //     }
    //     return "success";
    // }
    
    public function order_cancel()
    {
        $check_order = Order::where('cancel_time', '<=', Carbon::now())->with(['orderdetail', 'user', 'orderdetail.product', 'orderdetail.product.images'])->get();
        foreach($check_order as $order){
            $update = Order::where('id', $order->id)->update(['cancel_button' => 1]);
        }
        $order_list =  OrderListResource::collection($check_order);
        return response()->json([
            'data' => $order_list,
            'message' => 'Button Disabled',
            'status' => 'success'
        ], $this->success);
    }
    
    public function cancelOrder(Request $request)
    {
        $user = Auth::user();
        $order = Order::find($request->id);
        if($order){
            $order = Order::where('id', $request->id)->update(['order_status' => 'Cancelled', 'cancel_button' => 1, 'cancel_time' => Carbon::now()]);
            $orderDetail = OrderDetail::where('order_id', $request->id)->get();
            foreach($orderDetail as $detail){
                $orderDetail = OrderDetail::where('id', $detail->id)->update(['order_status' => 'Cancelled']);
            }
            $message = "Your Order Has Been Cancelled";
            $data_array = [
                'title' => 'Order Cancelled',
                'body' => $message,
                'type' => 'cancelled',
                'user' => $user,
                'id' => $request->id,
                'description' => $message
            ];
            $user->sendNotification($user->id, $data_array, $message);
            $notify = NotificationUser::create([
                'user_id' => $user->id,
                'send_to' => $user->id,
                'message' => $message,
                'title' => 'Order Cancelled',
                'type' => "cancelled",
                'redirect' => $request->id
            ]);
            return response()->json([
                'message' => 'Order Cancel Successfully',
                'status' => 'success'
            ], $this->success);
        }else{
            return response()->json([
                'message' => 'Order Not Exists Against this ID',
                'status' => 'error'
            ], $this->error);
        }
    }
    
    public function deliveryFees(){
        $fees = DeliveryFees::sum('price');
        if($fees){
            return response()->json([
                'delivery' => $fees,
                'message' => 'Delivery Fees',
                'status' => 'success',
            ], $this->success);
        }else{
            return response()->json([
                'delivery' => 0,
                'message' => 'Delivery Fees',
                'status' => 'success',
            ], $this->success);
        }
        
    }
    
    public function allschedule()
    {
        $data = Schedule::with('times')->get();
        return response()->json([
            'time' => $data,
            'message' => 'Schedule Time For Delivery',
            'status' => 'success',
        ], $this->success);
    }
    
    public function scheduletime(Request $request)
    {
        $data = ScheduleTime::where('schedule_id', $request->schedule_id)->with('dates')->get();
        $all_data = ScheduleResource::collection($data);
        return response()->json([
            'times' => $all_data,
            'message' => 'Schedule Time For Delivery',
            'status' => 'success',
        ], $this->success);
    }

}
