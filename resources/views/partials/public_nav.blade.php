<nav class="w-full bg-white shadow py-4 px-8 flex items-center justify-between z-50 relative">
    <a href="/" class="font-bold text-xl text-purple-700">INSIGHT VACATIONS</a>
    <div class="flex gap-6">
        <a href="/" class="text-gray-700 hover:text-purple-700">Home</a>
        <a href="{{ route('destinations.index') }}" class="text-gray-700 hover:text-purple-700">Destinations</a>
        <a href="{{ route('trips.index') }}" class="text-gray-700 hover:text-purple-700">Trip Themes & Styles</a>
        <a href="#" class="text-gray-700 hover:text-purple-700">Tour Company Reviews</a>
        <a href="#" class="text-gray-700 hover:text-purple-700">Fun & Helpful</a>
        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-purple-700">Contact Us</a>
        @guest
        <a href="{{ route('login') }}" class="text-purple-700 font-semibold border border-purple-700 px-4 py-1 rounded hover:bg-purple-50">Sign In</a>
        <a href="{{ route('register') }}" class="text-white bg-purple-700 px-4 py-1 rounded hover:bg-purple-800">Register</a>
        @endguest
        @auth
            <div class="relative inline-block text-left ml-4">
                <button id="user-menu" type="button" class="flex items-center space-x-2 focus:outline-none">
                    <span class="bg-green-600 text-white rounded-full px-2 py-1">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    <span class="text-green-700 font-semibold">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav> 
<script>
document.addEventListener('DOMContentLoaded', function() {
    const userMenu = document.getElementById('user-menu');
    const dropdownMenu = document.getElementById('dropdown-menu');
    if (userMenu && dropdownMenu) {
        userMenu.addEventListener('click', function(e) {
            e.preventDefault();
            dropdownMenu.classList.toggle('hidden');
        });
        document.addEventListener('click', function(e) {
            if (!userMenu.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    }
});
</script> 