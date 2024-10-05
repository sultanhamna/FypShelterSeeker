<?php

namespace App\Models\Admin;
use App\Models\Admin\Category;
use App\Models\Admin\Location;
use App\Models\Admin\Type;
use App\Models\Admin\Status;
use App\Models\Admin\AreaSize;
use App\Models\Admin\Post;
use App\Models\Admin\Image;
use App\Models\Admin\Favourite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable =
    [

        'category_id',
        'type_id',
        'location_id',
        'status_id',
        'area_size_id',
        'post_id',
        'price',
        'description',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class ,'status_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class , 'location_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }

    public function areaSize()
    {
        return $this->belongsTo(AreaSize::class,'area_size_id');
    }

    public function Images()

    {
     return  $this->hasMany(Image::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function favorites()
   {

    return $this->hasMany(Favorite::class);

   }

}
