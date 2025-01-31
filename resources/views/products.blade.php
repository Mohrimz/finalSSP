@extends('layouts.x-layout')

@section('title', 'All Products')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">All Products</h2>
        <form method="GET" action="{{ route('products') }}" class="flex">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                   class="border border-gray-300 rounded-md p-2">
            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Search
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white shadow-md rounded-lg p-4 relative">
                <!-- Product Image Container -->
                <div class="relative">
                    <a href="{{ route('product.view', $product->id) }}">
                        <img src="{{ asset('storage/' . $product->target_file) }}" 
                             alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    </a>

                    <!-- Livewire Wishlist Button (Top Right of Image) -->
                    <div class="absolute top-2 right-2">
                        <livewire:wishlist :productId="$product->id" />
                    </div>
                </div>

                <!-- Product Name -->
                <a href="{{ route('product.view', $product->id) }}" 
                   class="block text-lg font-semibold text-gray-800 hover:text-blue-600 mb-2">
                    {{ $product->name }}
                </a>
                <p class="text-lg font-bold text-gray-700 mt-2">${{ number_format($product->price, 2) }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
