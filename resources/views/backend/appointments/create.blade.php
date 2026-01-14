@extends('backend.layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow mt-10">

    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
        Book Appointment
    </h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('appointments.store') }}" class="space-y-4">
        @csrf

        {{-- Customer --}}
        <div>
            <label class="block mb-1 font-medium">Customer *</label>
            <select name="customer_id" required class="w-full p-3 border rounded">
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Service --}}
        <div>
            <label class="block mb-1 font-medium">Service *</label>
            <select name="service_id" required class="w-full p-3 border rounded">
                <option value="">Select Service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Staff --}}
        <div>
            <label class="block mb-1 font-medium">Staff *</label>
            <select name="staff_id" required class="w-full p-3 border rounded">
                <option value="">Select Staff</option>
                @foreach($staffs as $staff)
                    <option value="{{ $staff->id }}">
                        {{ $staff->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Date *</label>
            <input type="date" name="appointment_date" class="w-full p-3 border rounded" required>
        </div>

        <div>
            <label>Time *</label>
            <input type="time" name="appointment_time" class="w-full p-3 border rounded" required>
        </div>

        <button class="w-full bg-blue-600 text-white p-3 rounded">
            Book Appointment
        </button>
    </form>
</div>
@endsection
