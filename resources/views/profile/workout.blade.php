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
    <div class="w-100 d-flex justify-content-center flex-column align-items-start py-5">
        <div class="w-100 p-0 workoutTable table-responsive">
            <table class="w-100 table mb-0 table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th class="text-start px-3">Day</th>
                        <th class="text-start px-3">Workout</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-start px-3">Saturday</td>
                        <td class="text-start px-3">{{ $workout->saturday??'No Workout' }}</td>
                    </tr>
                    <tr>
                        <td class="text-start px-3">Sunday</td>
                        <td class="text-start px-3">{{ $workout->sunday??'No Workout' }}</td>
                    </tr>
                    <tr>
                        <td class="text-start px-3">Monday</td>
                        <td class="text-start px-3">{{ $workout->monday??'No Workout' }}</td>
                    </tr>
                    <tr>
                        <td class="text-start px-3">Tuesday</td>
                        <td class="text-start px-3">{{ $workout->tuesday??'No Workout' }}</td>
                    </tr>
                    <tr>
                        <td class="text-start px-3">Wednesday</td>
                        <td class="text-start px-3">{{ $workout->wednesday??'No Workout' }}</td>
                    </tr>
                    <tr>
                        <td class="text-start px-3">Thursday</td>
                        <td class="text-start px-3">{{ $workout->thursday??'No Workout' }}</td>
                    </tr>
                    <tr>
                        <td class="text-start px-3">Friday</td>
                        <td class="text-start px-3">{{ $workout->friday??'No Workout' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-3 w-100">
            <a href="{{ route('profile.workout-edit-table') }}" class="d-block w-100 btn btn-primary">Edit</a>
        </div>
    </div>
@endSection