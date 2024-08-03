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
        <form method="POST" action="{{ route('profile.workout-edit-logic') }}" class="w-100 d-flex flex-column justify-content-center align-items-start py-5">
            @csrf
            <div class="col-md w-100 col-11 p-0 workoutTable table-responsive">
                <table class="table mb-0 table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th class="text-start px-3">Day</th>
                            <th class="text-start px-3">Workout</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-3">Saturday</td>
                            <td class="text-start px-3"><textarea name="saturday" id="" class="p-2 w-100">{{ $workout->saturday??'No Workout' }}</textarea></td>
                        </tr>
                        <tr>
                            <td class="text-start px-3">Sunday</td>
                            <td class="text-start px-3"><textarea name="sunday" id="" class="p-2 w-100">{{ $workout->sunday??'No workout' }}</textarea></td>
                        </tr>
                        <tr>
                            <td class="text-start px-3">Monday</td>
                            <td class="text-start px-3"><textarea name="monday" id="" class="p-2 w-100">{{ $workout->monday??'No workout' }}</textarea></td>
                        </tr>
                        <tr>
                            <td class="text-start px-3">Tuesday</td>
                            <td class="text-start px-3"><textarea name="tuesday" id="" class="p-2 w-100">{{ $workout->tuesday??'No workout' }}</textarea></td>
                        </tr>
                        <tr>
                            <td class="text-start px-3">Wednesday</td>
                            <td class="text-start px-3"><textarea name="wednesday" id="" class="p-2 w-100">{{ $workout->wednesday??'No workout' }}</textarea></td>
                        </tr>
                        <tr>
                            <td class="text-start px-3">Thursday</td>
                            <td class="text-start px-3"><textarea name="thursday" id="" class="p-2 w-100">{{ $workout->thursday??'No workout' }}</textarea></td>
                        </tr>
                        <tr>
                            <td class="text-start px-3">Friday</td>
                            <td class="text-start px-3"><textarea name="friday" id="" class="p-2 w-100">{{ $workout->friday??'No workout' }}</textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="d-block bg-success py-2 border-none border fs-6 text-light mt-3 w-100">Update</button>
        </form>
@endSection