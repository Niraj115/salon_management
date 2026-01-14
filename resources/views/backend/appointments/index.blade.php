@extends('backend.layouts.app')

@section('content')

{{-- Header --}}
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Appointments</h1>

    <a href="{{ route('appointments.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Add Appointment
    </a>
</div>

{{-- Table --}}
<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="p-2">Customer</th>
            <th class="p-2">Service</th>
            <th class="p-2">Staff</th>
            <th class="p-2">Date</th>
            <th class="p-2">Time</th>
            <th class="p-2">Status</th>
            <th class="p-2">Action</th>
        </tr>
    </thead>

    <tbody>
    @forelse($appointments as $a)
        <tr class="border-t">
            <td class="p-2">{{ $a->customer?->name }}</td>
            <td class="p-2">{{ $a->service->name }}</td>
            <td class="p-2">{{ $a->staff->name }}</td>
            <td class="p-2">{{ $a->appointment_date }}</td>
            <td class="p-2">{{ $a->appointment_time }}</td>
            <td class="p-2 font-semibold">
                {{ ucfirst($a->status) }}
            </td>

            <td class="p-2 space-x-2">
                <a class="text-blue-600" href="{{ route('appointments.show',$a->id) }}">View</a>
                <a class="text-green-600" href="{{ route('appointments.edit',$a->id) }}">Edit</a>

                {{-- Confirm / Cancel --}}
                @if($a->status === 'pending')
                    <form class="inline" method="POST" action="{{ route('appointments.confirm',$a->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="text-indigo-600">Confirm</button>
                    </form>

                    <form class="inline" method="POST" action="{{ route('appointments.cancel',$a->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="text-yellow-600">Cancel</button>
                    </form>
                @endif

                {{-- Delete --}}
                <form class="inline"
                      method="POST"
                      action="{{ route('appointments.destroy',$a->id) }}"
                      onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center p-4 text-gray-500">
                No appointments found
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

@endsection
