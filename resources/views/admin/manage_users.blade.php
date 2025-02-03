@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
<div class="container mx-auto p-6">

    @if (session()->has('success'))
        <div class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <livewire:manage-users />
</div>
@endsection
