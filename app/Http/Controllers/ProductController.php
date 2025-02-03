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
    ->select('id', 'name', 'size', 'price', 'description', 'status', 'target_file') 
    ->when($searchTerm, function ($query, $searchTerm) {
        return $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                     ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                     ->orWhere('size', 'LIKE', '%' . $searchTerm . '%');
    })
    ->paginate(10);

    return view('admin.products', compact('products', 'searchTerm'));
}

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'size' => 'required|array',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
    ]);

    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('storage/uploads'), $imageName);

    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->size = implode(',', $request->size); 
    $product->target_file = 'uploads/' . $imageName;
    $product->status = 'active'; 
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
}

    public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.edit', compact('product'));
}
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'size' => 'required|array', 
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->size = implode(',', $request->input('size')); 
    $product->description = $request->input('description');

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public');
        $product->target_file = $path;
    }

    $product->save();

    return redirect()->route('admin.products')->with('message', 'Product updated successfully!');
}


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
    public function toggleStatus($id, $action)
{
    $product = Product::findOrFail($id);

    if ($action === 'activate') {
        $product->status = 'active';
    } else {
        $product->status = 'inactive';
    }

    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product status updated successfully!');
}

}
