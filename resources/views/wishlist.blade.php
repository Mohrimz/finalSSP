@extends('layouts.x-layout')

@section('title', 'Your Wishlist')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-center mb-6">Your Wishlist</h2>

    @if(session('success'))
        <p class="text-green-500 text-center">{{ session('success') }}</p>
    @endif

    @if(count(session('wishlist', [])) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach(session('wishlist', []) as $product)
                <div class="bg-white shadow-md rounded-lg p-4 relative">
                    <a href="{{ route('product.view', $product['id']) }}">
                        <img src="{{ asset('storage/' . $product['image']) }}" 
                             alt="{{ $product['name'] }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    </a>
                    <a href="{{ route('product.view', $product['id']) }}" 
                       class="block text-lg font-semibold text-gray-800 hover:text-blue-600 mb-2">
                        {{ $product['name'] }}
                    </a>
                    <p class="text-lg font-bold text-gray-700 mt-2">${{ number_format($product['price'], 2) }}</p>

                    <!-- Remove from Wishlist Button -->
                    <form action="{{ route('wishlist.remove', $product['id']) }}" method="POST" class="absolute top-4 right-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <i class="fa fa-trash text-red-500 hover:text-gray-700 transition duration-300"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-600">Your wishlist is empty.</p>
    @endif
</div>
@endsection
