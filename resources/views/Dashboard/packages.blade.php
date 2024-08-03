@extends('layouts.dashboardLayout')
@section('styles')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
<main>
    <div class="container-fluid py-10 font-mono">
        <h1 class="w-full fw-bold fs-1">Packages</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
            <li class="breadcrumb-item active">Packages</li>
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
        <x-packages-table :packages="$packages" />
    </div>
    <!-- Add User -->

</main>
@endsection