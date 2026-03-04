<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salon Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <a href="{{ route('home') }}"
           class="text-2xl font-bold text-pink-600 hover:text-pink-700">
            COZZY SALON
        </a>

        <div class="space-x-6 font-medium">
            <a href="{{ route('home') }}" class="hover:text-pink-600">Home</a>
            <a href="{{ route('frontend.about') }}" class="hover:text-pink-600">About</a>
            <a href="{{ route('frontend.services') }}" class="hover:text-pink-600">Our Services</a>
            <a href="{{ route('frontend.team') }}" class="hover:text-pink-600">Our Team</a>
            <a href="{{ route('frontend.book') }}" class="hover:text-pink-600">Book</a>

            @auth
                <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">
                    Dashboard
                </a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="text-red-600">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-green-600 font-semibold">Login</a>
                <a href="{{ route('register') }}" class="text-purple-600 font-semibold">Register</a>
            @endauth
        </div>

    </div>
</nav>

<!-- PAGE CONTENT -->
<main class="flex-grow py-10">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-300 py-6">
     <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">


        <!-- Salon Info -->
        <div>
            <h3 class="text-white text-lg font-semibold mb-3">COZZY SALON</h3>
            <p class="text-sm">
                Professional hair, beard & beauty services in a modern and comfortable environment.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-white text-lg font-semibold mb-3">Quick Links</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-pink-500">Home</a></li>
                <li><a href="{{ route('frontend.about') }}" class="hover:text-pink-600">About</a></li>
                <li><a href="{{ route('frontend.services') }}" class="hover:text-pink-500">Services</a></li>
                <li><a href="{{ route('frontend.team') }}" class="hover:text-pink-500">Team</a></li>
                <li><a href="{{ route('frontend.book') }}" class="hover:text-pink-500">Book Appointment</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-white text-lg font-semibold mb-3">Contact Us</h3>
            <p class="text-sm">Kathmandu, Nepal</p>
            <p class="text-sm">Phone: 9743213366</p>
            <p class="text-sm">Email: info@cozzysalon.com</p>
        </div>

    </div>

    <div class="text-center text-gray-500 text-xs mt-8 border-t border-gray-700 pt-4">
        © {{ date('Y') }} COZZY SALON. All rights reserved.
    </div>
</footer>

</body>
</html>
