@extends('backend.layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow mt-10">

    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
        Edit Appointment
    </h2>

    {{-- Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('appointments.update', $appointment->id) }}"
          class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Customer --}}
        <div>
            <label class="block mb-1 font-medium">Customer *</label>
            <select name="customer_id" required class="w-full p-3 border rounded">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ $appointment->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Service --}}
        <div>
            <label class="block mb-1 font-medium">Service *</label>
            <select name="service_id" required class="w-full p-3 border rounded">
                @foreach($services as $service)
                    <option value="{{ $service->id }}"
                        {{ $appointment->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Staff --}}
        <div>
            <label class="block mb-1 font-medium">Staff *</label>
            <select name="staff_id" required class="w-full p-3 border rounded">
                @foreach($staffs as $staff)
                    <option value="{{ $staff->id }}"
                        {{ $appointment->staff_id == $staff->id ? 'selected' : '' }}>
                        {{ $staff->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Date --}}
        <div>
            <label class="block mb-1 font-medium">Date *</label>
            <input type="date" name="appointment_date"
                   value="{{ $appointment->appointment_date }}"
                   class="w-full p-3 border rounded" required>
        </div>

        {{-- Time --}}
        <div>
            <label class="block mb-1 font-medium">Time *</label>
            <input type="time" name="appointment_time"
                   value="{{ $appointment->appointment_time }}"
                   class="w-full p-3 border rounded" required>
        </div>

        <button class="w-full bg-blue-600 text-white p-3 rounded">
            Update Appointment
        </button>
    </form>
</div>
@endsection

