<?php

namespace App\Models\Admin;
use App\Models\Admin\Property;
use App\Models\Admin\Category;
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
