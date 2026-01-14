@extends('backend.layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Service</h2>

<form method="POST" action="{{ route('services.update',$service) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $service->name }}"
           class="w-full mb-3 p-2 border" required>

    <input type="number" name="price" value="{{ $service->price }}"
           class="w-full mb-3 p-2 border" required>

    <input type="number" name="duration" value="{{ $service->duration }}"
           class="w-full mb-3 p-2 border" required>

    <textarea name="description"
              class="w-full mb-3 p-2 border">{{ $service->description }}</textarea>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
@endsection
