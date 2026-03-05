<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COZZY SALON - @yield('title', 'Home')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-900 text-gray-100 flex flex-col min-h-screen font-sans">

<!-- NAVBAR -->
<nav class="bg-gray-900 border-b border-gray-800 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-3xl font-extrabold text-pink-400 hover:text-pink-300 transition">
            COZZY SALON
        </a>

        <!-- Navigation Links -->
        <div class="space-x-6 font-medium text-lg flex items-center">
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'text-pink-400 font-bold' : 'text-gray-200 hover:text-pink-300 transition' }}">
                Home
            </a>
            <a href="{{ route('frontend.about') }}"
               class="{{ request()->routeIs('frontend.about') ? 'text-pink-400 font-bold' : 'text-gray-200 hover:text-pink-300 transition' }}">
                About
            </a>
            <a href="{{ route('frontend.services') }}"
               class="{{ request()->routeIs('frontend.services') ? 'text-pink-400 font-bold' : 'text-gray-200 hover:text-pink-300 transition' }}">
                Services
            </a>
            <a href="{{ route('frontend.team') }}"
               class="{{ request()->routeIs('frontend.team') ? 'text-pink-400 font-bold' : 'text-gray-200 hover:text-pink-300 transition' }}">
                Team
            </a>
            <a href="{{ route('frontend.book') }}"
               class="{{ request()->routeIs('frontend.book') ? 'text-pink-400 font-bold' : 'text-gray-200 hover:text-pink-300 transition' }}">
                Book
            </a>
            <a href="{{ route('contact.create') }}"
               class="{{ request()->routeIs('contact.create') ? 'text-pink-400 font-bold' : 'text-white-200 hover:text-pink-300 transition' }}">
                Contact Us
            </a>

            @auth
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'text-yellow-400 font-bold' : 'text-yellow-400 hover:text-yellow-300 transition' }}">
                    Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="text-red-400 hover:text-red-300 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="{{ request()->routeIs('login') ? 'text-pink-400 font-bold' : 'text-white-400 hover:text-pink-300 transition' }}">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="{{ request()->routeIs('register') ? 'text-pink-400 font-bold' : 'text-white-400 hover:text-pink-300 transition' }}">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>

<!-- PAGE CONTENT -->
<main class="flex-grow">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-gray-900 border-t border-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">

        <!-- Salon Info -->
        <div>
            <h3 class="text-pink-400 text-xl font-bold mb-4">COZZY SALON</h3>
            <p class="text-gray-300 leading-relaxed">
                Professional hair, beard & beauty services in a luxurious modern environment. 
                We provide style and confidence in every visit.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-yellow-400 text-xl font-bold mb-4">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-pink-300 transition">Home</a></li>
                <li><a href="{{ route('frontend.about') }}" class="hover:text-pink-300 transition">About</a></li>
                <li><a href="{{ route('frontend.services') }}" class="hover:text-pink-300 transition">Services</a></li>
                <li><a href="{{ route('frontend.team') }}" class="hover:text-pink-300 transition">Team</a></li>
                <li><a href="{{ route('frontend.book') }}" class="hover:text-pink-300 transition">Book Appointment</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-yellow-400 text-xl font-bold mb-4">Contact Us</h3>
            <p>Kathmandu, Nepal</p>
            <p>Phone: <a href="tel:9743213366" class="hover:text-pink-300 transition">9743213366</a></p>
            <p>Email: <a href="mailto:info@cozzysalon.com" class="hover:text-pink-300 transition">info@cozzysalon.com</a></p>
        </div>

    </div>

    <div class="text-center text-gray-500 text-xs mt-10 border-t border-gray-800 pt-4">
        © {{ date('Y') }} COZZY SALON. All rights reserved.
    </div>
</footer>

</body>
</html>