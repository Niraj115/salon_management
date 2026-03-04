@extends('frontend.layouts.app')

@section('content')

<section class="relative h-screen bg-cover bg-center"
    style="background-image: url('{{ asset('images/heroo.jpg') }}');">

    
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    
    <div class="relative z-10 flex items-center h-full">
        <div class="container mx-auto px-6 text-white">

            <h1 class="text-5xl md:text-6xl font-extrabold mb-6">
                COLLECTION <br>
                HAIRCUT & BEARD
            </h1>

            <p class="text-gray-300 mb-8 max-w-xl">
                Professional haircut and beard styling services 
                delivered by expert barbers in a modern environment.
            </p>

            <a href="/services"
               class="bg-pink-600 hover:bg-pink-700 px-6 py-3 rounded shadow-lg transition">
                All Services →
            </a>

        </div>
    </div>

</section>

@endsection