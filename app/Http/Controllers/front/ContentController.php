<?php

namespace App\Http\Controllers\front;
use App\Models\Admin\Category;
use App\Models\Admin\Location;
use App\Models\Admin\Type;
use App\Models\Admin\Status;
use App\Models\Admin\AreaSize;
use App\Models\Admin\Property;
use App\Models\Admin\Image;
use App\Models\Admin\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::all();
        $types= Type::all();
        $posts= Post::all();
        $statuses= Status::all();
        $sizes= AreaSize::all();
        $locations= Location::all();
        $Images= Image::all();
        $properties = Property::with('type','category','status','areaSize','location','Images','post')->paginate(9);

        return view('front.Content.content', compact(['properties','posts','categories','types','statuses','sizes','locations','Images']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function filter(Request $request)
    {
        $query = Property::with(['type', 'category', 'location', 'Images', 'post']);

        // Check if any filters are applied
        if ($request->category_name || $request->property_post || $request->property_type || $request->property_location) {
            // Apply filters
            if ($request->category_name) {
                $query->where('category_id', $request->category_name);
            }
            if ($request->property_post) {
                $query->where('post_id', $request->property_post);
            }
            if ($request->property_type) {
                $query->where('type_id', $request->property_type);
            }
            if ($request->property_location) {
                $query->where('location_id', $request->property_location);
            }

            // Paginate results based on filtered query
            $properties = $query->paginate(9)->appends($request->query());
        } else {
            // Display latest 18 properties by default when no filters are applied
            $properties = $query->latest()->paginate(9);
        }

        // Fetch filter options
        $categories = Category::all();
        $types = Type::all();
        $locations = Location::all();
        $posts = Post::all();

        // Return view with properties and filter values
        return view('front.Content.content', compact('properties', 'categories', 'types', 'locations', 'posts'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
