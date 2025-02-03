<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductViewController extends Controller
{
    public function index(Request $request)
{
    $searchTerm = $request->input('search', '');
    
    $products = Product::where('status', 'active')
        ->when($searchTerm, function ($query, $searchTerm) {
            $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
        })
        ->paginate(12);

    return view('products', compact('products', 'searchTerm'));
}

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('id', '!=', $id)
            ->where('status', 'active')
            ->take(4)
            ->get();

        return view('product_view', compact('product', 'relatedProducts'));
    }
}
