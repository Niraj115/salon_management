@extends('frontend.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 mt-10 rounded shadow">

    <h2 class="text-2xl font-bold mb-6 text-pink-600">
        Book Appointment
    </h2>

    <form method="POST" action="{{ route('frontend.book') }}" class="space-y-4">
        @csrf

        <input type="text" name="name" placeholder="Your Name"
               class="w-full border p-2 rounded" required>

        <input type="text" name="phone" placeholder="Phone Number"
               class="w-full border p-2 rounded" required>

        <select name="service_id" class="w-full border p-2 rounded" required>
            <option value="">Select Service</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>

        <select name="staff_id" class="w-full border p-2 rounded" required>
            <option value="">Select Staff</option>
            @foreach($staffs as $staff)
                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
            @endforeach
        </select>

        <input type="date" name="appointment_date"
               class="w-full border p-2 rounded" required>

        <input type="time" name="appointment_time"
               class="w-full border p-2 rounded" required>

        <button class="bg-pink-600 text-white px-6 py-2 rounded hover:bg-pink-700">
            Book Now
        </button>
    </form>

</div>
@endsection
