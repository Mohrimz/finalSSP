@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')
    <h1 class="text-3xl font-bold text-center mb-8">Manage Products</h1>

    @livewire('add-product')

    @livewire('test-component')
@endsection
