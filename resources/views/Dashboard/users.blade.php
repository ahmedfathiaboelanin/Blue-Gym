@extends('layouts.dashboardLayout')
@section('styles')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
<main>
    <div class="container-fluid py-10 font-mono">
        <h1 class="w-full fw-bold fs-1">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
        @if (session('success'))
            <p class="alert alert-success">
                {{ session('success') }}
            </p>
        @endif
        @if (session('error'))
            <p class="alert alert-danger">
                {{ session('error') }}
            </p>
        @endif
        <x-users-table :users="$users" />
    </div>
    <!-- Add User -->

</main>
@endsection