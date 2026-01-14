@extends('backend.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow mt-6">

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Add Customer</h2>
        <p class="text-gray-500 text-sm">Enter customer details below</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('customers.store') }}" class="space-y-5">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">
                Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" required
                   class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Phone --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">
                Phone <span class="text-red-500">*</span>
            </label>
            <input type="text" name="phone" required
                   class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Email --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Email</label>
            <input type="email" name="email"
                   class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Address --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Address</label>
            <textarea name="address" rows="3"
                      class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('customers.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Cancel
            </a>

            <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save Customer
            </button>
        </div>

    </form>
</div>

@endsection
