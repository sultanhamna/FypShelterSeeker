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

                ->make(true);
        }

        return view('admin.user.index');
    }

}
