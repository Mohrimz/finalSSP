@extends('layouts.x-layout')

@section('title', $product->name)

@section('content')
<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Product Image -->
        <div>
            <img src="{{ asset('storage/' . $product->target_file) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-lg mb-4">
        </div>

        <!-- Product Details -->
        <div>
            <p class="text-sm text-gray-500 mb-2">Home / {{ $product->name }}</p>
            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
            <h4 class="text-2xl font-bold text-gray-800 mb-4">${{ number_format($product->price, 2) }}</h4>

            <!-- Livewire Component for Adding to Cart -->
            <livewire:add-to-cart :product="$product" />

            <!-- Product Description -->
            <h3 class="text-lg font-semibold mt-6 mb-2">Product Details</h3>
            <p class="text-gray-600">{{ $product->description }}</p>
        </div>
    </div>

    <!-- Related Products -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($relatedProducts as $relatedProduct)
                <div class="border rounded-lg p-4 shadow hover:shadow-lg transition">
                    <a href="{{ route('product.view', $relatedProduct->id) }}">
                        <img src="{{ asset('storage/' . $relatedProduct->target_file) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-lg font-semibold">{{ $relatedProduct->name }}</h3>
                        <p class="text-gray-600">${{ number_format($relatedProduct->price, 2) }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
