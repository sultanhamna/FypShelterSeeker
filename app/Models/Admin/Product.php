<?php

namespace App\Models\Admin;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Image;

class Product extends Model
{
    use HasFactory;
    protected $fillable =
    [

        'product_type',
        'product_address',
        'product_price',
        'product_size',
        'product_status',
        'product_discription',
        'product_year_built',
        'category_id',

    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Images()

    {
     return  $this->hasMany(Image::class);
    }
}
