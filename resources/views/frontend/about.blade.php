@extends('frontend.layouts.app')

@section('content')

<!-- ABOUT SECTION -->
<section class="bg-white py-10">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

        <!-- Image -->
        <div>
            <img src="{{ asset('images/heroo.jpg') }}"
                 class="rounded-xl shadow-lg w-full h-[380px] object-cover">
        </div>

        <!-- Content -->
        <div>
            <h2 class="text-4xl font-bold text-gray-800 mb-5">
                About COZZY SALON
            </h2>

            <p class="text-gray-600 mb-3">
                COZZY SALON is a modern and professional salon located in Kathmandu.
                We specialize in haircuts, beard styling, and beauty services
                delivered with passion and precision.
            </p>

            <p class="text-gray-600">
                Our goal is to provide every client with confidence,
                comfort, and a premium salon experience.
            </p>
        </div>

    </div>
</section>


<!-- MISSION & VISION -->
<section class="bg-gray-50 py-10 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">

        <!-- Mission -->
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <h3 class="text-2xl font-bold text-pink-600 mb-3">
                Our Mission
            </h3>
            <p class="text-gray-600 text-sm">
                To provide high-quality salon services using modern techniques,
                maintaining hygiene standards, and ensuring customer satisfaction
                through professionalism and creativity.
            </p>
        </div>

        <!-- Vision -->
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <h3 class="text-2xl font-bold text-pink-600 mb-3">
                Our Vision
            </h3>
            <p class="text-gray-600 text-sm">
                To become one of the most trusted and recognized salons
                in Nepal by delivering consistent excellence and
                building long-term relationships with our customers.
            </p>
        </div>

    </div>
</section>


<!-- WHY CHOOSE US -->
<section class="bg-white py-10 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h3 class="text-3xl font-bold text-gray-800 mb-8">
            Why Choose Us
        </h3>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="p-6 rounded-xl shadow-sm hover:shadow-md transition">
                <h4 class="text-lg font-semibold text-pink-600 mb-2">
                    Expert Professionals
                </h4>
                <p class="text-gray-600 text-sm">
                    Skilled barbers trained in modern haircut and grooming techniques.
                </p>
            </div>

            <div class="p-6 rounded-xl shadow-sm hover:shadow-md transition">
                <h4 class="text-lg font-semibold text-pink-600 mb-2">
                    Hygienic Environment
                </h4>
                <p class="text-gray-600 text-sm">
                    We maintain strict cleanliness and hygiene standards.
                </p>
            </div>

            <div class="p-6 rounded-xl shadow-sm hover:shadow-md transition">
                <h4 class="text-lg font-semibold text-pink-600 mb-2">
                    Customer Satisfaction
                </h4>
                <p class="text-gray-600 text-sm">
                    Every visit is designed to leave you confident and satisfied.
                </p>
            </div>

        </div>

    </div>
</section>


<!-- OWNER MESSAGE -->
<section class="bg-gray-50 py-10 border-t border-gray-200">
    <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

        <!-- Owner Image -->
        <div class="text-center">
            <img src="{{ asset('images/owner.jpg') }}"
                 class="w-60 h-60 mx-auto rounded-full object-cover shadow-md">
        </div>

        <!-- Owner Message -->
        <div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                Message From The Owner
            </h3>

            <p class="text-gray-600 italic mb-4 text-sm">
                "At COZZY SALON, we believe style is confidence.
                Our mission is to create a comfortable space where
                every client feels valued and leaves satisfied.
                Thank you for trusting us with your look."
            </p>

            <h4 class="text-lg font-semibold text-gray-800">
                Yuvraj Khatiwoda
            </h4>
            <p class="text-pink-600 text-sm">
                Founder & Owner
            </p>
        </div>

    </div>
</section>

@endsection