<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review',
    ];

    protected $casts  = [
        'product_id' => 'integer',
        'user_id' => 'integer',
    ];

}