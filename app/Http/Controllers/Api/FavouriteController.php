<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Property;
use App\Models\Admin\Post;
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
        ]);  // Validate that the property_id exists in the properties table

        // Check if the property is already favorited by this user
        $favorite = Favourite::where('user_id', Auth::id())
                            ->where('property_id', $request->property_id)
                            ->first();

        if ($favorite) {
            return response()->json(['message' => 'Property already favorited'], 409);
        }

        // Add to favorites
        Favourite::create([
            'user_id' => Auth::id(),  // Current logged-in user
            'property_id' => $request->property_id,  // The property to be favorited
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

        $favorite->delete();  // Remove the favorite entry

        return response()->json(['message' => 'Property removed from favorites'], 200);
    }


    public function listFavorites()
    {
        // Get the logged-in user ID
        $userId = Auth::id();

        // Fetch the favorite properties for the logged-in user
        $favorites = Property::whereHas('favorites', function ($query) use ($userId) {
            $query->where('user_id', $userId);  // Get properties where the logged-in user favorited them
        })->with('category', 'type', 'location', 'Images')->get();

        // If no properties are found in favorites, return a message
        if ($favorites->isEmpty()) {
            return response()->json(['message' => 'No favorite properties found'], 404);
        }

        // Transform the favorite properties data to send in response
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
                'images' => $property->Images->map(function ($image) {
                    return [
                        'images' => url('storage/' . $image->property_images),
                    ];
                }),
            ];
        });

        // Return the transformed data as a JSON response
        return response()->json(['favorites' => $favorites], 200);
    }



}
