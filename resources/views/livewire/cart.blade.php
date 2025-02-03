<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8 text-center">Your Shopping Cart</h2>

    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-2 mb-6 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-lg rounded-lg">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-4 px-6 text-left">Product</th>
                        <th class="py-4 px-6 text-center">Quantity</th>
                        <th class="py-4 px-6 text-center">Subtotal</th>
                        <th class="py-4 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6 flex items-center space-x-4">
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 rounded-lg shadow">
                                <div>
                                    <p class="font-semibold">{{ $item['name'] }}</p>
                                    <p class="text-sm text-gray-500">Size: {{ $item['size'] ?? 'N/A' }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <input type="number" 
                                       wire:change="updateCart({{ $id }}, $event.target.value)" 
                                       value="{{ $item['quantity'] }}" 
                                       min="1" 
                                       oninput="if(this.value < 1){ this.value = 1; }"
                                       class="w-20 p-2 border rounded text-center focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </td>
                            <td class="py-4 px-6 text-center font-semibold">
                                ${{ number_format($item['price'] * $item['quantity'], 2) }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <button wire:click="removeFromCart({{ $id }})" 
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors duration-200">
                                    Remove
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center mt-8">
            <h3 class="text-2xl font-bold">Total: ${{ number_format($total, 2) }}</h3>
            <a href="{{ route('checkout.page') }}" class="mt-4 sm:mt-0 bg-blue-500 text-white px-8 py-3 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200">
    Proceed to Checkout
</a>

        </div>
    @else
        <p class="text-gray-600 text-center">Your cart is empty.</p>
    @endif
</div>
