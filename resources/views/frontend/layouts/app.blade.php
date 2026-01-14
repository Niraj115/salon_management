<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salon Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <a href="{{ route('home') }}"
           class="text-2xl font-bold text-pink-600 hover:text-pink-700">
            Cozy Salon
        </a>

        <div class="space-x-6 font-medium">
            <a href="{{ route('home') }}" class="hover:text-pink-600">Home</a>
            <a href="{{ route('frontend.services') }}" class="hover:text-pink-600">Services</a>
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



<div class="py-10">
    @yield('content')
</div>

</body>
</html>
