@extends('backend.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-gray-800">Reports</h1>

<div class="bg-white shadow-lg rounded-lg p-6 mb-6">
    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Service wise Appointments</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 font-medium">Service</th>
                    <th class="px-6 py-3 text-left text-gray-600 font-medium">Total Appointments</th>
                </tr>
            </thead>
            <tbody>
                @foreach($serviceReport as $row)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3">{{ $row->service->name ?? 'N/A' }}</td>
                    <td class="px-6 py-3">{{ $row->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="bg-white shadow-lg rounded-lg p-6 mb-6">
    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Staff wise Appointments</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 font-medium">Staff</th>
                    <th class="px-6 py-3 text-left text-gray-600 font-medium">Total Appointments</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffReport as $row)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3">{{ $row->staff->name ?? 'N/A' }}</td>
                    <td class="px-6 py-3">{{ $row->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Monthly Appointments</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 font-medium">Month</th>
                    <th class="px-6 py-3 text-left text-gray-600 font-medium">Total Appointments</th>
                </tr>
            </thead>
            <tbody>
                @foreach($monthlyReport as $row)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3">{{ date('F', mktime(0,0,0,$row->month,1)) }}</td>
                    <td class="px-6 py-3">{{ $row->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
