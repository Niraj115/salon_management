@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">

    <div class="bg-white p-6 shadow rounded">
        <h2 class="text-gray-500">Total Services</h2>
        <p class="text-3xl font-bold">{{ $totalServices }}</p>
    </div>
    <div class="bg-white p-6 shadow rounded">
        <h2 class="text-gray-500">Total Staff</h2>
        <p class="text-3xl font-bold">{{ $totalStaff }}</p>
    </div>

    <div class="bg-white p-6 shadow rounded">
        <h2 class="text-gray-500">Total Appointments</h2>
        <p class="text-3xl font-bold">{{ $totalAppointments }}</p>
    </div>

    <div class="bg-white p-6 shadow rounded">
        <h2 class="text-gray-500">Today’s Appointments</h2>
        <p class="text-3xl font-bold">{{ $todayAppointments }}</p>
    </div>

</div>

@endsection
