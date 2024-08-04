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
    public function getLocation()
{
    // Fetch Location where the id matches the provided $id
   // $Location = Location::where('id', $id)->get();

    $location = Location::get();

    // Return Location as JSON
    return response()->json(['location' => $location]);
}

public function getPost()
{
    // Fetch Post where the id matches the provided $id
   // $Post = Post::where('id', $id)->get();

    $post = Post::get();

    return response()->json(['Post' => $post]);
}

public function getCategory()
{
    // Fetch Category where the id matches the provided $id
   // $Category = Category::where('id', $id)->get();

    $category = Category::get();

    return response()->json(['Category' => $category]);
}

public function getType()
{
   // $Type = Type::where('id', $id)->get();

    $type = Type::get();

    return response()->json(['Type' => $type]);
}

public function getSize()
{
   // $Size = Size::where('id', $id)->get();

    $size = AreaSize::get();

    return response()->json(['size' => $size]);
}

/*

public function getAlllocation($id)
{
   // Fetch properties where related 'location' has a specific value
    $properties = Property::with('post', 'category', 'type', 'location', 'status', 'areaSize')
        ->whereHas('location', function ($query) use ($id) {
            $query->where('id', $id); // Filter based on the provided location ID
        })
        ->get()
        ->transform(function ($property) {
            return [
                'id' => $property->id,
                'category' => $property->category->category_name,
                'type' => $property->type->property_type,
                'location' => $property->location->property_location,
                'status' => $property->status->property_status,
                'area_size' => $property->areaSize->property_size,
                'post' => $property->post->property_post,
                'price' => $property->price,
                'description' => $property->description,
                'images' => $property->Images->map(function ($image) {
                    return [
                        'images' => $image->property_images,
                    ];
                }),
            ];
        });

    // Return properties with detailed 'location' information as JSON
    return response()->json(['properties' => $properties]);
}

*/

public function getPropertiesByFilters(Request $request)
{
    $postId = $request->input('post_id');
    $locationId = $request->input('location_id');

    // Fetch properties where related 'post' and 'location' match the filters
    $properties = Property::with('post', 'category', 'type', 'location', 'status', 'areaSize', 'Images')
        ->when($postId, function ($query) use ($postId) {
            $query->whereHas('post', function ($query) use ($postId) {
                $query->where('id', $postId);
            });
        })
        ->when($locationId, function ($query) use ($locationId) {
            $query->whereHas('location', function ($query) use ($locationId) {
                $query->where('id', $locationId);
            });
        })
        ->get()
        ->transform(function ($property) {
            return [
                'id' => $property->id,
                'category' => $property->category->category_name,
                'type' => $property->type->property_type,
                'location' => $property->location->property_location,
                'status' => $property->status->property_status,
                'area_size' => $property->areaSize->property_size,
                'post' => $property->post->property_post,
                'price' => $property->price,
                'description' => $property->description,
                'images' => $property->Images->map(function ($image) {
                    return [
                        'images' => $image->property_images,
                    ];
                }),
            ];
        });

    // Return properties with detailed information as JSON
    return response()->json(['properties' => $properties]);
}

}



