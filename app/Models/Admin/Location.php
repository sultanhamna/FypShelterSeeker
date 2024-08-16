<?php

namespace App\Models\Admin;
use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'property_location',
        'location_latitude',
        'location_longitude',


    ];

    public function property()
    {
        return $this->hasMany(Property::class);
    }
}

