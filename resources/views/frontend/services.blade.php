@extends('frontend.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
        Our Services
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

        @forelse($services as $service)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition">

                @if($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}"
                         class="w-full h-52 object-cover rounded-t-xl">
                @else
                    <div class="w-full h-52 flex items-center justify-center bg-gray-200 rounded-t-xl">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif

                <div class="p-5">
                    <h3 class="text-xl font-semibold text-gray-800">
                        {{ $service->name }}
                    </h3>

                    <p class="text-gray-500 text-sm mt-1">
                        {{ $service->duration }} minutes
                    </p>

                    <p class="text-pink-600 font-bold text-lg mt-2">
                        Rs {{ $service->price }}
                    </p>

                    @if($service->description)
                        <p class="text-gray-600 text-sm mt-3">
                            {{ $service->description }}
                        </p>
                    @endif

                    <a href="{{ route('frontend.book') }}"
                       class="inline-block mt-4 bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-lg text-sm">
                        Book Now
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">
                No services available at the moment.
            </p>
        @endforelse

    </div>
</div>

@endsection