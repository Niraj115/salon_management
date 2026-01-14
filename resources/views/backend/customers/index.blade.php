@extends('backend.layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Customers</h2>

        <div class="flex gap-3">
            {{-- Search --}}
            <form method="GET">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search customers..."
                       class="border rounded px-3 py-2 w-60">
            </form>

            <a href="{{ route('customers.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add Customer
            </a>
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($customers as $customer)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 font-medium">{{ $customer->name }}</td>
                    <td class="p-3">{{ $customer->phone ?? '-' }}</td>
                    <td class="p-3">{{ $customer->email ?? '-' }}</td>
                    <td class="p-3 text-center space-x-2">
                        <a href="{{ route('customers.edit',$customer->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <form action="{{ route('customers.destroy',$customer->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Delete customer?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center p-6 text-gray-500">
                        No customers found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $customers->withQueryString()->links() }}
    </div>

</div>
@endsection
