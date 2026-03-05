@extends('frontend.layouts.app')

@section('content')

<!-- ABOUT SECTION -->
<section class="bg-rose-50 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <!-- Image -->
        <div class="rounded-xl overflow-hidden shadow-lg">
            <img src="{{ asset('images/heroo.jpg') }}" 
                 class="w-full h-[400px] object-cover transition-transform duration-300 hover:scale-105">
        </div>

        <!-- Content -->
        <div>
            <h2 class="text-4xl font-extrabold text-gray-900 mb-6">
                About <span class="text-pink-500">COZZY SALON</span>
            </h2>

            <p class="text-gray-700 mb-4 leading-relaxed">
                COZZY SALON is a modern and professional salon located in Kathmandu.
                We specialize in haircuts, beard styling, and beauty services delivered 
                with passion and precision.
            </p>

            <p class="text-gray-700 leading-relaxed">
                Our goal is to provide every client with confidence, comfort, 
                and a premium salon experience that goes beyond expectations.
            </p>
        </div>

    </div>
</section>

<!-- MISSION & VISION -->
<section class="bg-white py-16 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">

        <!-- Mission -->
        <div class="bg-pink-50 p-8 rounded-2xl shadow-md hover:shadow-lg transition">
            <h3 class="text-2xl font-bold text-pink-500 mb-4">
                Our Mission
            </h3>
            <p class="text-gray-700 leading-relaxed">
                To provide high-quality salon services using modern techniques, 
                maintaining hygiene standards, and ensuring customer satisfaction 
                through professionalism and creativity.
            </p>
        </div>

        <!-- Vision -->
        <div class="bg-pink-50 p-8 rounded-2xl shadow-md hover:shadow-lg transition">
            <h3 class="text-2xl font-bold text-pink-500 mb-4">
                Our Vision
            </h3>
            <p class="text-gray-700 leading-relaxed">
                To become one of the most trusted and recognized salons in Nepal 
                by delivering consistent excellence and building long-term relationships 
                with our customers.
            </p>
        </div>

    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="bg-rose-50 py-16 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h3 class="text-3xl font-extrabold text-gray-900 mb-12">
            Why Choose <span class="text-pink-500">Us</span>
        </h3>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="p-8 bg-white rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <h4 class="text-xl font-semibold text-pink-500 mb-3">
                    Expert Professionals
                </h4>
                <p class="text-gray-700 leading-relaxed">
                    Skilled barbers trained in modern haircut and grooming techniques.
                </p>
            </div>

            <div class="p-8 bg-white rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <h4 class="text-xl font-semibold text-pink-500 mb-3">
                    Hygienic Environment
                </h4>
                <p class="text-gray-700 leading-relaxed">
                    We maintain strict cleanliness and hygiene standards.
                </p>
            </div>

            <div class="p-8 bg-white rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <h4 class="text-xl font-semibold text-pink-500 mb-3">
                    Customer Satisfaction
                </h4>
                <p class="text-gray-700 leading-relaxed">
                    Every visit is designed to leave you confident and satisfied.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- OWNER MESSAGE -->
<section class="bg-white py-16 border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <!-- Owner Image -->
        <div class="text-center">
            <img src="{{ asset('images/owner.jpg') }}" 
                 class="w-64 h-64 mx-auto rounded-full object-cover shadow-lg transition-transform duration-300 hover:scale-105">
        </div>

        <!-- Owner Message -->
        <div>
            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                Message From The Owner
            </h3>

            <p class="text-gray-700 italic mb-6 leading-relaxed">
                "At COZZY SALON, we believe style is confidence. Our mission is to create a 
                comfortable space where every client feels valued and leaves satisfied. 
                Thank you for trusting us with your look."
            </p>

            <h4 class="text-xl font-semibold text-gray-900">
                Yuvraj Khatiwoda
            </h4>
            <p class="text-pink-500 font-medium">
                Founder & Owner
            </p>
        </div>

    </div>
</section>

@endsection