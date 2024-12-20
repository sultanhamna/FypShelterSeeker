<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    // Controller function to get products
    public function index() {
    $products = Product::with('Pics')->get();  // Eager load the 'Pics' relationship to avoid N+1 queries

    return view('front.Content.content', compact('products'));
}
// In ProductController.php

public function show($id)
{
    $product = Product::with('Pics')->findOrFail($id);
    return view('front.Content.detail', compact('product'));
}


}
