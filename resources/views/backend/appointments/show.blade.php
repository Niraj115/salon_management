@extends('backend.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-6">Appointment Details</h2>

    <div class="space-y-4">
        <div class="flex justify-between">
            <span class="font-semibold">Customer:</span>
            <span>{{ $appointment->customer->name ?? 'N/A' }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold">Service:</span>
            <span>{{ $appointment->service->name ?? 'N/A' }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold">Staff:</span>
            <span>{{ $appointment->staff->name ?? 'N/A' }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold">Date:</span>
            <span>{{ $appointment->appointment_date }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold">Time:</span>
            <span>{{ $appointment->appointment_time }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold">Status:</span>
            <span class="capitalize">{{ $appointment->status }}</span>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('appointments.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded">
            Back
        </a>
    </div>
</div>
@endsection
