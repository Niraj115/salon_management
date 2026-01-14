<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COZZY SALON</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Page-specific styles -->
    @yield('styles')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
<nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="font-bold text-lg">
            COZZY SALON
        </a>

        <!-- Navigation Links -->
        <div class="flex space-x-3 items-center">

            <a href="{{ route('dashboard') }}"
               class="px-3 py-2 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'hover:text-gray-300' }}">
                Dashboard
            </a>

            <a href="{{ route('customers.index') }}"
               class="px-3 py-2 rounded {{ request()->is('customers*') ? 'bg-gray-700' : 'hover:text-gray-300' }}">
                Customers
            </a>

            <a href="{{ route('services.index') }}"
               class="px-3 py-2 rounded {{ request()->is('services*') ? 'bg-gray-700' : 'hover:text-gray-300' }}">
                Services
            </a>

            <a href="{{ route('staff.index') }}"
               class="px-3 py-2 rounded {{ request()->is('staff*') ? 'bg-gray-700' : 'hover:text-gray-300' }}">
                Staff
            </a>

            <a href="{{ route('appointments.index') }}"
               class="px-3 py-2 rounded {{ request()->is('appointments*') ? 'bg-gray-700' : 'hover:text-gray-300' }}">
                Appointments
            </a>

            <a href="{{ route('reports.index') }}"
               class="px-3 py-2 rounded {{ request()->routeIs('reports.index') ? 'bg-gray-700' : 'hover:text-gray-300' }}">
                Reports
            </a>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="ml-4 text-red-400 hover:text-red-300">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>


    <!-- Page Content -->
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

    <!-- Page-specific scripts -->
    @yield('scripts')

</body>
</html>
