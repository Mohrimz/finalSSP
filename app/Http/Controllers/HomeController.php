<?php

namespace App\Http\Controllers;

use App\Models\Product;  
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch active products and new arrivals
        $products = Product::where('status', 'active')->get();
        $newArrivals = Product::orderBy('created_at', 'desc')->limit(4)->get();

        return view('home', compact('products', 'newArrivals'));
    }
}
