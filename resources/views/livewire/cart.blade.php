<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Your Shopping Cart</h2>

    @if(session()->has('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    @if(count($cart) > 0)
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-3 px-6 text-left">Product</th>
                    <th class="py-3 px-6 text-center">Quantity</th>
                    <th class="py-3 px-6 text-center">Subtotal</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr class="border-b">
                        <td class="py-3 px-6 flex items-center space-x-4">
                            <img src="{{ asset('storage/' . $item['image']) }}" class="w-16 h-16 rounded">
                            <span>{{ $item['name'] }} ({{ $item['size'] ?? 'No Size' }})</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <input type="number" wire:change="updateCart({{ $id }}, $event.target.value)" value="{{ $item['quantity'] }}" min="1" class="w-16 p-2 border rounded text-center">
                        </td>
                        <td class="py-3 px-6 text-center">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td class="py-3 px-6 text-center">
                            <button wire:click="removeFromCart({{ $id }})" class="text-red-500 hover:text-red-700">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-between mt-6">
            <h3 class="text-xl font-semibold">Total: ${{ number_format($total, 2) }}</h3>
            <a href="#" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Proceed to Checkout</a>
        </div>
    @else
        <p class="text-gray-600">Your cart is empty.</p>
    @endif
</div>
