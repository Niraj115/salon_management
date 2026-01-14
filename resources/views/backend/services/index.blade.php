@extends('backend.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Services</h2>
    <a href="{{ route('services.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
       + Add Service
    </a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600">Name</th>
                <th class="px-4 py-2 text-left text-gray-600">Price</th>
                <th class="px-4 py-2 text-left text-gray-600">Duration</th>
                <th class="px-4 py-2 text-left text-gray-600">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">{{ $service->name }}</td>
                <td class="px-4 py-2">Rs {{ $service->price }}</td>
                <td class="px-4 py-2">{{ $service->duration }} min</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('services.edit', $service) }}" 
                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">
                       Edit
                    </a>
                    <form method="POST" action="{{ route('services.destroy', $service) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
