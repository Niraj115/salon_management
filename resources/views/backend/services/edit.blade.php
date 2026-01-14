@extends('backend.layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Service</h2>

    <form method="POST"
          action="{{ route('services.update', $service) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block mb-1">Service Name</label>
            <input type="text" name="name"
                   value="{{ $service->name }}"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Price</label>
            <input type="number" name="price"
                   value="{{ $service->price }}"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Duration (minutes)</label>
            <input type="number" name="duration"
                   value="{{ $service->duration }}"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Description</label>
            <textarea name="description"
                      class="w-full p-2 border rounded">{{ $service->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Service Image</label>

            @if($service->image)
                <img src="{{ asset('storage/services/'.$service->image) }}"
                     class="w-24 mb-2 rounded">
            @endif

            <input type="file" name="image"
                   class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="1" {{ $service->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$service->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update Service
        </button>
    </form>
</div>
@endsection
