<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Post;
use App\Models\Admin\Property;
use App\Models\Admin\Location;
use App\Models\Admin\Type;
use App\Models\Admin\Status;
use App\Models\Admin\AreaSize;
use App\Models\Admin\Image;

use App\Models\Admin\Favourite;
class FavouriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
        ]);

        Favourite::create([
            'user_id' => Auth::id(),
            'property_id' => $request->property_id,
        ]);

        return response()->json(['message' => 'Property added to favorites'], 201);
    }

    public function removeFavorite(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
        ]);

        $favorite = Favourite::where('user_id', Auth::id())
                            ->where('property_id', $request->property_id)
                            ->first();

        if (!$favorite) {
            return response()->json(['message' => 'Property not in favorites'], 404);
        }

        $favorite->delete();

        return response()->json(['message' => 'Property removed from favorites'], 200);
    }


    public function listFavorites()
    {

        $userId = Auth::id();

        $favorites = Property::whereHas('favorites', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with(['category', 'type', 'location', 'Images'])
        ->get();

        if ($favorites->isEmpty()) {
            return response()->json(['message' => 'No favorite properties found'], 404);
        }


        $favorites = $favorites->map(function ($property) {
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
                'image' => url('storage/' . $property->Images->first()->property_images),
            ];
        });


        return response()->json(['favorites' => $favorites], 200);
    }


}
