<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $casts = [
        'amenity_wifi' => true,
        'amenity_pets_allowed' => true,
        'amenity_tv' => true,
        'amenity_kitchen' => true,
        'amenity_breakfast' => true,
        'amenity_laptop' => true,
    ];
}
