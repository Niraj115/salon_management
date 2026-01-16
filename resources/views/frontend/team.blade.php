@extends('frontend.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">
        Meet Our Experts
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

        @forelse($staffs as $staff)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition text-center p-6">

                {{-- Staff Image --}}
                @if($staff->image)
                    <img src="{{ asset('storage/'.$staff->image) }}"
                         class="w-32 h-32 mx-auto rounded-full object-cover mb-4">
                @else
                    <div class="w-32 h-32 mx-auto rounded-full bg-gray-200 flex items-center justify-center mb-4">
                        <span class="text-gray-500 text-sm">No Image</span>
                    </div>
                @endif

                {{-- Name --}}
                <h3 class="text-xl font-semibold text-gray-800">
                    {{ $staff->name }}
                </h3>

                {{-- Role --}}
                <p class="text-pink-600 font-medium mt-1">
                    {{ $staff->role ?? 'Salon Expert' }}
                </p>

                {{-- Experience --}}
                @if($staff->experience)
                    <p class="text-gray-500 text-sm mt-2">
                        {{ $staff->experience }} years experience
                    </p>
                @endif

            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">
                Our team will be updated soon.
            </p>
        @endforelse

    </div>
</div>

@endsection
