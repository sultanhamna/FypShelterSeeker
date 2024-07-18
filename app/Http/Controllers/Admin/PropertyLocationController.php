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
                    $action .= '&nbsp';

                    $action .= '<a href="' .     $deleteUrl  . ' " class="btn btn-sm btn-danger"><i class="fas fa-trash" aria-hidden="true"></i> Delete</a>';
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

        ]);
        $locationEntered = Location::create($request->all());

      if($locationEntered==null)
      {
         return redirect()->back()->with("error","Location is not Entered");
      }
      else
      {
          return redirect()->back()->with("success","Location is  Entered");
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
        $location = Location::with('property')->findorfail($id);


        if ($location->property()->count() > 0) {

            return redirect()->route('index.location')->with("error","Location  is not Deleted bcz it has related property");
        }

        $location->delete();

        return redirect()->route('index.location')->with("success","Location  is  Deleted ");
    }
}
