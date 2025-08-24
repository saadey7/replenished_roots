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
        'receiver_company_name',
        'receiver_country',
        'receiver_city',
        'receiver_address',
        'receiver_district',
        'receiver_phoneNo',
        'receiver_email',
        'receiver_zipCode',
        'order_date',
        'amount',
        'comment',
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