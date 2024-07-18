<?php

namespace App\Models\Admin;
use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'property_status',

    ];

    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
