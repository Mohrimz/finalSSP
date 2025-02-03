@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="min-h-screen ml-64 bg-gray-100 p-6">
    <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">Edit Product</h1>

    @if(session('message'))
        <div class="max-w-xl mx-auto mb-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-center">
                {{ session('message') }}
            </div>
        </div>
    @endif

    <!-- Form Container -->
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <form method="POST" action="{{ route('admin.update', $product->id) }}">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Product Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('name', $product->name) }}"
                    required
                >
            </div>

            <!-- Price -->
            <div class="mb-6">
                <label for="price" class="block text-gray-700 font-semibold mb-2">Price</label>
                <input
                    type="number"
                    id="price"
                    name="price"
                    step="0.01"
                    min="0"
                    oninput="this.value = Math.abs(this.value)"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('price', $product->price) }}"
                    required
                >
            </div>

            <!-- Sizes -->
            <div class="mb-6">
                <label for="size" class="block text-gray-700 font-semibold mb-2">Select Sizes</label>
                <select
                    id="size"
                    name="size[]"
                    multiple
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                >
                    @foreach(range(30, 45) as $size)
                        <option value="{{ $size }}" {{ in_array($size, explode(',', $product->size)) ? 'selected' : '' }}>
                            {{ $size }}
                        </option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">
                    Hold <span class="font-semibold">Ctrl</span> (Windows) or <span class="font-semibold">Command</span> (Mac) to select multiple sizes.
                </p>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    rows="4"
                    required
                >{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Product Image Component -->
            <div class="mb-6">
                @livewire('edit-product-image', ['product' => $product])
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300 font-semibold"
            >
                Update Product
            </button>
        </form>
    </div>
</div>
@endsection
