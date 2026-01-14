@extends('backend.layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Add Service</h2>

    <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="block mb-1">Service Name</label>
            <input type="text" name="name"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Price</label>
            <input type="number" name="price"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Duration (minutes)</label>
            <input type="number" name="duration"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Description</label>
            <textarea name="description"
                      class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Service Image</label>
            <input type="file" name="image"
                   class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Save Service
        </button>
    </form>
</div>
@endsection
