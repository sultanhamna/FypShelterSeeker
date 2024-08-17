<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Property;
use Illuminate\Support\Facades\Hash;
class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users= User::where('role', 'user')->count();
        $Properties= Property::count();

        return view('admin.Content.content',compact('Users','Properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $admin = Auth::user();

        return view('admin.Profile.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255,' . $admin->id,
        'password' => 'nullable|string|min:8|confirmed',
        'password_confirmation' => 'nullable|string|min:8',
        ]);

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        // Check if password is provided before updating
        if ($request->filled('password'))
        {
        $admin->password = Hash::make($request->input('password'));
        }
        $admin->save();

         return redirect()->route('admin.dashboard');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
