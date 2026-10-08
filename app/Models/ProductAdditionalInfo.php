<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdditionalInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'name',
        'value',
    ];

    protected $casta  = [
        'product_id' => 'integer',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}