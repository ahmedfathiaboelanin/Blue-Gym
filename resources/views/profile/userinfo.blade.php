@php
    use Carbon\Carbon;
@endphp
@extends('layouts.profileLayout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection
@section('content')
    <div class="container content py-5">
        <div class=" profile-data row gap-3">
            <div class="userInfo col">
                <div class="infoRow">
                    <x-readonly-input lable="Name" value="{{ $user->name }}" type="text"/>
                    <x-readonly-input lable="Email" value="{{ $user->email }}" type="email"/>
                </div>
                <div class="infoRow">
                    <x-readonly-input lable="Phone" value="{{ $user->phone }}" type="text"/>
                    <x-readonly-input lable="Role" value="{{ $user->role }}" type="text"/>
                </div>
                <div class="infoRow">
                    <x-readonly-input lable="Gender" value="{{ $user->gender }}" type="text"/>
                    <x-readonly-input lable="Duration" value="{{ $user->number_of_months }}" type="text"/>
                </div>
                <div class="infoRow">
                    <x-readonly-input lable="Paid" value="{{ $user->the_price_of_registration }}" type="text"/>
                    <x-readonly-input lable="Start Date" value="{{ $user->start_date }}" type="text"/>
                </div>
                <div class="infoRow">
                    <x-readonly-input lable="End Date" value="{{ $user->end_date }}" type="text"/>
                </div>
            </div>
            @if(auth()->user()->role !== 'user')
            
            <a href="{{ route('users.editform', $user->id) }}" class="w-100 edit text-light d-block text-center py-2">Edit</a>
            @else
            <p class="alert alert-info editAlert text-success">
                Would you like to edit your information? Please contact the admin for assistance.
            </p>
            @endif
        </div>
    </div>
@endSection