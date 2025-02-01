@extends('layouts.x-layout')

@section('content')
    <!-- Hero Section -->
    <section class="relative w-full h-screen bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
        <div class="absolute inset-0">
            <!-- Fullscreen Image -->
            <img src="{{ asset('storage/uploads/100.PNG') }}" alt="Workout" class="w-full h-full object-cover">
        </div>

        <div class="absolute inset-0 flex items-center justify-center text-center text-white">
            <!-- Text Content -->
            <div class="space-y-6">
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                    Transform Your Workout <br><span class="text-yellow-300">Experience</span>
                </h1>
                <p class="text-lg md:text-xl leading-relaxed">
                    Discover our latest collection of workout gear that blends style, comfort, and performance.
                </p>
                <div class="space-x-4">
                    <a href="{{ route('products') }}" class="bg-yellow-300 text-black py-3 px-8 rounded-full shadow-lg hover:bg-yellow-400 transition duration-300 ease-in-out transform hover:-translate-y-1">
                        Explore Collection
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Featured Products Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-12">Featured Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <a href="{{ route('product.view', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->target_file) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        </a>
                        <a href="{{ route('product.view', $product->id) }}" class="block text-lg font-semibold text-gray-800 hover:text-blue-600 mb-2">{{ $product->name }}</a>
                        <p class="text-lg font-bold text-gray-700 mt-2">${{ number_format($product->price, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Promotional Video Section -->
    
@endsection
