<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display a listing of products
    public function index(Request $request)
{
    $searchTerm = $request->input('search', '');

    $products = \DB::table('products')
    ->select('id', 'name', 'size', 'price', 'description', 'status', 'target_file') // Ensure image column is selected
    ->when($searchTerm, function ($query, $searchTerm) {
        return $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                     ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                     ->orWhere('size', 'LIKE', '%' . $searchTerm . '%');
    })
    ->paginate(10);
 // Use paginate instead of get

    return view('admin.products', compact('products', 'searchTerm'));
}



    // Show the form for creating a new product
    public function create()
    {
        return view('admin.create');
    }

    // Store a newly created product
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'size' => 'required|array',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
    ]);

    // Handle image upload
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('storage/uploads'), $imageName);

    // Create new product entry
    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->size = implode(',', $request->size); // Storing sizes as a comma-separated string
    $product->target_file = 'uploads/' . $imageName;
    $product->status = 'active'; // Default status
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
}


    // Show the form for editing the specified product
    public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'size' => 'required|string|max:50',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->size = $request->input('size');
    $product->description = $request->input('description');

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public');
        $product->target_file = $path;
    }

    // Manually updating updated_at
    //$product->updated_at = now();

    $product->save();

    return redirect()->route('admin.products.index')->with('message', 'Product updated successfully!');
}

    // Remove the specified product from storage
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the product image from storage
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        // Delete the product from the database
        $product->delete();

        // Redirect back to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
    public function toggleStatus($id, $action)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Toggle the product's status based on the action
    if ($action === 'activate') {
        $product->status = 'active';
    } else {
        $product->status = 'inactive';
    }

    // Save the changes to the product
    $product->save();

    // Redirect back to the manage products page with a success message
    return redirect()->route('admin.products.index')->with('success', 'Product status updated successfully!');
}

}
