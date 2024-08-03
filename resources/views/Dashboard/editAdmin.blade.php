@extends('layouts.dashboardLayout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/createForm.css') }}">
@endsection
@section('content')
<div class="container">
    <h1 class="mt-4">Edit Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admins') }}">Admins</a></li>
        <li class="breadcrumb-item active">Edit Admin</li>
    </ol>
    <div class="row justify-content-center align-items-center">
        <x-edit-admin-form route="admins.edit" :user="$user"/>
    </div>
</div>
@endsection