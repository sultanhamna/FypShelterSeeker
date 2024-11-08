<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $request->validate([
            'monthly_salary' => 'required|numeric|min:1',
            'property_price' => 'required|numeric|min:1',
        ]);

        $monthlySalary = $request->input('monthly_salary');
        $propertyPrice = $request->input('property_price');

        // Assuming a certain percentage of salary can be allocated for the payment
        $percentageOfSalary = 0.30; // 30% of monthly salary
        $monthlyPayment = $monthlySalary * $percentageOfSalary;
        $years = ceil($propertyPrice / ($monthlyPayment * 12));

        return view('calculator', compact('years'));
    }
}
