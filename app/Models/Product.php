<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'name',
        'type',
        'price',
        'expire_date',
        'tags',
        'categories',
        'is_discount',
        'discount',
        'discount_price',
        'description',
        'final_price'
    ];

    protected  $casts = [
        'tags' => 'array',
        'categories' => 'array',
    ];
    
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
    
    public  function additionalInfos(){
        return $this->hasMany(ProductAdditionalInfo::class);
    }

    public  function reviews(){
        return $this->hasMany(ProductReviews::class);
    }
    
    public function getFinalPriceAttribute()
    {
        return $this->is_discount ? $this->discount_price : $this->price;
    }
}