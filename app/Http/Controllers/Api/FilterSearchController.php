<?php

namespace App\Http\Controllers\Api;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Post;
use App\Models\Admin\Property;
use App\Models\Admin\Location;
use App\Models\Admin\Type;
use App\Models\Admin\Status;
use App\Models\Admin\AreaSize;

use App\Models\Admin\Image;

class FilterSearchController extends Controller
{
    public function getAllCategory($id)
{
    // Fetch categories where the id matches the provided $id
   // $categories = Category::where('id', $id)->get();

    $categories = Category::where('id', 1)->get();

    // Return categories as JSON
    return response()->json(['categories' => $categories]);
}
/*
public function getAllpost($id)
{
    // Fetch post where the id matches the provided $id

    $post = Post::where('id', 1)->get();

    // Return Post as JSON
    return response()->json(['post' => $post]);
}
*/

public function getAllpost($id)
{
    // Fetch properties where related 'post' has a specific value
    $properties = Property::with('post', 'category', 'type', 'location', 'status', 'areaSize') // Include related models
        ->whereHas('post', function ($query) use ($id) {
            $query->where('property_post', 'Rent'); // Filter based on the provided 'post_id'
        })
        ->get()

        ->transform(function ($property) {
            return[
                'id' => $property->id,
                'category' => $property->category->category_name,
                'type' => $property->type->property_type,
                'location' => $property->location->property_location,
                'status' => $property->status->property_status,
                'area_size' => $property->areaSize->property_size,
                'post' => $property->post->property_post,
                'price' => $property->price,
                'description' => $property->description,
               // 'created_at' => $property->created_at,
               // 'updated_at' => $property->updated_at,
                'Images' => $property->Images->map(function ($image) {
                return[
                    //'id' => $image->id,
                    'images' => $image->property_images, // Assuming the Image model has a  attribute
                ];
            }),
            ];
        });

    // Return properties with detailed 'post' information as JSON
    return response()->json(['properties' => $properties]);
}

public function getAlllocation($id)
{
    // Fetch properties where related 'location' has a specific value
    $properties = Property::with('post', 'category', 'type', 'location', 'status', 'areaSize') // Include related models
        ->whereHas('location', function ($query) use ($id) {
            $query->where('property_location', 'KanalView'); // Filter based on the provided ''
        })
        ->get()

        ->transform(function ($property) {
            return[
                'id' => $property->id,
                'category' => $property->category->category_name,
                'type' => $property->type->property_type,
                'location' => $property->location->property_location,
                'status' => $property->status->property_status,
                'area_size' => $property->areaSize->property_size,
                'post' => $property->post->property_post,
                'price' => $property->price,
                'description' => $property->description,
               // 'created_at' => $property->created_at,
               // 'updated_at' => $property->updated_at,
                'Images' => $property->Images->map(function ($image) {
                return[
                    //'id' => $image->id,
                    'images' => $image->property_images, // Assuming the Image model has a  attribute
                ];
            }),
            ];
        });

    // Return properties with detailed 'location' information as JSON
    return response()->json(['properties' => $properties]);
}




}
