@extends('layouts.customLayout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/packages.css') }}">
@endsection
@section('content')
    <div class="landing">
        <h1 class="sec-title">Our Packages</h1>
        <div class="container">
            <div class="row justify-content-sm-start justify-content-center">
                @foreach ($packages as $package )
                    <div class="col-10 col-sm-6 col-md-4 p-4 package-wraper">
                        <div class="package-card" style="--main:#0d6efd">
                            <h3 class="padge" style="--padge-color:var(--bs-danger)">
                                {{ $package->badge }}
                            </h3>
                            <div class="package-content align-items-center d-flex flex-column gap-1">
                                <h1 class="package-icon">
                                    <i class="fa-solid fa-dumbbell"></i>
                                </h1>
                                <h3 class="package-title my-4">{{ $package->title }}</h3>
                                <p class="text-center text-cut text-white-50 m-0 p-0">{{ $package->description }}</p>
                                <p class="text-white-50 mb-0 mt-4 p-0">
                                    Price : 
                                    {{ $package->price }}$ / 
                                    <del>{{ $package->old_price }} $</span>
                                </p>
                                <p class="text-white-50 mb-4 p-0">
                                    Duration : {{ $package->months }} Month
                                </p>
                                <p class="text-warning mb-4 p-0">
                                    End Date : {{ $package->end_date }}
                                </p>
                            </div>
                            <div class="package-btn">
                                <a href="{{ route('contact') }}" class="">Contact Us</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
        