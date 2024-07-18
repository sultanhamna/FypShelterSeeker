<?php

namespace App\Http\Controllers\Admin;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Image;
use App\Models\Admin\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = Product::with('Images','category')->get();

            return Datatables::of($data)

            ->addIndexColumn()

            ->addColumn('category_name', function ($row)
            {
                return $row->category->category_name;
            })
            ->addColumn('images', function ($row)
            {
                $images = '';
                if ($row->Images)
                 {
                    foreach ($row->Images as $image)
                    {
                        $images .= '<img src="' . asset('storage/' . $image->product_images) . '" style="width: 50px; height: 50px; margin-right: 5px;" />';
                    }
                }
                return $images;
            })

                ->addColumn('action', function($row){
                    $action = '';
                    $action .= '<a href=" " class="btn btn-sm btn-primary"><i class="fa fa-eye" ></i> Edit</a>';
                    $action .= '&nbsp
                            <button  class="btn btn-sm btn-danger "><i class="fas fa-trash-alt" ></i> Delete</button>';
                            return $action;
                        })
                ->rawColumns(['action','images','category_name'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.product.createProduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productEntered=Product::create($request->except('product_images'));
        if($productEntered==null)
        {
           return redirect()->back()->with("error","Product is not Created");
        }
        else
        {

         $productFilePath = $request->file('product_images')->storeAs('adminCategory', time() . '.' . $request->file('product_images')->getClientOriginalExtension(), 'public');

                Image::create(
                [
                 'product_id' =>  $productEntered->id,
                 'product_images' => $productFilePath,
                ]);

       return redirect()->back()->with("success","Data is  Created");
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
