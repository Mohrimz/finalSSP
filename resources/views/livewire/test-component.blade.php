<div class="p-6 bg-gray-100">
    <!-- Search Input -->
    <div class="flex space-x-2 mb-6">
        <input 
            type="text" 
            wire:model="search" 
            placeholder="Search for products..." 
            class="w-full p-3 border border-gray-300 rounded-lg"
        />
        <button 
            wire:click="fetchProducts" 
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
            Search
        </button>
    </div>

    <!-- Display Products -->
    @if($products->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="relative border rounded-lg p-4 shadow hover:shadow-lg transition">
                    <!-- Edit Icon -->
                    <a 
                        href="{{ route('admin.edit', $product->id) }}" 
                        class="absolute top-2 right-2 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition"
                        title="Edit Product">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l7.071-7.071a2 2 0 012.828 0l2.828 2.828a2 2 0 010 2.828L13 16.828M9 11L4.828 15.172a4 4 0 01-5.656 0L9 11zm0 0l4.828-4.828a4 4 0 015.656 0L9 11z" />
                        </svg>
                    </a>
                    <!-- Product Details -->
                    <img src="{{ asset('storage/' . $product->target_file) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600">${{ $product->price }}</p>
                    <p class="text-gray-500 text-sm">{{ \Illuminate\Support\Str::limit($product->description, 50) }}</p>
                    
                    <!-- Activate/Deactivate Buttons -->
                    <div class="mt-4">
                        @if($product->status === 'active')
                            <button 
                                wire:click="toggleStatus({{ $product->id }}, 'inactive')" 
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                Deactivate
                            </button>
                        @else
                            <button 
                                wire:click="toggleStatus({{ $product->id }}, 'active')" 
                                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                Activate
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500 mt-6">No products found.</p>
    @endif
</div>
