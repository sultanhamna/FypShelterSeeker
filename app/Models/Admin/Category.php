<?php

namespace App\Models\Admin;
use App\Models\Admin\Product;
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

    public function products()
   {
    return  $this->hasMany(Product::class);
   }

   public function property()
   {
       return $this->hasMany(Property::class);
   }
}
