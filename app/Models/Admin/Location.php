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

    ];

    public function property()
    {
        return $this->hasMany(Property::class);
    }
}

