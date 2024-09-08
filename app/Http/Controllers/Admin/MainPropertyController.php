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
               $image = '';
               if ($row->Images)
               {
                   $image = '<img src="' . asset('storage/' . $row->Images->first()->property_images) . '" style="width: 50px; height: 50px; margin-right: 5px;" />';
               }
               return $image;
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

                ->addColumn('action', function($row)
                {
                    $action = '';
                    $editUrl = route('edit.Property', $row->id);
                    $deleteUrl = route('delete.Property', $row->id);
                    $action .= '<a href=" ' . $editUrl  . ' " class="btn btn-sm btn-primary"><i class="fa fa-eye" ></i> Edit</a>';
                    $action .= '&nbsp;
                                <button data-href="' . $deleteUrl . '" class="btn btn-sm btn-danger delete_main_button"><i class=" fas fa-trash-alt" ></i> Delete</button>';
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
         // Validate the incoming request data
         $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:types,id',
            'location_id' => 'required|exists:locations,id',
            'status_id' => 'required|exists:statuses,id',
            'area_size_id' => 'required|exists:area_sizes,id',
            'post_id' => 'required|exists:posts,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:5000',
           // 'property_images.*'=> 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $PropertyEntered = Property::create($request->except('property_images'));

        if ($PropertyEntered == null) {
            return redirect()->back()->with("error", "Property is not Entered");
        } else {
            $images = [];

            foreach ($request->file('property_images') as $file) {


                $filename =  time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // dd($filename);
                $propertyFilePath = $file->storeAs('adminCategory', $filename, 'public');

                // dd($propertyFilePath);
                $images[] = Image::create([
                    'property_id' => $PropertyEntered->id,
                    'property_images' => $propertyFilePath,
                ]);
            }

           // dd($PropertyEntered);
            return redirect()->route('index.Property')->with('success', 'Property created successfully');
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
    public function update(Request $request, $id)
    {
         // Validate the incoming request data
         $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:types,id',
            'location_id' => 'required|exists:locations,id',
            'status_id' => 'required|exists:statuses,id',
            'area_size_id' => 'required|exists:area_sizes,id',
            'post_id' => 'required|exists:posts,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:5000',
           // 'property_images.*'=> 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $PropertyEntered = Property::findOrFail($id);

        $PropertyEntered->update($request->except('property_images'));

        if ($request->hasFile('property_images'))
        {
            // Delete existing images
            $PropertyEntered->Images()->delete();

            $images = [];
            foreach ($request->file('property_images') as $file) {


                $filename =  time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $propertyFilePath = $file->storeAs('adminCategory', $filename, 'public');
                $images[] = Image::create([
                    'property_id' => $PropertyEntered->id,
                    'property_images' => $propertyFilePath,
                ]);
            }
        }
            return redirect()->route('index.Property')->with('success', 'Property updated successfully');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            // Find the category by its ID with properties eager loaded
            $property = Property::with('Images')->findOrFail($id);

            if ($property)
            {

            $property->delete();

            return response()->json(['success' => 'property deleted successfully']);
            }

        }
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Failed to delete property: ' . $e->getMessage()], 500);
        }
    }

}
