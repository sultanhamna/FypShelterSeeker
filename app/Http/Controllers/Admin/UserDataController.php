<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use App\Models\User;
use Yajra\DataTables\DataTables;
class UserDataController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = User::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-success btn-sm">Edit</a> <a href="j" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.user.index');
    }

}
