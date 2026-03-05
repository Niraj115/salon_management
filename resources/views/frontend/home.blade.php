@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

<!-- HERO SECTION -->
<section class="relative h-screen bg-cover bg-center flex items-center justify-center"
         style="background-image: url('{{ asset('images/heroo.jpg') }}');">

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>

    <!-- Hero Content -->
    <div class="relative z-10 text-center px-6 md:px-0 max-w-3xl">
        <h1 class="text-5xl md:text-6xl font-extrabold text-pink-400 mb-6 leading-tight animate-fadeInDown">
            PRECISION <br>
            CUTTING & GROOMING
        </h1>

        <p class="text-gray-300 text-lg md:text-xl mb-8 animate-fadeInUp">
            Expertly tailored hair and beard services for everyone
        </p>

        <a href="{{ route('frontend.services') }}"
           class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition transform hover:-translate-y-1 hover:scale-105">
            Explore Services →
        </a>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
        <svg class="w-8 h-8 text-pink-400 animate-bounce" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>

</section>

<!-- QUICK SERVICES -->
<section class="py-16 bg-gray-800">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-pink-400 mb-12">Our Popular Services</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">

            @foreach($services->take(3) as $service)
                <div class="bg-gray-900 rounded-2xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1">
                    @if($service->image)
                        <img src="{{ asset('storage/'.$service->image) }}" 
                             class="w-full h-48 object-cover rounded-xl mb-4">
                    @endif
                    <h3 class="text-xl font-bold text-pink-400">{{ $service->name }}</h3>
                    <p class="text-gray-300 mt-2">{{ $service->description }}</p>
                    <p class="text-yellow-400 font-bold mt-3">Rs {{ $service->price }}</p>
                </div>
            @endforeach

        </div>
        <a href="{{ route('frontend.services') }}"
           class="mt-10 inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition transform hover:-translate-y-1 hover:scale-105">
           See All Services →
        </a>
    </div>
</section>

@endsection