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
            $data = User::where('role' ,'user')->get();
            return Datatables::of($data)
            ->addIndexColumn()
                ->addColumn('action', function($row){
                    $action = '';
                    $action .= '<a href="" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp

                <button data-href="" class="btn btn-xs btn-danger delete_user_button"><i class="fas fa-trash-alt" ></i> Delete</button>';
                return $action;
            })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.user.index');
    }

}
