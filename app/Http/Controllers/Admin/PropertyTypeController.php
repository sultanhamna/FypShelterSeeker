<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax())
        {
            $data = Type::all();
            return Datatables::of($data)
            ->addIndexColumn()

                ->addColumn('action', function($row)
                {
                    $action = '';
                    $editUrl = route('edit.Type', $row->id);
                    $deleteUrl = route('delete.Type', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp;
                                <button data-href="' . $deleteUrl . '" class="btn btn-sm btn-danger delete_type_button"><i class=" fas fa-trash-alt" ></i> Delete</button>';
                    return $action;
                })
                ->removecolumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Type.createType');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_type' => 'required|string|max:255',

        ]);
        $typeEntered = Type::create($request->all());

        if($typeEntered==null)
        {
            return redirect()->route('index.Type')->with('error','Type is not Created');
        }
        else
        {
            return redirect()->route('index.Type')->with('success','Type is  Created Successfully');
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
        {
            // dd($id);
            $data = Type::findorfail($id);
            // dd($data);
            return view('admin.Type.editType', compact(['data']));
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'property_type' => 'required|string|max:255',

        ]);
            $TypeUpdated=  Type::findorfail($id)->update($request->all());

            if( $TypeUpdated==null)
          {
            return redirect()->route('index.Type')->with("error","Type is  not updated");
          }
          else
          {
              return redirect()->route('index.Type')->with("success","Type is  updated");
          }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $type = Type::with('property')->findorfail($id);

                if ($type->property()->count() > 0)
            {

            return response()->json(['error' => 'Type is not deleted because it has related property']);
            }

                 $type->delete();

                  return response()->json(['success' => 'Type deleted successfully']);
        }
           catch (\Exception $e)
        {
        return response()->json(['error' => 'Failed to delete Type: '. $e->getMessage()], 500);
        }

    }
}
