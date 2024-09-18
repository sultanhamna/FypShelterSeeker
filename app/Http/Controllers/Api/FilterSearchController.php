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

    $type = Type::get();

    return response()->json(['Type' => $type]);
}

public function getFirstFiveTypes()
{
    $types = Type::take(5)->get();

    return response()->json(['FirstFiveTypes' => $types]);
}

public function getSecondFiveTypes()
{
    $types = Type::skip(5)->take(5)->get();

    return response()->json(['SecondFiveTypes' => $types]);
}

public function getThirdFiveTypes()
{
    $types = Type::skip(10)->take(5)->get();

    return response()->json(['ThirdFiveTypes' => $types]);
}


public function getSize()
{
   // $Size = Size::where('id', $id)->get();

    $size = AreaSize::get();

    return response()->json(['size' => $size]);
}

public function getBuyAndRent()
{

    $Buy = Post::take(1)->get();
    $Rent = Post::skip(1)->take(1)->get();

    return response()->json(['Buy' =>  $Buy , 'Rent' =>$Rent]);
}

/*

public function getPropertiesByFilters(Request $request)
{
    $postId = $request->input('post_id');
    $locationId = $request->input('location_id');
    $categoryId = $request->input('category_id');
    $typeId = $request->input('type_id');

    // Start querying properties with eager-loaded relationships
    $propertiesQuery = Property::with('post', 'category', 'type', 'location', 'status', 'areaSize', 'Images');

    // Apply filters based on the provided inputs
    if ($postId) {
        $propertiesQuery->where('post_id', $postId);
    }

    if ($locationId) {
        $propertiesQuery->where('location_id', $locationId);
    }

    if ($categoryId) {
        $propertiesQuery->where('category_id', $categoryId);
    }

    if ($typeId) {
        $propertiesQuery->where('type_id', $typeId);
    }

    // Fetch the filtered properties
    $properties = $propertiesQuery->get();

    // Check if the result is empty, return an empty response if no match
    if ($properties->isEmpty()) {
        return response()->json(['message' => 'No properties match your criteria'], 404);
    }

    // Transform the filtered properties into a structured format
    $properties = $properties->transform(function ($property) {
        return [
            'id' => $property->id,
            'category' => $property->category->category_name,
            'type' => $property->type->property_type,
            'location' => $property->location->property_location,
            'location_latitude' => $property->location->location_latitude,
            'location_longitude' => $property->location->location_longitude,
            'status' => $property->status->property_status,
            'area_size' => $property->areaSize->property_size,
            'post' => $property->post->property_post,
            'price' => $property->price,
            'description' => $property->description,
            'image' => url('storage/' .$property->Images->first()->property_images),
            'images' => $property->Images->map(function ($image) {
                return [
                    'images' =>  url('storage/' . $image->property_images),

                ];
            }),
        ];
    });

    // Return properties with detailed information as JSON
    return response()->json(['properties' => $properties]);
}

*/


public function getPropertiesByFilters(Request $request)
{
    // Fetch the query parameters from the URL
    $postId = $request->query('post_id');
    $locationId = $request->query('location_id');
    $categoryId = $request->query('category_id');
    $typeId = $request->query('type_id');

    // Ensure properties are not shown unless at least one filter is selected
    if (!$postId && !$locationId && !$categoryId && !$typeId) {
        return response()->json(['message' => 'Please select at least one filter'], 400);
    }

    // Start querying properties with eager-loaded relationships
    $propertiesQuery = Property::with('post', 'category', 'type', 'location', 'status', 'areaSize', 'Images');

    // Apply filters based on the provided inputs from both home and filters page
    if ($postId) {
        $propertiesQuery->where('post_id', $postId);
    }

    if ($locationId) {
        $propertiesQuery->where('location_id', $locationId);
    }

    if ($categoryId) {
        $propertiesQuery->where('category_id', $categoryId);
    }

    if ($typeId) {
        $propertiesQuery->where('type_id', $typeId);
    }

    // Fetch the filtered properties
    $properties = $propertiesQuery->get();

    // If no properties match the filters, return a message
    if ($properties->isEmpty()) {
        return response()->json(['message' => 'No properties match your criteria'], 404);
    }

    // Transform and return the filtered properties
    $properties = $properties->transform(function ($property) {
        return [
            'id' => $property->id,
            'category' => $property->category->category_name,
            'type' => $property->type->property_type,
            'location' => $property->location->property_location,
            'location_latitude' => $property->location->location_latitude,
            'location_longitude' => $property->location->location_longitude,
            'status' => $property->status->property_status,
            'area_size' => $property->areaSize->property_size,
            'post' => $property->post->property_post,
            'price' => $property->price,
            'description' => $property->description,
            'image' => url('storage/' . $property->Images->first()->property_images),
            'images' => $property->Images->map(function ($image) {
                return [
                    'images' => url('storage/' . $image->property_images),
                ];
            }),
        ];
    });

    return response()->json(['properties' => $properties]);
}



}



