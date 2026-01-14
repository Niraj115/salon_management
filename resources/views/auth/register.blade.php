@extends('backend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl mb-4">Register</h2>

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="name" placeholder="Name"
               class="w-full mb-3 p-2 border" required>

        <input type="email" name="email" placeholder="Email"
               class="w-full mb-3 p-2 border" required>

        <input type="password" name="password" placeholder="Password"
               class="w-full mb-3 p-2 border" required>

        <input type="password" name="password_confirmation"
               placeholder="Confirm Password"
               class="w-full mb-3 p-2 border" required>

        <button class="w-full bg-green-600 text-white p-2 rounded">
            Register
        </button>
    </form>
</div>
@endsection
