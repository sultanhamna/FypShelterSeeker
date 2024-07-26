<?php

namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.Calculator.createCalculator');

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
        $request->validate([
            'salary' => 'required|numeric|min:0',
            'installment_per_month' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0'
        ]);

      // $cal= Calculator::create($request->all());

      $property =  Calculator::create( $request->except('years'));
    //  $months = ceil($request->price / (12 * $request->installment_per_month));

      // Calculate the total amount saved per year
      $totalAmountSavedPerYear = 12 * $request->installment_per_month;

      // Calculate the number of years needed to buy the property
      $years =ceil($request->price / $totalAmountSavedPerYear);


     // $yearsNeeded = $propertyPrice / ($installment * 12);

     $property ->update([
        "years"=>  $years]);


      return view('admin.Calculator.displaycalculator', compact('years'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
