<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product; // Assuming you have a Product model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Fetch all products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
{
    $products = Product::all();

    // Ensure URLs are formatted correctly
    $products = Product::all()->map(function ($product) {
        $product->target_file = asset('storage/' . $product->target_file);
        return $product;
    });
    

    return response()->json([
        'success' => true,
        'data' => $products,
    ]);
}


}
