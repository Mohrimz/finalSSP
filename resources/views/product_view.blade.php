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

            <!-- Select Size -->
            <label for="size" class="block mb-2">Select Size</label>
            <div id="sizeOptions" class="flex flex-wrap gap-2 mb-4">
                @php
                    $sizes = explode(',', $product->size);
                @endphp
                @if (!empty($sizes) && count($sizes) > 0 && $sizes[0] !== '')
                    @foreach ($sizes as $size)
                        <button 
                            class="size-box border border-gray-300 px-4 py-2 rounded hover:bg-gray-100"
                            data-size="{{ $size }}">
                            {{ $size }}
                        </button>
                    @endforeach
                @else
                    <p class="text-gray-500">No sizes available</p>
                @endif
            </div>
            <p id="sizeError" class="text-red-500 text-sm mb-4" style="display: none;">Please select a size.</p>

            <!-- Quantity and Add to Cart -->
<label for="quantity" class="block mb-2">Quantity</label>
<input 
    type="number" 
    id="quantity" 
    min="1" 
    value="1" 
    class="form-control w-20 p-2 border border-gray-300 rounded mb-4"
    oninput="if (this.value < 1) this.value = 1;">
<button 
    onclick="addToCart()" 
    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 disabled:opacity-50"
    id="addToCartBtn" 
    disabled>
    Add to Cart
</button>


            <!-- Product Description -->
            <h3 class="text-lg font-semibold mt-6 mb-2">Product Details</h3>
            <p class="text-gray-600">{{ $product->description }}</p>

            <!-- Success Message -->
            <p id="successMessage" class="text-green-500 mt-4" style="display: none;">Product added to cart!</p>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sizeOptions = document.getElementById('sizeOptions');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const sizeError = document.getElementById('sizeError');
        let selectedSize = null;

        // Handle size selection
        sizeOptions.addEventListener('click', function (event) {
            if (event.target.classList.contains('size-box')) {
                const clickedSize = event.target.getAttribute('data-size');

                if (selectedSize === clickedSize) {
                    // Deselect the currently selected size
                    event.target.classList.remove('bg-blue-500', 'text-white');
                    event.target.classList.add('border-gray-300', 'hover:bg-gray-100');
                    selectedSize = null;
                    addToCartBtn.disabled = true;
                } else {
                    // Remove selection from other buttons
                    document.querySelectorAll('.size-box').forEach(box => {
                        box.classList.remove('bg-blue-500', 'text-white');
                        box.classList.add('border-gray-300', 'hover:bg-gray-100');
                    });

                    // Add selection to clicked button
                    event.target.classList.remove('border-gray-300', 'hover:bg-gray-100');
                    event.target.classList.add('bg-blue-500', 'text-white');
                    selectedSize = clickedSize;
                    sizeError.style.display = 'none';
                    addToCartBtn.disabled = false;
                }
            }
        });

        // Add to Cart
        window.addToCart = function () {
            if (!selectedSize) {
                sizeError.style.display = 'block';
                return;
            }

            // Hide the error message and show success message
            sizeError.style.display = 'none';
            document.getElementById('successMessage').style.display = 'block';
            setTimeout(() => {
                document.getElementById('successMessage').style.display = 'none';
            }, 3000);
        };
    });
</script>

@endsection
