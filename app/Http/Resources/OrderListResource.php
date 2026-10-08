<?php

namespace App\Http\Resources;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use Illuminate\Http\Resources\Json\JsonResource;
class OrderListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = Auth::user();
        $order_detail = OrderDetail::where('user_id', $user->id)->with(['orderdata','user', 'product', 'product.images'])->get();
        return[
                "id"=>$this->id,
                "order_id"=>$this->order_id,
                "order_image" => $this->orderdetail[0]->product->images[0]->image,
                "description" => $this->orderdetail[0]->product->description,
                "user_id"=>$this->user_id,
                "order_date"=>$this->order_date,
                "cancel_button"=>$this->cancel_button,
                "order_time"=>$this->order_time,
                "receiver_name"=>$this->receiver_name,
                "receiver_address"=>$this->receiver_address,
                "amount"=>$this->amount,
                "comment"=>$this->comment,
                "sales_tax"=>$this->sales_tax,
                "all_delivery_fees"=>$this->all_delivery_fees,
                "tip"=>$this->tip,
                "totalAmount"=>$this->totalAmount,
                "order_status"=>$this->order_status,
                "orderDetail"=>$this->orderdetail,
           ];
    }
}
