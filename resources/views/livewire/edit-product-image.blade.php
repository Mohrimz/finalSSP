<div class="p-4 border rounded-lg bg-gray-50">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Upload Product Image</h2>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="text-green-600 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- File Input -->
    <input 
        type="file" 
        wire:model="image" 
        class="form-control w-full p-3 border border-gray-300 rounded-lg"
    >
    @error('image')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

    <!-- Progress Bar -->
    @if ($progress > 0)
        <div class="w-full bg-gray-200 rounded h-6 overflow-hidden mt-2">
            <div class="h-full bg-blue-500 transition-all duration-500" style="width: {{ $progress }}%;"></div>
        </div>
    @endif

    <!-- Current Image -->
    @if ($product->target_file)
        <img src="{{ asset('storage/' . $product->target_file) }}" alt="Product Image" class="mt-4 w-32 h-32 object-cover">
    @endif
</div>
