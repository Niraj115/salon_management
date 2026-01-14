@extends('frontend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email"
               class="w-full p-2 border rounded mb-3"
               placeholder="Email" required>

        <input type="password" name="password"
               class="w-full p-2 border rounded mb-3"
               placeholder="Password" required>

        <button class="w-full bg-pink-600 text-white py-2 rounded">
            Login
        </button>
    </form>
</div>
@endsection
