@php
$user = auth()->user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Journeys - User Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <!-- Header with Sidebar Toggle Button -->
    <header class="w-full z-50 top-0 relative classic-journeys-header text-white flex items-center justify-between px-4 py-3">
        <button id="sidebarToggleBtn" class="text-white text-2xl mr-4 focus:outline-none md:hidden">
            <i class="fas fa-bars"></i>
        </button>
        <span class="flex items-center gap-2">
            <img src="/images/travel_stride.svg" alt="Classic Journeys Logo" class="h-8 w-auto">
            <span class="font-bold text-lg tracking-wide">Classic Journeys</span>
        </span>
        <div class="flex items-center gap-4">
            <a href="{{ route('user.dashboard') }}" class="text-white hover:text-blue-300 font-medium">Dashboard</a>
            <a href="{{ route('user.team') }}" class="text-white hover:text-blue-300 font-medium">Team</a>
            <a href="{{ route('user.terms') }}" class="text-white hover:text-blue-300 font-medium">T&amp;C</a>
            <a href="{{ route('user.faq') }}" class="text-white hover:text-blue-300 font-medium">FAQs</a>
            <a href="{{ route('user.about') }}" class="text-white hover:text-blue-300 font-medium">About Us</a>
        </div>
    </header>
    <div class="flex min-h-screen pt-16">
        <!-- Sidebar (slide-in) -->
        <div id="sidebarContainer"
            class="fixed inset-y-0 left-0 z-40 w-72 transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0 md:w-72 md:block">
            @include('partials.sidebar')
        </div>
        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebarContainer');
        const toggleBtn = document.getElementById('sidebarToggleBtn');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
        }
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (sidebar.classList.contains('-translate-x-full')) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            });
        }
        // Close sidebar when clicking outside (on mobile)
        document.addEventListener('click', function(e) {
            if (window.innerWidth < 768 && sidebar && !sidebar.contains(e.target) && !toggleBtn
                .contains(e.target)) {
                closeSidebar();
            }
        });
    });
    </script>
    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>

</html>