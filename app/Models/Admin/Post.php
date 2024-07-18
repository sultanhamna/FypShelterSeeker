<?php

namespace App\Models\Admin;
use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'property_post',

    ];
    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
