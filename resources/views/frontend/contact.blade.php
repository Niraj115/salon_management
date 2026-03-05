@extends('frontend.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-800 p-10 rounded-2xl shadow-xl mt-16">
    <h2 class="text-3xl font-extrabold text-pink-400 mb-8 text-center">
        Contact Us
    </h2> 

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
        @csrf

        <input type="text" name="name" placeholder="Your Name"
               class="w-full p-3 border border-gray-700 rounded-lg bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400" required>

        <input type="email" name="email" placeholder="Your Email"
               class="w-full p-3 border border-gray-700 rounded-lg bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400" required>

        <input type="text" name="subject" placeholder="Subject"
               class="w-full p-3 border border-gray-700 rounded-lg bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400" required>

        <textarea name="message" rows="5" placeholder="Your Message"
                  class="w-full p-3 border border-gray-700 rounded-lg bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400" required></textarea>

        <button type="submit"
                class="w-full bg-pink-400 hover:bg-pink-500 text-white font-bold py-3 rounded-lg shadow-lg transition transform hover:-translate-y-1">
            Send Message
        </button>
    </form>
</div>
@endsection