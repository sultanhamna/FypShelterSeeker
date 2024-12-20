<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Pic extends Model
{
    use HasFactory;
    protected $fillable =
    [
       'product_image' ,
       'product_id',

    ];

    public function Product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

}
