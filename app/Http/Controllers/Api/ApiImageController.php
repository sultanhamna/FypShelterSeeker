<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Image;

class ApiImageController extends Controller
{
    public function getAllimages()
    {
        $Images = Image::get();

        if ($Images->isEmpty()) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        $ImageData = $Images->map(function ($Image) {
            return [
                'id' => $Image->id,
               'property_images' =>$Image->property_images,
               'property_id' => $Image->property_id,

            ];
        });

        return response()->json(['Images' =>   $ImageData]);
    }

}
