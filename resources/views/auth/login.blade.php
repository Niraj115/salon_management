@extends('backend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl mb-4">Login</h2>

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-2 border" required>

        <button class="w-full bg-blue-600 text-white p-2 rounded">
            Login
        </button>
    </form>

    <p class="mt-4 text-sm">
        Don't have an account?
        <a href="/register" class="text-blue-500">Register</a>
    </p>
</div>
@endsection
