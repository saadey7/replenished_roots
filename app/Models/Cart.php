<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'user_id',
        'unit_price',
        'quantity',
        'total',
    ];

    protected $casts=[
        'product_id' => 'integer',
        'user_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class)->with(['images', 'additionalInfos', 'reviews']);
    }

}