@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-3xl font-bold text-center mb-8">Admin Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Dashboard Cards -->
    <div class="bg-blue-600 text-white rounded-lg shadow-lg p-6 hover:scale-105 transition-all duration-300">
        <h2 class="text-lg font-semibold">Total Products</h2>
        <p class="text-2xl">{{ $totalProducts ?? 'N/A' }}</p>
        <a href="{{ route('admin.products') }}" class="mt-4 inline-block py-2 px-4 bg-blue-800 rounded-lg text-white">View Products</a>
    </div>
    <div class="bg-green-600 text-white rounded-lg shadow-lg p-6 hover:scale-105 transition-all duration-300">
        <h2 class="text-lg font-semibold">Total Users</h2>
        <p class="text-2xl">{{ $totalUsers ?? 'N/A' }}</p>
        <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-block py-2 px-4 bg-green-800 rounded-lg text-white">View Users</a>
    </div>
    <div class="bg-red-600 text-white rounded-lg shadow-lg p-6 hover:scale-105 transition-all duration-300">
        <h2 class="text-lg font-semibold">Total Orders</h2>
        <p class="text-2xl">{{ $totalOrders ?? 'N/A' }}</p>
        <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-block py-2 px-4 bg-red-800 rounded-lg text-white">View Orders</a>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="chart-container">
        <canvas id="productChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="orderChart"></canvas>
    </div>
</div>

<script>
    const productChart = new Chart(document.getElementById('productChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: @json($categories ?? []),
            datasets: [{
                label: 'Number of Products',
                data: @json($productCounts ?? []),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const orderChart = new Chart(document.getElementById('orderChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: @json($orderStatuses ?? []),
            datasets: [{
                label: 'Order Status',
                data: @json($orderCounts ?? []),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 205, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 205, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection
