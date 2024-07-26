<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Property;

class ApiMainController extends Controller
{
    public function getAllData()
    {
        $properties = Property::with('type', 'category', 'status', 'areaSize', 'location', 'post')->get();

        if ($properties->isEmpty()) {
            return response()->json(['error' => 'Properties not found'], 404);
        }

        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'category_id' => $property->category->category_name,
                'type_id' => $property->type->property_type,
                'location_id' => $property->location->property_location,
                'status_id' => $property->status->property_status,
                'area_size_id' => $property->areaSize->property_size,
                'post_id' => $property->post->property_post,
                'price' => $property->price,
                'description' => $property->description,
               // 'created_at' => $property->created_at,
               // 'updated_at' => $property->updated_at,
            ];
        });

        return response()->json(['properties' => $propertiesData]);
    }
}
