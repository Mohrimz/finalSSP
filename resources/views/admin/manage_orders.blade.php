@extends('layouts.admin')

@section('title', 'Manage Orders')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Manage Orders</h1>

    <!-- Flash Message -->
    @if (session('success'))
        <div class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Orders Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Address</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($orders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">#{{ $order->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->user_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ Str::limit($order->user_address, 50) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->product_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->product_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->quantity }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            ${{ number_format($order->total_price, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->order_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Edit Link -->
                            <a href="{{ route('admin.manage.orders.edit', $order->id) }}" 
                               class="text-blue-600 hover:text-blue-800 mr-3">
                                Edit
                            </a>
                            
                            <!-- Delete Form -->
                            <form action="{{ route('admin.manage.orders.destroy', $order->id) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this order?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="p-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
