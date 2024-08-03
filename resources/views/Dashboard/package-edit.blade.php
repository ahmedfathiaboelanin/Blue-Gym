@extends('layouts.dashboardLayout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/createForm.css') }}">
@endsection
@section('content')
<div class="container">
    <h1 class="mt-4">Update Package</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.packages') }}">ALL Packages</a></li>
        <li class="breadcrumb-item active">Update Package</li>
    </ol>
    <div class="row justify-content-center align-items-center">
        <x-edit-package-form :package="$package" />
    </div>
</div>
@endsection