@extends('backend.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Staff</h2>

    <a href="{{ route('staff.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add Staff
    </a>
</div>

@if(session('success'))
    <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
<table class="min-w-full bg-white rounded shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2">Photo</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Role</th>
            <th class="px-4 py-2">Experience</th>
            <th class="px-4 py-2">Phone</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach($staffs as $staff)
        <tr class="border-b">
            <td class="px-4 py-2">
                @if($staff->image)
                    <img src="{{ asset('storage/'.$staff->image) }}"
                         class="w-12 h-12 rounded object-cover">
                @else
                    <span class="text-gray-400">No Photo</span>
                @endif
            </td>

            <td class="px-4 py-2">{{ $staff->name }}</td>
            <td class="px-4 py-2">{{ $staff->role }}</td>
           <td class="px-4 py-2"> {{ $staff->experience ?? 'N/A' }} years</td>

            <td class="px-4 py-2">{{ $staff->phone }}</td>

            <td class="px-4 py-2">
                @if($staff->status)
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
                <a href="{{ route('staff.edit', $staff) }}"
                   class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                    Edit
                </a>

                <form method="POST"
                      action="{{ route('staff.destroy', $staff) }}"
                      class="inline"
                      onsubmit="return confirm('Delete staff?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">
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
