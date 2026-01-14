@extends('backend.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow mt-6">

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Customer</h2>
        <p class="text-gray-500 text-sm">Update customer information</p>
    </div>

    {{-- Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('customers.update', $customer) }}" class="space-y-5">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">
                Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" value="{{ old('name', $customer->name) }}" required
                   class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Phone --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">
                Phone <span class="text-red-500">*</span>
            </label>
            <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" required
                   class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Email --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $customer->email) }}"
                   class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Address --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Address</label>
            <textarea name="address" rows="3"
                      class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('address', $customer->address) }}</textarea>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('customers.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Cancel
            </a>

            <button type="submit"
                    class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Update Customer
            </button>
        </div>

    </form>
</div>

@endsection
