@extends('backend.layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">Add Staff</h2>

<form method="POST"
      action="{{ route('staff.store') }}"
      enctype="multipart/form-data"
      class="max-w-xl bg-white p-6 rounded shadow">
    @csrf

    <label class="block mb-2 font-medium">Name</label>
    <input type="text" name="name"
           class="w-full mb-4 p-2 border rounded"
           required>

    <label class="block mb-2 font-medium">Role</label>
    <input type="text" name="role"
           placeholder="Hair Stylist / Makeup Artist"
           class="w-full mb-4 p-2 border rounded">

    <label class="block mb-2 font-medium">Experience (Years)</label>
    <input type="number" name="experience"
           class="w-full mb-4 p-2 border rounded">

    <label class="block mb-2 font-medium">Phone</label>
    <input type="text" name="phone"
           class="w-full mb-4 p-2 border rounded">

    <label class="block mb-2 font-medium">Photo</label>
    <input type="file" name="image"
           class="w-full mb-4 p-2 border rounded">

    <label class="flex items-center gap-2 mb-4">
        <input type="checkbox" name="status" checked>
        Active
    </label>

    <button class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded">
        Save Staff
    </button>
</form>
@endsection
