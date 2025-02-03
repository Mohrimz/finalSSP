<div>
    <!-- Select Size -->
    <label for="size" class="block mb-2">Select Size</label>
    <div class="flex flex-wrap gap-2 mb-4">
        @php
            $sizes = explode(',', $product->size);
        @endphp
        @if (!empty($sizes) && count($sizes) > 0 && $sizes[0] !== '')
            @foreach ($sizes as $size)
                <button 
                    wire:click="selectSize('{{ $size }}')"
                    class="size-box border border-gray-300 px-4 py-2 rounded hover:bg-gray-100 {{ $selectedSize === $size ? 'bg-blue-500 text-white' : '' }}">
                    {{ $size }}
                </button>
            @endforeach
        @else
            <p class="text-gray-500">No sizes available</p>
        @endif
    </div>

    <!-- Quantity and Add to Cart -->
    <label for="quantity" class="block mb-2">Quantity</label>
    <input 
        type="number" 
        wire:model="quantity"
        min="1" 
        class="form-control w-20 p-2 border border-gray-300 rounded mb-4">

    <button 
        wire:click="addToCart" 
        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 disabled:opacity-50">
        Add to Cart
    </button>

    @if (session()->has('success'))
        <p class="text-green-500 mt-4">{{ session('success') }}</p>
    @endif
    @if (session()->has('error'))
        <p class="text-red-500 mt-4">{{ session('error') }}</p>
    @endif
</div>
