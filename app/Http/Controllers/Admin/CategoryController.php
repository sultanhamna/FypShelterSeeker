<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Property;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = Category::all();
            return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('category_icon', function($row)
            {
                $icon= '';
                $icon .= '<img src="' . asset('storage/' . $row->category_icon) . '" style="width: 50px; height: 50px; margin-right: 5px;" />';
                return  $icon;
            })

                ->addColumn('action', function($row){
                    $action = '';
                    $editUrl = route('edit.category', $row->id);
                    $deleteUrl = route('delete.Category', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp';
                    $action .= '<a href="' . $deleteUrl . ' " class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this category?\')"><i class="fas fa-trash" aria-hidden="true"></i> Delete</a>';
                return $action;
                })
                ->removecolumn('id')
                ->rawColumns(['action' ,'category_icon'])
                ->make(true);
        }

        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_icon' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $categoryEntered=Category::create($request->except('category_icon'));
        if($categoryEntered==null)
        {
           return redirect()->back()->with("error","Category is not Created");
        }
        else
        {
            $categoryFilePath = $request->file('category_icon')->storeAs('adminCategory', time() . '.' . $request->file('category_icon')->getClientOriginalExtension(), 'public');
            $categoryEntered->update([
            "category_icon"=>$categoryFilePath]);

       return redirect()->back()->with("success","Category is  Created");
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
        $data = Category::findorfail($id);
        // dd($data);
        return view('admin/category/editCategory', compact(['data',]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
            $request->validate([
                'category_name' => 'required|string|max:255',
                'category_icon' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);
            $categoryUpdate = Category::findOrFail($id);

            $categoryUpdate->update($request->except('category_icon'));
            if ($request->hasFile('category_icon'))
            {
                $categoryFilePath = $request->file('category_icon')->storeAs('adminCategory', time() . '.' . $request->file('category_icon')->getClientOriginalExtension(), 'public');
                $categoryUpdate->update([
                    "category_icon" => $categoryFilePath
                ]);
            }

            return redirect()->route('index.category')->with("success", "Category updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::with('property')->findorfail($id);


        if ($category->property()->count() > 0) {

            return redirect()->route('index.category')->with("error","Category  is not Deleted bcz it has related property");
        }

        $category->delete();

        return redirect()->route('index.category')->with("success","Category  is  Deleted ");
    }

}
