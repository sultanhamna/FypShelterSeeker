<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Property;

class ApiMainController extends Controller
{
    public function getAllData()
    {
        $properties = Property::with('Images')->get(); // Eager load images

        if ($properties->isEmpty()) {
            return response()->json(['error' => 'Properties not found'], 404);
        }

        $propertiesData = $properties->map(function ($property) {
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

        return response()->json(['properties' => $propertiesData]);
    }
}
