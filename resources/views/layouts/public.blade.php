<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Insight Vacations')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @guest
    <!-- Public Navbar/Header -->
    <header class="w-full z-50 top-0 relative" style="background: url('/images/hero/activity.jpg') center center/cover no-repeat; min-height: 120px;">
        <div class="absolute inset-0 bg-blue-900 bg-opacity-70"></div>
        <nav class="relative mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between" style="z-index: 10;">
            <!-- Sidebar Toggle Button -->
            <button id="sidebarToggleBtn" class="text-white text-2xl mr-4 focus:outline-none md:hidden">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Left: Logo -->
            <div class="flex items-center gap-4">
                <a href="/" class="flex items-center">
                    <span class="font-bold text-white text-2xl tracking-wide drop-shadow">INSIGHT VACATIONS</span>
                </a>
            </div>
            <!-- Center: Search & Navigation Links -->
            <div class="flex-1 flex items-center justify-center gap-8">
                <!-- Search Bar -->
                <form action="" method="GET" class="hidden md:flex items-center w-96 mr-8">
                    <div class="relative w-full">
                        <input type="text" name="q" placeholder="What do you want to explore?" class="w-full rounded-full pl-10 pr-4 py-2 bg-white bg-opacity-90 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow" />
                        <span class="absolute left-3 top-2.5 text-gray-400"><i class="fas fa-search"></i></span>
                    </div>
                </form>
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('user.team') }}" class="text-white hover:text-yellow-300 font-medium drop-shadow">Team</a>
                    <a href="{{ route('user.terms') }}" class="text-white hover:text-yellow-300 font-medium drop-shadow">T&amp;C</a>
                    <a href="{{ route('user.faq') }}" class="text-white hover:text-yellow-300 font-medium drop-shadow">FAQs</a>
                    <a href="{{ route('user.about') }}" class="text-white hover:text-yellow-300 font-medium drop-shadow">About Us</a>
                </div>
            </div>
            <!-- Right: Sign In & Contact -->
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="border border-white text-white px-4 py-1 rounded-full hover:bg-white hover:text-blue-900 transition drop-shadow">Sign In</a>
                <a href="{{ route('contact') }}" class="bg-white text-blue-900 px-4 py-1 rounded-full font-semibold hover:bg-yellow-300 hover:text-blue-900 transition drop-shadow">Contact Us</a>
            </div>
        </nav>
    </header>
    <div class="flex min-h-screen pt-16">
        <!-- Sidebar (slide-in) -->
        <div id="sidebarContainer" class="fixed inset-y-0 left-0 z-40 w-72 transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0 md:w-72 md:block">
            @include('partials.sidebar')
        </div>
        <!-- Main Content -->
        <main class="flex-1 p-0 md:p-8">
            @yield('content')
        </main>
    </div>
    @endguest
    @auth
    @php $user = auth()->user(); @endphp
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar/Nav Section -->
        @include('partials.sidebar')
        <!-- Main Content Panel -->
        <main class="flex-1 p-6 md:p-12">
            <!-- Section Tabs -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('user.recharge') }}" class="px-6 py-2 rounded-full font-semibold bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow hover:from-blue-500 hover:to-purple-500 transition">Recharge</a>
                    <a href="{{ route('user.customer.history') }}" class="px-6 py-2 rounded-full font-semibold bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow hover:from-blue-500 hover:to-purple-500 transition">History</a>
                    <a href="{{ route('user.team') }}" class="px-6 py-2 rounded-full font-semibold bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow hover:from-blue-500 hover:to-purple-500 transition">Teams</a>
                    <a href="{{ route('user.customer.withdrawl') }}" class="px-6 py-2 rounded-full font-semibold bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow hover:from-blue-500 hover:to-purple-500 transition">Withdrawal</a>
                </div>
            </div>
            <!-- Main Content Slot -->
            <div class="rounded-2xl bg-white shadow-lg p-8 mb-10">
                @yield('content')
            </div>
            <!-- Recently Viewed / Recommended Tours -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-6 bg-gradient-to-r from-purple-500 to-blue-500 text-transparent bg-clip-text">Recommended Tours</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Example Card -->
                    <div class="rounded-xl shadow-lg bg-gradient-to-br from-blue-100 to-purple-100 p-4 flex flex-col items-center">
                        <img src="/images/home/style-1.jpg" alt="Tour 1" class="w-full h-40 object-cover rounded-lg mb-4">
                        <div class="font-semibold text-lg mb-2">European Explorer</div>
                        <div class="text-sm text-gray-600 mb-2">10 days | Paris, Rome, Berlin</div>
                        <a href="#" class="mt-auto px-4 py-2 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold shadow hover:from-blue-500 hover:to-purple-500 transition">View Details</a>
                    </div>
                    <div class="rounded-xl shadow-lg bg-gradient-to-br from-blue-100 to-purple-100 p-4 flex flex-col items-center">
                        <img src="/images/home/style-2.jpg" alt="Tour 2" class="w-full h-40 object-cover rounded-lg mb-4">
                        <div class="font-semibold text-lg mb-2">Asian Adventure</div>
                        <div class="text-sm text-gray-600 mb-2">8 days | Tokyo, Seoul, Bangkok</div>
                        <a href="#" class="mt-auto px-4 py-2 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold shadow hover:from-blue-500 hover:to-purple-500 transition">View Details</a>
                    </div>
                    <div class="rounded-xl shadow-lg bg-gradient-to-br from-blue-100 to-purple-100 p-4 flex flex-col items-center">
                        <img src="/images/home/style-3.jpg" alt="Tour 3" class="w-full h-40 object-cover rounded-lg mb-4">
                        <div class="font-semibold text-lg mb-2">African Safari</div>
                        <div class="text-sm text-gray-600 mb-2">12 days | Kenya, Tanzania, South Africa</div>
                        <a href="#" class="mt-auto px-4 py-2 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold shadow hover:from-blue-500 hover:to-purple-500 transition">View Details</a>
                    </div>
                    <div class="rounded-xl shadow-lg bg-gradient-to-br from-blue-100 to-purple-100 p-4 flex flex-col items-center">
                        <img src="/images/home/style-4.jpg" alt="Tour 4" class="w-full h-40 object-cover rounded-lg mb-4">
                        <div class="font-semibold text-lg mb-2">American Roadtrip</div>
                        <div class="text-sm text-gray-600 mb-2">15 days | New York, LA, Chicago</div>
                        <a href="#" class="mt-auto px-4 py-2 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold shadow hover:from-blue-500 hover:to-purple-500 transition">View Details</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @endauth
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
                if (window.innerWidth < 768 && sidebar && !sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                    closeSidebar();
                }
            });
        });
    </script>
</body>
</html> 