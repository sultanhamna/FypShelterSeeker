<?php

namespace App\Http\Controllers;
use App\Models\Admin\Property;
 use App\Http\Controllers\Admin\MainProprtyController;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function displayProperty()
    {

          //  $property = Property::all(); // Fetch the property by its ID

            //dd($property); // Dump and die with the property data
            return view('sample');
    }




}






























