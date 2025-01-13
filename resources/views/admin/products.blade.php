<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="sidebar fixed top-0 left-0 w-64 h-full bg-blue-900 text-white p-6">
        <a href="#" class="text-2xl font-semibold mb-8 block text-center">Admin Panel</a>
        <ul>
        <li><a href="{{ route('admin.dashboard') }}" class="text-gray-300 py-3 px-4 bg-blue-700 rounded-lg transition-all block">Dashboard</a></li>
            <li><a href="{{ route('admin.products') }}" class="text-gray-300 py-3 px-4 hover:bg-blue-700 rounded-lg mt-2 transition-all block">Manage Products</a></li>
            <li><a href="{{ route('admin.dashboard') }}" class="text-gray-300 py-3 px-4 hover:bg-blue-700 rounded-lg mt-2 transition-all block">Manage Users</a></li>
            <li><a href="{{ route('admin.dashboard') }}" class="text-gray-300 py-3 px-4 hover:bg-blue-700 rounded-lg mt-2 transition-all block">Manage Orders</a></li>
            <li><a href="{{ route('logout') }}" class="text-gray-300 py-3 px-4 hover:bg-blue-700 rounded-lg mt-2 transition-all block">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content ml-64 p-6">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Manage Products</h2>

        <!-- Search Form -->
        <form method="GET" class="mb-6">
            <div class="flex space-x-2">
                <input type="text" name="search" class="form-control p-3 w-1/2 border-gray-300 rounded-lg" placeholder="Search products..." value="{{ request()->get('search') }}">
                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all">Search</button>
            </div>
        </form>

        <a href="{{ route('admin.products') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg mb-6 hover:bg-green-700 transition-all inline-block">Add New Product</a>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg p-6">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="py-2 px-4">Image</th>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Size</th>
                        <th class="py-2 px-4">Price</th>
                        <th class="py-2 px-4">Description</th>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-t">
                            <td class="py-3 px-4">
                                <img src="{{ asset('storage/' . $product->target_file) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-lg">
                            </td>
                            <td class="py-3 px-4">{{ $product->name }}</td>
                            <td class="py-3 px-4">{{ $product->size }}</td>
                            <td class="py-3 px-4">${{ $product->price }}</td>
                            <td class="py-3 px-4">{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>
                            <td class="py-3 px-4">{{ $product->status }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.products', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">Edit</a>
                                @if ($product->status === 'active')
                                    <a href="{{ route('admin.products', ['id' => $product->id, 'action' => 'deactivate']) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition-all ml-2">Deactivate</a>
                                @else
                                    <a href="{{ route('admin.products', ['id' => $product->id, 'action' => 'activate']) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all ml-2">Activate</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination (optional) -->
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>

    </div>

</body>

</html>
