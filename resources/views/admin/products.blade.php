@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')
    <h1 class="text-3xl font-bold text-center mb-8">Manage Products</h1>

    <!-- Add Product Component -->
    @livewire('add-product')

    <!-- Include Livewire Search Component -->
    @livewire('test-component')
@endsection
