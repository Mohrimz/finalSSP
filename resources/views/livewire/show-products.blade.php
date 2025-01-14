<div class="mt-6 bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Products</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="border rounded-lg p-4 shadow hover:shadow-lg transition">
                <img src="{{ asset('storage/' . $product->target_file) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600">${{ $product->price }}</p>
                <p class="text-gray-500 text-sm">{{ \Illuminate\Support\Str::limit($product->description, 50) }}</p>
            </div>
        @endforeach
    </div>
</div>
