<?php

namespace App\Http\Controllers;
use App\Models\Pic;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class ProductController extends Controller


{
    public function index(Request $request)
    {

        if ($request->ajax())
        {
            $data = Product::with('Pics');
            return Datatables::of($data)
            ->addIndexColumn()

                ->addColumn('action', function($row){
                    $action = '';
                    $editUrl = route('edit.product', $row->id);
                    $deleteUrl = route('delete.product', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp;
                               <button data-href="' . $deleteUrl . '" class="btn btn-sm btn-danger delete_product_button"><i class=" fas fa-trash-alt" ></i> Delete</button>';
                    return $action;
                })



                ->addColumn('product_image', function ($row) {
                    $image = '';
                    if ($row->Pics && $row->Pics->first()) {
                        $image = '<img src="' . asset('storage/' . $row->Pics->first()->product_image) . '" style="width: 50px; height: 50px; margin-right: 5px;" />';
                    }
                    return $image;
                })

                ->removecolumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Product.index');

   }

   public function create()
    {
        return view('admin.Product.createProduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_location' => 'required|string|max:255',
            'timing' => 'required|string|max:255',
            'product_image*' => 'required|array',

        ]);

        $PropertyEntered = Product::create($request->except('product_image'));

        if (!$PropertyEntered) {
            return redirect()->back()->with("error", "Product is not Entered");
        }

        if ($request->hasFile('product_image')) {

              //  dd($request->file('product_image'));


            $PropertyEntered->Pics()->delete();

            foreach ($request->file('product_image') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $propertyFilePath = $file->storeAs('adminCategory', $filename, 'public');

                Pic::create([
                    'product_id' => $PropertyEntered->id,
                    'product_image' => $propertyFilePath,
                ]);
            }
        }

        return redirect()->route('index.product')->with('success', 'Product created successfully');
    }


public function edit(string $id)
{


     $Pics= Pic::all();
     $data =  Product::with('Pics')->findorfail($id);

     return view('admin/Product/editProduct', compact(['data','Pics']));
}
public function update(Request $request  , $id)
{
    $request->validate([
        'product_location' => 'required|string|max:255',
        'timing' => 'required',
        'product_image.*' => 'required',

    ]);
    $PropertyEntered = Product::findOrFail($id);

    $PropertyEntered->update($request->except('product_image'));

    if ($request->hasFile('product_image'))
    {
        // Delete existing images
        $PropertyEntered->Pics()->delete();

        $images = [];
        foreach ($request->file('product_image') as $file) {


            $filename =  time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $propertyFilePath = $file->storeAs('adminCategory', $filename, 'public');
            $images[] = Pic::create([
                'product_id' => $PropertyEntered->id,
                'product_image' => $propertyFilePath,
            ]);
        }

    }
        return redirect()->route('index.product')->with('success', 'Product updated successfully');

}
public function destroy(string $id)
{
    try
    {

        $property = Product::with('Pics')->findOrFail($id);

        if ($property)
        {

        $property->delete();

        return response()->json(['success' => 'product deleted successfully']);
        }

    }
    catch (\Exception $e)
    {
        return response()->json(['error' => 'Failed to delete product ' . $e->getMessage()], 500);
    }
}

}
