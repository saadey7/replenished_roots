<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Order;
use App\Models\OrderDetail;
class NotificationListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $order = Order::where('id', $this->redirect)->first();
        
        return[
         'id'=>$this->redirect,
         'title'=>$this->title,
         'order_uuid'=>$this->order_uuid,
         'user_id'=>$this->user->id, 
         'email'=>$this->user->email, 
         'name'=>$this->user->name,
         'image'=>$this->user->image,  
         'message'=>$this->message,
         'type'=>$this->type,
         'status'=>$this->status,
         'order' => $this->order,
         'time'=>$this->created_at->format('H:i')

        ];

    }
}
