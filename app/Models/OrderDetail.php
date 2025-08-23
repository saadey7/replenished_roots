<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'store_id',
        'product_id',
        'price',
        'sku',
        'quantity',
        'delivery_fees',
        'order_status'
        ];
    protected $casts = [
          'price' => 'float',
          'quantity'=>'integer',
          'store_id'=>'integer',
          'product_id'=>'integer',
          'user_id'=>'integer',
          'order_id'=>'integer'
    ];
    public function order()
    {
        return $this->hasOne(Order::class,'order_id');
    }
    public function orderdata()
    {
        return $this->hasOne(Order::class,'id','order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    
}
