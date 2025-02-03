<div>
    <button 
        class="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-all focus:outline-none z-50"
        wire:click="$set('showModal', true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
    </button>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <!-- Modal Content -->
            <div class="bg-white rounded-lg shadow-lg w-1/2 p-6 relative z-50">
                <h2 class="text-2xl font-bold mb-4">Add Product</h2>
                <form wire:submit.prevent="saveProduct">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold">Product Name</label>
                        <input type="text" id="name" wire:model="name" class="form-control w-full p-3 border border-gray-300 rounded-lg">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 font-semibold">Price</label>
                        <input type="number" id="price" wire:model="price" class="form-control w-full p-3 border border-gray-300 rounded-lg" min="0">
                        @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="size" class="block text-gray-700 font-semibold">Select Sizes</label>
                        <select id="size" wire:model="size" multiple class="form-control w-full p-3 border border-gray-300 rounded-lg">
                            @foreach(range(30, 45) as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                        @error('size') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold">Description</label>
                        <textarea id="description" wire:model="description" class="form-control w-full p-3 border border-gray-300 rounded-lg" rows="4"></textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-semibold">Upload Image</label>
                        <input type="file" id="image" wire:model="image" class="form-control w-full p-3 border border-gray-300 rounded-lg">
                        @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                        Save
                    </button>
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-all" wire:click="$set('showModal', false)">
                        Cancel
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
