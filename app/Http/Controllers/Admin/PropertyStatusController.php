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

                ->addColumn('action', function($row){
                    $action = '';
                    $editUrl = route('edit.Status', $row->id);
                    $deleteUrl = route('delete.Status', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp';

                    $action .= '<a href="' .     $deleteUrl  . ' " class="btn btn-sm btn-danger"><i class="fas fa-trash" aria-hidden="true"></i> Delete</a>';
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
           return redirect()->back()->with("error","Status is not Entered");
        }
        else
        {
            return redirect()->back()->with("success","Status is  Entered");
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
        $status = Status::with('property')->findorfail($id);


        if ($status->property()->count() > 0) {

            return redirect()->route('index.Status')->with("error","Status  is not Deleted bcz it has related property");
        }

        $status->delete();

        return redirect()->route('index.Status')->with("success","Status  is  Deleted ");
    }
}
