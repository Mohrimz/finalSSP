@extends('layouts.x-layout')

@section('title', 'All Products')

@section('content')
<div class="container mx-auto p-4">
    <!-- Top Section -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">All Products</h2>
        <form method="GET" action="{{ route('products') }}" class="flex">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search products..." 
                class="border border-gray-300 rounded-md p-2"
            />
            <button 
                type="submit" 
                class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Search
            </button>
        </form>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($products as $product)
            <div class="bg-white rounded-lg shadow-md p-4 product-card relative">
            <a href="{{ route('product.view', $product->id) }}">
    <img src="{{ asset('storage/' . $product->target_file) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
    <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
</a>

                <h4 class="text-lg font-semibold mt-2">{{ $product->name }}</h4>
                <div class="flex space-x-1 text-yellow-500 mt-2">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-alt"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p class="text-lg font-bold text-gray-700 mt-2">${{ $product->price }}</p>
            </div>
        @empty
            <p class="text-center text-gray-600 col-span-full">No products found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
