<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $fillable  = [
        'image',
        'product_id'
    ];

    protected $casts  = [
        'product_id' =>  'integer'
    ];

    public function getImageAttribute($value)
    {
        if($value == null)
        {
           return null;
        }
        else
        {
            return asset('/assets/images/product/' . $value);
        }

    }
}