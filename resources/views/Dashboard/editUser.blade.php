@extends('layouts.dashboardLayout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/createForm.css') }}">
@endsection
@section('content')
<div class="container">
    <h1 class="mt-4">Edit User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></li>
        <li class="breadcrumb-item active">Edit User</li>
    </ol>
    <div class="row justify-content-center align-items-center">
        <x-edit-user-form route="users.edit" :user="$user"/>
    </div>
</div>
@endsection