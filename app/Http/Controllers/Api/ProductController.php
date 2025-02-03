<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a paginated listing of the products.
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

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'required|string',
            'size'        => 'required|array',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;

            
        } else {
            $imagePath = null;
        }

        $product = Product::create([
            'name'         => $validatedData['name'],
            'price'        => $validatedData['price'],
            'description'  => $validatedData['description'],
            'size'         => implode(',', $validatedData['size']),
            'target_file'  => $imagePath,
            'status'       => 'active',
        ]);

        return response()->json([
            'message' => 'Product added successfully!',
            'product' => $product,
        ], 201);
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate incoming data
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'required|string',
            'size'        => 'required|array',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5000',
        ]);

        // Update product attributes
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->size = implode(',', $validatedData['size']);

        // Handle image update if provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->target_file && Storage::disk('public')->exists($product->target_file)) {
                Storage::disk('public')->delete($product->target_file);
            }

            $imagePath = $request->file('image')->store('products', 'public');
            $product->target_file = $imagePath;
        }

        $product->save();

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the associated image from storage if it exists
        if ($product->target_file && Storage::disk('public')->exists($product->target_file)) {
            Storage::disk('public')->delete($product->target_file);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully!',
        ]);
    }

    /**
     * Toggle the product status (activate/inactivate).
     */
    public function toggleStatus($id, $action)
    {
        $product = Product::findOrFail($id);

        if ($action === 'activate') {
            $product->status = 'active';
        } elseif ($action === 'deactivate') {
            $product->status = 'inactive';
        } else {
            return response()->json(['message' => 'Invalid action provided.'], 400);
        }

        $product->save();

        return response()->json([
            'message' => 'Product status updated successfully!',
            'product' => $product,
        ]);
    }
}
