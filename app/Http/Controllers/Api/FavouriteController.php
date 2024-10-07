<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Property;
class FavouriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
        ]);  // Validate that the property_id exists in the properties table

        // Check if the property is already favorited by this user
        $favorite = Favorite::where('user_id', Auth::id())
                            ->where('property_id', $request->property_id)
                            ->first();

        if ($favorite) {
            return response()->json(['message' => 'Property already favorited'], 409);
        }

        // Add to favorites
        Favorite::create([
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

        $favorite = Favorite::where('user_id', Auth::id())
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
    $favorites = Property::whereHas('favorites', function ($query) {
        $query->where('user_id', Auth::id());  // Get properties where the logged-in user favorited them
    })->get();

    return response()->json($favorites,200);
}


}
