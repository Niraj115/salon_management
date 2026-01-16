@extends('backend.layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Staff</h2>

<form method="POST"
      action="{{ route('staff.update', $staff) }}"
      enctype="multipart/form-data"
      class="max-w-xl bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')

    <label class="block mb-2 font-medium">Name</label>
    <input type="text" name="name"
           value="{{ $staff->name }}"
           class="w-full mb-4 p-2 border rounded"
           required>

    <label class="block mb-2 font-medium">Role</label>
    <input type="text" name="role"
           value="{{ $staff->role }}"
           class="w-full mb-4 p-2 border rounded">

    <label class="block mb-2 font-medium">Experience (Years)</label>
    <input type="number" name="experience"
           value="{{ $staff->experience }}"
           class="w-full mb-4 p-2 border rounded">

    <label class="block mb-2 font-medium">Phone</label>
    <input type="text" name="phone"
           value="{{ $staff->phone }}"
           class="w-full mb-4 p-2 border rounded">

    @if($staff->image)
        <img src="{{ asset('storage/'.$staff->image) }}"
             class="w-20 h-20 rounded mb-3">
    @endif

    <label class="block mb-2 font-medium">Change Photo</label>
    <input type="file" name="image"
           class="w-full mb-4 p-2 border rounded">

    <label class="flex items-center gap-2 mb-4">
        <input type="checkbox" name="status"
               {{ $staff->status ? 'checked' : '' }}>
        Active
    </label>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Update Staff
    </button>
</form>
@endsection
