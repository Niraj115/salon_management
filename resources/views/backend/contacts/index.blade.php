@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Inbox</h1>

{{-- Success Message --}}
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead>
            <tr class="bg-gray-100 text-gray-700 uppercase text-xs">
                <th class="p-4">Name</th>
                <th class="p-4">Email</th>
                <th class="p-4">Subject</th>
                <th class="p-4">Date</th>
                <th class="p-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse($contacts as $contact)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="p-4 font-medium">
                        {{ $contact->name }}
                    </td>

                    <td class="p-4">
                        {{ $contact->email }}
                    </td>

                    <td class="p-4">
                        {{ $contact->subject }}
                    </td>

                    <td class="p-4">
                        {{ $contact->created_at->format('d M Y') }}
                    </td>

                    <td class="p-4 text-center">
                        <form action="{{ route('contacts.destroy', $contact->id) }}" 
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this message?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500">
                        No messages found.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>

@endsection