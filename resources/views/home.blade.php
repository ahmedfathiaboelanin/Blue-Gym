@extends('layouts.customLayout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('content')
    <div class="landing">
        <div class="container landing-content">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 col-10 d-flex flex-column gap-2">
                    <h1 class="title">
                        <span class="text-primary">Blue</span>-<span class="text-primary">Gym</span>
                    </h1>
                    <p class="lead d-flex flex-column">
                        <span class="fs-4 fw-5">Get Fit, Get Strong</span>
                        <span>
                            Transform your body and mind with our state-of-the-art gym facilities and expert trainers.
                        </span>
                    </p>
                    <div class="btns d-flex gap-2">
                        <a class="Login-btn" href="{{ route('login') }}">Login</a>
                        <a class="contact-btn" href="{{ route('contact') }}">Contant Us</a>
                    </div>
                    <div class="social-icons d-flex gap-3 mt-3">
                        <a href="#" class="d-block" style="--social-icon:#0F98F2">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="d-block" style="--social-icon:#14AD42">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="#" class="d-block" style="--social-icon:#E1306C">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="d-block " style="--social-icon:#0088CC">
                            <i class="fa-brands fa-telegram"></i>
                        </a>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-6">
                    <img src="{{ asset('img/hero.png') }}" alt="gym" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
        