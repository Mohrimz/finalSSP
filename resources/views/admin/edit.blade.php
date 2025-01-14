@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="main-content ml-64 p-6">
    <h1 class="text-3xl font-semibold text-gray-800 text-center mb-6">Edit Product</h1>

    @if(session('message'))
        <div class="alert alert-info bg-green-500 text-white p-4 mb-6 rounded-lg text-center">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form for Editing Product -->
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-xl ml-8">
        <form method="POST" action="{{ route('admin.update', $product->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Product Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-control w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" 
                    value="{{ old('name', $product->name) }}" 
                    required>
            </div>

            <div class="form-group mb-6">
                <label for="price" class="block text-gray-700 font-semibold mb-2">Price</label>
                <input 
                    type="number" 
                    id="price" 
                    name="price" 
                    class="form-control w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" 
                    value="{{ old('price', $product->price) }}" 
                    step="0.01" 
                    min="0"
                    oninput="this.value = Math.abs(this.value)" 
                    required>
            </div>

            <div class="form-group mb-6">
                <label for="size" class="block text-gray-700 font-semibold mb-2">Select Sizes</label>
                <select 
                    id="size" 
                    name="size[]" 
                    multiple 
                    class="form-control w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach(range(30, 45) as $size)
                        <option value="{{ $size }}" {{ in_array($size, explode(',', $product->size)) ? 'selected' : '' }}>
                            {{ $size }}
                        </option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-2">Hold Ctrl (Windows) or Command (Mac) to select multiple sizes.</p>
            </div>

            <div class="form-group mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea 
                    id="description" 
                    name="description" 
                    class="form-control w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" 
                    rows="4" 
                    required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group mb-6">
                @livewire('edit-product-image', ['product' => $product])
            </div>

            <button 
                type="submit" 
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all w-full font-semibold">
                Update Product
            </button>
        </form>
    </div>
</div>
@endsection
