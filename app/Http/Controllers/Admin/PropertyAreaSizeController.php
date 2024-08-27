<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\AreaSize;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Property;
class PropertyAreaSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax())
        {
            $data = AreaSize::all();
            return Datatables::of($data)
            ->addIndexColumn()

                ->addColumn('action', function($row){
                    $action = '';
                    $editUrl = route('edit.Size', $row->id);
                    $deleteUrl = route('delete.Size', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp;
                               <button data-href="' . $deleteUrl . '" class="btn btn-sm btn-danger delete_size_button"><i class=" fas fa-trash-alt" ></i> Delete</button>';
                    return $action;
                })
                ->removecolumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.AreaSize.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.AreaSize.createAreaSize');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_size' => 'required|string|max:255',

        ]);
      $sizeEntered = AreaSize ::create($request->all());

      if($sizeEntered==null)
      {
        return redirect()->route('index.Size')->with('error','Size is not Created');
      }
      else
      {
        return redirect()->route('index.Size')->with('success','Size is Created Successful');
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
        $data = AreaSize::findorfail($id);
        // dd($data);
        return view('admin.AreaSize.editAreaSize', compact(['data',]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $sizeUpdated=   AreaSize::findorfail($id)->update($request->all());

        if( $sizeUpdated==null)
      {
        return redirect()->route('index.Size')->with("error","Size is  not updated");
      }
      else
      {
          return redirect()->route('index.Size')->with("success","Size is  updated");
      }

    }



    /**
     * Remove the specified resource from storage.
     */



     public function destroy($id)
     {
         try
        {
             $areaSize = AreaSize::with('property')->findOrFail($id);

             if ($areaSize->property()->count() > 0)
            {
                 return response()->json(['error' => 'AreaSize is not deleted because it has related property']);
            }

             $areaSize->delete();

             return response()->json(['success' => 'AreaSize deleted successfully']);
        }
         catch (\Exception $e)
        {
             return response()->json(['error' => 'Failed to delete AreaSize: '. $e->getMessage()], 500);
        }
     }

}



