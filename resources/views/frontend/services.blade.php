@extends('frontend.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-16">
    <h2 class="text-4xl font-extrabold text-pink-400 mb-12 text-center">
        Our Services
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

        @forelse($services as $service)
            <div class="bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
                
                @if($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}"
                         class="w-full h-56 object-cover rounded-t-2xl transition-transform duration-300 hover:scale-105">
                @else
                    <div class="w-full h-56 flex items-center justify-center bg-gray-700 rounded-t-2xl">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif

                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-pink-400">
                        {{ $service->name }}
                    </h3>

                    <p class="text-gray-400 text-sm mt-1">
                        Duration: {{ $service->duration }} minutes
                    </p>

                    <p class="text-yellow-400 font-bold text-lg mt-2">
                        Rs {{ $service->price }}
                    </p>

                    @if($service->description)
                        <p class="text-gray-300 text-sm mt-3 leading-relaxed">
                            {{ $service->description }}
                        </p>
                    @endif

                    <a href="{{ route('frontend.book') }}"
                       class="inline-block mt-5 bg-pink-500 hover:bg-pink-600 text-white font-medium px-5 py-2 rounded-lg transition">
                        Book Now
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-400">
                No services available at the moment.
            </p>
        @endforelse

    </div>
</div>

@endsection