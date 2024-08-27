<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class PropertyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax())
        {
            $data = Status::all();
            return Datatables::of($data)
            ->addIndexColumn()

                ->addColumn('action', function($row)
                {
                    $action = '';
                    $editUrl = route('edit.Status', $row->id);
                    $deleteUrl = route('delete.Status', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp;
                                <button data-href="' . $deleteUrl . '" class="btn btn-sm btn-danger delete_status_button"><i class=" fas fa-trash-alt" ></i> Delete</button>';
                    return $action;
                })
                ->removecolumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Status.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Status.createStatus');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_status' => 'required|string|max:255',

        ]);
        $statusEntered = Status::create($request->all());

        if($statusEntered==null)
        {
            return redirect()->route('index.Status')->with('error','Status is not Created');
        }
        else
        {
            return redirect()->route('index.Status')->with('success','Status is  Created Successful');
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
         $data = Status::findorfail($id);
         // dd($data);
         return view('admin.Status.editStatus', compact(['data',]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $statusUpdated=   Status::findorfail($id)->update($request->all());

        if( $statusUpdated==null)
      {
        return redirect()->route('index.Status')->with("error","Status is  not updated");
      }
      else
      {
          return redirect()->route('index.Status')->with("success","Status is  updated");
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try
    {
        $status = Status::with('property')->findOrFail($id);

        if ($status->property()->count() > 0)
         {
            return response()->json(['error' => 'Status is not deleted because it has related property']);
        }

        $status->delete();

        return response()->json(['success' => 'Status deleted successfully']);
    }
    catch (\Exception $e)
    {
        return response()->json(['error' => 'Failed to delete status: '. $e->getMessage()], 500);
    }
}

}
