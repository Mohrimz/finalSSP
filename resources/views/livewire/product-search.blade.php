<div>
    <!-- Search Input -->
    <input 
        type="text" 
        wire:model="search" 
        placeholder="Search for products..." 
        class="w-full p-3 rounded border border-gray-300"
    />

    <!-- Display Products -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-4">
        @forelse($products as $product)
            <div class="bg-white shadow-md rounded-lg p-4">
                <a href="#">
                    <img src="{{ asset('storage/' . $product->target_file) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                </a>
                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                <p class="text-gray-600">{{ $product->description }}</p>
                <p class="text-lg font-bold text-gray-700 mt-2">${{ number_format($product->price, 2) }}</p>
            </div>
        @empty
            <p class="text-gray-500 text-center col-span-full">No products found.</p>
        @endforelse
    </div>
</div>
