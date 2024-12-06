<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class PropertyLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax())
        {
            $data = Location::all();
            return Datatables::of($data)
            ->addIndexColumn()

                ->addColumn('action', function($row){
                    $action = '';
                    $editUrl = route('edit.location', $row->id);
                    $deleteUrl = route('delete.location', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp;
                               <button data-href="' . $deleteUrl . '" class="btn btn-sm btn-danger delete_location_button"><i class=" fas fa-trash-alt" ></i> Delete</button>';
                    return $action;
                })
                ->removecolumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Location.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Location.createLocation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_location' => 'required|string|max:255',
            'location_latitude' => 'required|numeric',
            'location_longitude' => 'required|numeric',
        ]);
        $locationEntered = Location::create($request->all());

      if($locationEntered==null)
      {
        return redirect()->route('index.location')->with('error','Location is not Created');
      }
      else
      {
        return redirect()->route('index.location')->with('success','Location is  Created Successful');
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
        $data = Location::findorfail($id);
        // dd($data);
        return view('admin.Location.editLocation', compact(['data',]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'property_location' => 'required|string|max:255',
           'location_latitude' => 'required|numeric|between:-90,90',
           'location_longitude' => 'required|numeric|between:-180,180',
        ]);
        $locationUpdated=   Location::findorfail($id)->update($request->all());

        if( $locationUpdated==null)
      {
        return redirect()->route('index.location')->with("error","Location is  not updated");
      }
      else
      {
          return redirect()->route('index.location')->with("success","Location is  updated");
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try
        {
            $location = Location::with('property')->findOrFail($id);

            if ($location->property()->count() > 0)
            {
                return response()->json(['error' => 'Location is not deleted because it has related property']);
            }

            $location->delete();

            return response()->json(['success' => 'Location deleted successfully']);
        }
         catch (\Exception $e)
        {
            return response()->json(['error' => 'Failed to delete location: '. $e->getMessage()], 500);
        }
    }
}
