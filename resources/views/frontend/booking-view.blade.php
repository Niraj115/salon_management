@extends('frontend.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 mt-10 rounded shadow">

    <h2 class="text-2xl font-bold text-green-600 mb-6">
        Appointment Booked Successfully 🎉
    </h2>

    <div class="space-y-3 text-gray-700">
        <p><strong>Name:</strong> {{ $appointment->customer->name }}</p>
        <p><strong>Phone:</strong> {{ $appointment->customer->phone }}</p>
        <p><strong>Service:</strong> {{ $appointment->service->name }}</p>
        <p><strong>Staff:</strong> {{ $appointment->staff->name }}</p>
        <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
        <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>

        <p>
            <strong>Status:</strong>
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">
                {{ ucfirst($appointment->status) }}
            </span>
        </p>
    </div>

    <div class="mt-6">
        <a href="/" class="text-pink-600 font-semibold hover:underline">
            ← Back to Home
        </a>
    </div>

</div>
@endsection
