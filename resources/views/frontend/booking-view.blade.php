@extends('frontend.layouts.app')

@section('title', 'Appointment Confirmed')

@section('content')
<section class="py-16 bg-gray-900">
    <div class="max-w-3xl mx-auto bg-gray-800 p-10 rounded-2xl shadow-xl text-gray-100">

        <h2 class="text-3xl font-extrabold text-green-400 mb-8 text-center">
            Appointment Booked Successfully 
        </h2>

        <div class="space-y-4 text-gray-300">
            <p><strong>Name:</strong> {{ $appointment->customer->name }}</p>
            <p><strong>Phone:</strong> {{ $appointment->customer->phone }}</p>
            <p><strong>Service:</strong> {{ $appointment->service->name }}</p>
            <p><strong>Staff:</strong> {{ $appointment->staff->name }}</p>
            <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
            <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>

            <p>
                <strong>Status:</strong>
                <span class="bg-yellow-500 text-gray-900 px-3 py-1 rounded-full font-semibold">
                    {{ ucfirst($appointment->status) }}
                </span>
            </p>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('home') }}"
               class="inline-block bg-pink-400 hover:bg-pink-500 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition transform hover:-translate-y-1">
                ← Back to Home
            </a>
        </div>
    </div>
</section>
@endsection