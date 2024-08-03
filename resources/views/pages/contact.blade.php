@extends('layouts.customLayout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection
@section('content')
    <div class="landing">
        <div class="container landing-content">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 col-11 form-col d-flex flex-column gap-2">
                    <form action="{{ route('sendMail') }}" method="get">
                        <h1> Contact Us </h1>
                        <input name="name" type="text" id="name" placeholder="Enter Your Name">
                        <input name="email" type="email" class="" id="email" placeholder="Enter Your Email">
                        <textarea name="message" id="message" placeholder="Message"></textarea>
                        <button type="submit" class="contact-btn">Send</button>
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
                    </form>
                </div>
                <div class="col-md-6 col-11 mt-5 mt-md-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3421.5904882204036!2d31.16883192536944!3d30.953999874478264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7bb9bd113f823%3A0x1d88b3c196cb7d47!2sBLUE%20GYM%20%26SPA!5e0!3m2!1sar!2seg!4v1711166809027!5m2!1sar!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
        