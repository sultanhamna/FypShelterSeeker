<?php

namespace App\Models\Admin;
use App\Models\Admin\Post;
use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'category_name',
        'category_icon',
    ];

    public function post()
   {
    return  $this->hasMany(Post::class);
   }

   public function property()
   {
       return $this->hasMany(Property::class);
   }
}
