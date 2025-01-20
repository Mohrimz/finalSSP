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

    // Map each product to include the full URL for the image
    $products = $products->map(function ($product) {
        $product->target_file = asset('storage/' . $product->target_file); // Prefix with the full URL
        return $product;
    });

    return response()->json([
        'success' => true,
        'data' => $products,
    ]);
}

}
