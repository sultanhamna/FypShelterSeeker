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
        $properties = Property::with('type','category','status','areaSize','location','Images','post')->get();

        return view('front.Content.content', compact(['properties','posts','categories','types','statuses','sizes','locations','Images']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
