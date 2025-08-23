<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'order_id',
        'receiver_name',
        'receiver_address',
        'receiver_province',
        'receiver_phone',
        'receiver_city',
        'receiver_zipCode',
        'order_date',
        'order_time',
        'cancel_time',
        'amount',
        'tip',
        'totalAmount',
        'payment',
        'date',
        'comment',
        'time_to',
        'time_from',
        'order_status',
        ];
      public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}