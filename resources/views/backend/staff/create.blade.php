@extends('backend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow mt-10">

    <h2 class="text-2xl font-bold mb-6 text-center">Add Staff</h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('staff.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="e.g. 9801234567">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Role</label>
            <input type="text" name="role" value="{{ old('role') }}"
                class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="e.g. Hair Stylist">
        </div>

        <div class="mb-6">
            <label class="inline-flex items-center">
                <input type="checkbox" name="status" value="1" checked
                    class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2 font-medium">Active</span>
            </label>
        </div>

        <button type="submit" 
                class="w-full bg-blue-600 text-white p-3 rounded hover:bg-blue-700 transition font-medium">
            Add Staff
        </button>
    </form>
</div>
@endsection
