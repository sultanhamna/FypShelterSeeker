<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Property;
use App\Models\Admin\Category;
use App\Models\Admin\Location;
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
        $Categories= Category::count();
        $Location= Location::count();


    $residentialCount = Property::whereHas('category', function($query) {
        $query->where('category_name', 'Residential');
    })->count();

    $commercialCount = Property::whereHas('category', function($query) {
        $query->where('category_name', 'Commercial');
    })->count();

    $plotCount = Property::whereHas('category', function($query) {
        $query->where('category_name', 'Plot Area');
    })->count();

    $BuyCount = Property::whereHas('post', function($query) {
        $query->where('property_post', 'Buy');
    })->count();

    $RentCount = Property::whereHas('post', function($query) {
        $query->where('property_post', 'Rent');
    })->count();


        return view('admin.Content.content',compact('Users','Properties','Categories','Location','residentialCount','commercialCount','plotCount','RentCount','BuyCount'));
    }

    public function profile()

    {
        $admin = Auth::user();
        return view('admin.Profile.viewProfile',compact('admin'));
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
