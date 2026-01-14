@extends('backend.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Services</h2>

    <a href="{{ route('services.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
        + Add Service
    </a>
</div>

@if(session('success'))
    <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600">Image</th>
                <th class="px-4 py-2 text-left text-gray-600">Name</th>
                <th class="px-4 py-2 text-left text-gray-600">Price</th>
                <th class="px-4 py-2 text-left text-gray-600">Duration</th>
                <th class="px-4 py-2 text-left text-gray-600">Status</th>
                <th class="px-4 py-2 text-left text-gray-600">Action</th>
            </tr>
        </thead>

        <tbody>
        @forelse($services as $service)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">
    @if($service->image)
        <img 
            src="{{ asset('storage/'.$service->image) }}"
            class="w-14 h-14 object-cover rounded border"
        >
    @else
        <span class="text-gray-400 text-sm">No Image</span>
    @endif
</td>

                <td class="px-4 py-2 font-medium">
                    {{ $service->name }}
                </td>

                <td class="px-4 py-2">
                    Rs {{ $service->price }}
                </td>

                <td class="px-4 py-2">
                    {{ $service->duration }} min
                </td>

                <td class="px-4 py-2">
                    @if($service->status)
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                            Active
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">
                            Inactive
                        </span>
                    @endif
                </td>

                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('services.edit', $service) }}"
                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow text-sm">
                        Edit
                    </a>

                    <form method="POST"
                          action="{{ route('services.destroy', $service) }}"
                          class="inline"
                          onsubmit="return confirm('Delete this service?')">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-gray-500">
                    No services found
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection
