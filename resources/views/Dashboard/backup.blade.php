@extends('layouts.dashboardLayout')
@section('styles')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
<main>
    <div class="container-fluid py-10 font-mono">
        <h1 class="w-full fs-1 fw-bold">Backup</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
            <li class="breadcrumb-item active">Backup</li>
        </ol>
        <div class="d-flex gap-3">
            <a class="actionBtn add" href="{{ route('download.users')}}"><i class="fa-solid fa-download"></i> Download Users Table</a>
            <a class="actionBtn add" href="{{ route('download.packages')}}"><i class="fa-solid fa-download"></i> Download Packages Table</a>
            <a class="actionBtn add" href="{{ route('download.workouts')}}"><i class="fa-solid fa-download"></i> Download Workout Table</a>
            <a class="actionBtn add" href="{{ route('download.sql')}}"><i class="fa-solid fa-download"></i> Download Database s SQl</a>
        </div>
    </div>
    <!-- Add User -->
    @if(session()->has("error"))
    <div class="alert alert-danger">
        {{ session()->get("error") }}
    </div>
    @endif
</main>
@endsection