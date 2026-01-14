@extends('backend.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Staff List</h1>
    <a href="{{ route('staff.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
        + Add Staff
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto bg-white shadow rounded-lg">
    <table class="min-w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-gray-600 font-medium">Name</th>
                <th class="px-6 py-3 text-left text-gray-600 font-medium">Phone</th>
                <th class="px-6 py-3 text-left text-gray-600 font-medium">Role</th>
                <th class="px-6 py-3 text-left text-gray-600 font-medium">Status</th>
                <th class="px-6 py-3 text-left text-gray-600 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-3">{{ $staff->name }}</td>
                <td class="px-6 py-3">{{ $staff->phone }}</td>
                <td class="px-6 py-3">{{ $staff->role }}</td>
                <td class="px-6 py-3">
                    @if($staff->status)
                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-sm font-semibold">Active</span>
                    @else
                        <span class="bg-red-200 text-red-800 px-2 py-1 rounded-full text-sm font-semibold">Inactive</span>
                    @endif
                </td>
                <td class="px-6 py-3 space-x-2">
                    <a href="{{ route('staff.edit', $staff) }}" 
                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">Edit</a>

                    <form method="POST" action="{{ route('staff.destroy', $staff) }}" class="inline">
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
