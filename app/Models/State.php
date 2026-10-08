<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'country_id',
        'country_code',
        'iso2',
        'iso3166_2',
        'type',
        'latitude',
        'longitude',
    ];
    
    protected $casts=[
        'country_id' => 'integer'
    ];

}