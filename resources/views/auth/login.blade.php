@extends('frontend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-gray-800 p-8 rounded-2xl shadow-xl mt-16">
    <h2 class="text-3xl font-extrabold text-pink-400 mb-8 text-center">
        Login
    </h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <input type="email" name="email"
               class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400"
               placeholder="Email" required>

        <input type="password" name="password"
               class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400"
               placeholder="Password" required>

        <button type="submit"
                class="w-full bg-pink-400 hover:bg-pink-500 text-white font-bold py-3 rounded-lg shadow-lg transition transform hover:-translate-y-1">
            Login
        </button>
    </form>
</div>
@endsection
