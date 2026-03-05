@extends('frontend.layouts.app')

@section('title', 'Our Team')

@section('content')

<section class="py-16 bg-gray-900">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-4xl font-extrabold text-pink-400 text-center mb-12">
            Meet Our Experts
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

            @forelse($staffs as $staff)
                <div class="bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 p-6 text-center">

                    {{-- Staff Image --}}
                    @if($staff->image)
                        <img src="{{ asset('storage/'.$staff->image) }}"
                             class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-pink-400 shadow-md">
                    @else
                        <div class="w-32 h-32 mx-auto rounded-full bg-gray-700 flex items-center justify-center mb-4 border-4 border-pink-400 shadow-md">
                            <span class="text-gray-400 text-sm">No Image</span>
                        </div>
                    @endif

                    {{-- Name --}}
                    <h3 class="text-xl font-bold text-pink-400">
                        {{ $staff->name }}
                    </h3>

                    {{-- Role --}}
                    <p class="text-yellow-400 font-semibold mt-1">
                        {{ $staff->role ?? 'Salon Expert' }}
                    </p>

                    {{-- Experience --}}
                    @if($staff->experience)
                        <p class="text-gray-300 text-sm mt-2">
                            {{ $staff->experience }} years experience
                        </p>
                    @endif

                </div>
            @empty
                <p class="col-span-3 text-center text-gray-400">
                    Our team will be updated soon.
                </p>
            @endforelse

        </div>
    </div>
</section>

@endsection