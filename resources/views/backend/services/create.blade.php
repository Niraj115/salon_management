@extends('backend.layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Add Service</h2>

<form method="POST" action="{{ route('services.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Service Name"
           class="w-full mb-3 p-2 border" required>

    <input type="number" name="price" placeholder="Price"
           class="w-full mb-3 p-2 border" required>

    <input type="number" name="duration" placeholder="Duration (minutes)"
           class="w-full mb-3 p-2 border" required>

    <textarea name="description" placeholder="Description"
              class="w-full mb-3 p-2 border"></textarea>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Save
    </button>
</form>
@endsection
