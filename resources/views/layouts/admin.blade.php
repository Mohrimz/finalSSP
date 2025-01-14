<!DOCTYPE html>
<html lang="en">

<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="sidebar fixed top-0 left-0 w-64 h-full bg-blue-900 text-white p-6">
        <a href="#" class="text-2xl font-semibold mb-8 block text-center">Admin Panel</a>
        <ul>
            <li>
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="py-3 px-4 rounded-lg transition-all block {{ Route::currentRouteName() === 'admin.dashboard' ? 'bg-blue-700' : 'text-gray-300 hover:bg-blue-700' }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a 
                    href="{{ route('admin.products') }}" 
                    class="py-3 px-4 rounded-lg transition-all block {{ Route::currentRouteName() === 'admin.products' ? 'bg-blue-700' : 'text-gray-300 hover:bg-blue-700' }}">
                    Manage Products
                </a>
            </li>
            <li>
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="py-3 px-4 rounded-lg transition-all block {{ Route::currentRouteName() === 'admin.dashboard' ? 'bg-blue-700' : 'text-gray-300 hover:bg-blue-700' }}">
                    Manage Users
                </a>
            </li>
            <li>
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="py-3 px-4 rounded-lg transition-all block {{ Route::currentRouteName() === 'admin.dashboard' ? 'bg-blue-700' : 'text-gray-300 hover:bg-blue-700' }}">
                    Manage Orders
                </a>
            </li>
            <li>
                <a 
                    href="{{ route('home') }}" 
                    class="py-3 px-4 rounded-lg transition-all block text-gray-300 hover:bg-blue-700">
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content ml-64 p-6">
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
