<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Category;
use App\Models\Admin\Location;
use App\Models\Admin\Type;
use App\Models\Admin\Status;
use App\Models\Admin\AreaSize;
use App\Models\Admin\Property;
use App\Models\Admin\Image;
use App\Models\Admin\Post;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class MainPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = Property::with('type','category','status','areaSize','location','Images','post')->get();

            return Datatables::of($data)

            ->addIndexColumn()

           ->addColumn('category_name', function ($row)
           {
                return $row->category->category_name;
           })

            ->addColumn('property_images', function ($row)
            {
                $images = '';
                if ($row->Images)
                 {
                    foreach ($row->Images as $image)
                    {
                        $images .= '<img src="' . asset('storage/' . $image->property_images) . '" style="width: 50px; height: 50px; margin-right: 5px;" />';
                    }
                }
                return $images;
            })

            ->addColumn('property_type', function ($row)
            {
                return $row->type->property_type;
            })

            ->addColumn('property_location', function ($row)
            {
                return $row->location->property_location;
            })

            ->addColumn('property_status', function ($row)
            {
                return $row->status->property_status;
            })


            ->addColumn('property_size', function ($row)
            {
                return $row->areaSize->property_size;
            })
            ->addColumn('property_post', function ($row)
            {
                return $row->post->property_post;
            })

                ->addColumn('action', function($row){
                    $action = '';
                    $editUrl = route('edit.Property', $row->id);
                    $deleteUrl = route('delete.Property', $row->id);
                    $action .= '<a href=" ' . $editUrl  . ' " class="btn btn-sm btn-primary"><i class="fa fa-eye" ></i> Edit</a>';
                    $action .= '&nbsp';

                    $action .= '<a href="' .     $deleteUrl  . ' " class="btn btn-sm btn-danger"><i class="fas fa-trash" aria-hidden="true"></i> Delete</a>';
                return $action;
                        })
                ->rawColumns(['action','property_post','property_images','property_type','category_name','property_location','property_status','property_size'])
                ->make(true);
        }
        return view('admin.Main.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        $types= Type::all();
        $statuses= Status::all();
        $sizes= AreaSize::all();
        $locations= Location::all();
        $posts= Post::all();
        $Images= Image::all();

        return view('admin.Main.createProperty',compact('categories','Images','posts','types','statuses','sizes','locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $PropertyEntered = Property ::create($request->except('property_images'));

        if($PropertyEntered==null)
        {
           return redirect()->back()->with("error","Property is not Entered");
        }
        else
        {
            $propertyFilePath = $request->file('property_images')->storeAs('adminCategory', time() . '.' . $request->file('property_images')->getClientOriginalExtension(), 'public');

            Image::create(
            [
             'property_id' =>  $PropertyEntered->id,
             'property_images' => $propertyFilePath,
            ]);
            return redirect()->back()->with("success","Property is  Entered");
        }
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
         // dd($id);
         $categories= Category::all();
         $types= Type::all();
         $posts= Post::all();
         $statuses= Status::all();
         $sizes= AreaSize::all();
         $locations= Location::all();
         $Images= Image::all();
         $data =  Property::with('type','category','status','areaSize','location','Images','post')->findorfail($id);
         // dd($data);
         return view('admin/Main/editProperty', compact(['data','posts','categories','types','statuses','sizes','locations','Images']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $property = Property::findOrFail($id);

        $property->update($request->except('property_images'));

        if ($request->hasFile('property_images'))
        {
            $existingImage = $property->Images()->latest()->first();
            if ($existingImage)
            {

               $existingImage->property_images = $request->file('property_images')->storeAs('adminCategory', time(). '.'. $request->file('property_images')->getClientOriginalExtension(), 'public');
               $existingImage->save();

            }
        }
        return redirect()->route('index.Property')->with("success","Property  is  Updated ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::with('Images')->findorfail($id);


        if ($property->Images()->count() > 0) {

            return redirect()->route('index.Property')->with("error","Property  is not Deleted bcz it has related Images");
        }

        $property->delete();

        return redirect()->route('index.Property')->with("success","Property  is  Deleted ");
    }
}
