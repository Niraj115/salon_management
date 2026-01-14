@extends('frontend.layouts.app')

@section('content')

<div class="text-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-4">
        Welcome to Our Salon
    </h2>

    <p class="text-gray-600 mb-6">
        Professional hair, beauty & grooming services
    </p>

    <a href="/services"
       class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded shadow">
        View Services
    </a>
</div>

@endsection
