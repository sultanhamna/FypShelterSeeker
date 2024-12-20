<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pic;

class Product extends Model
{
    use HasFactory;
    protected $fillable =
    [

        'timing',
        'product_location',
        'location_latitude',
        'location_longitude',


    ];

    public function Pics()
    {
        return $this->hasMany(Pic::class, 'product_id');
    }

}
