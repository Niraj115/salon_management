@extends('frontend.layouts.app')

@section('title', 'Book Appointment')

@section('content')
<section class="py-16 bg-gray-900">
    <div class="max-w-3xl mx-auto bg-gray-800 p-10 rounded-2xl shadow-xl">

        <h2 class="text-3xl font-extrabold text-pink-400 mb-8 text-center">
            Book Your Appointment
        </h2>

        <form method="POST" action="{{ route('frontend.book') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <input type="text" name="name" placeholder="Your Name"
                   class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400" required>

            <!-- Phone -->
            <input type="text" name="phone" placeholder="Phone Number"
                   class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400" required>

            <!-- Service -->
            <select name="service_id" class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
                <option value="">Select Service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>

            <!-- Staff -->
            <select name="staff_id" class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
                <option value="">Select Staff</option>
                @foreach($staffs as $staff)
                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                @endforeach
            </select>

            <!-- Date -->
            <input type="date" name="appointment_date"
                   class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400"
                   required>

            <!-- Time -->
            <input type="time" name="appointment_time"
                   class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400"
                   required>

            <button type="submit"
                    class="w-full bg-pink-400 hover:bg-pink-500 text-white font-bold py-3 rounded-lg shadow-lg transition transform hover:-translate-y-1">
                Book Now
            </button>
        </form>
    </div>
</section>
@endsection