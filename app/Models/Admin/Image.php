<?php

namespace App\Models\Admin;
use App\Models\Admin\Product;
use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'property_id',
        'property_images',
    ];

    public function products()

    {
     return  $this->belongsTo(Product::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
