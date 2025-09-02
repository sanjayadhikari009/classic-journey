@auth
    <!-- Authenticated user sidebar -->
    <aside class="w-72 bg-white shadow-lg flex flex-col">
        <div class="bg-purple-700 text-white p-6 flex items-center justify-between">
            <span class="flex items-center gap-2">
                <img src="/images/travel_stride.svg" alt="TravelStride Logo" class="h-8 w-auto">
                <span class="font-bold text-lg tracking-wide">TravelStride</span>
            </span>
        </div>
        <div class="flex flex-col items-center py-6 border-b">
            <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-4xl text-gray-400 mb-2">
                <i class="fas fa-user"></i>
            </div>
            <div class="font-semibold text-lg">{{ auth()->user()->name }}</div>
            <div class="text-xs text-gray-500">Referral Code: <span class="font-mono">{{ auth()->user()->referral_code ?? 'N/A' }}</span></div>
            <div class="flex gap-4 mt-4">
                <div class="bg-purple-100 text-purple-700 px-4 py-2 rounded-lg text-center">
                    <div class="text-xs">Account Balance</div>
                    <div class="font-bold text-lg">${{ number_format((float)(auth()->user()->balance ?? 0), 2) }}</div>
                </div>
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-center">
                    <div class="text-xs">Current Level</div>
                    <div class="font-bold text-lg">{{ auth()->user()->level ?? 1 }}</div>
                </div>
            </div>
        </div>
        <nav class="flex-1 py-4">
            <ul class="space-y-1">
                <li><a href="{{ route('user.dashboard') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-tachometer-alt text-purple-700"></i> <span class="ml-3">Dashboard</span></a></li>
                <li><a href="{{ route('user.team') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-users text-purple-700"></i> <span class="ml-3">Team</span></a></li>
                <li><a href="{{ route('user.terms') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-file-alt text-purple-700"></i> <span class="ml-3">T&amp;C</span></a></li>
                <li><a href="{{ route('user.faq') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-question-circle text-purple-700"></i> <span class="ml-3">FAQs</span></a></li>
                <li><a href="{{ route('user.about') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-info-circle text-purple-700"></i> <span class="ml-3">About Us</span></a></li>
                <li><a href="{{ route('user.recharge') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-credit-card text-purple-700"></i> <span class="ml-3">Recharge</span></a></li>
                <li><a href="{{ route('user.rate_trip') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-star text-purple-700"></i> <span class="ml-3">Rate a Trip</span></a></li>
                <li><a href="{{ route('user.customer.history') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-history text-purple-700"></i> <span class="ml-3">History</span></a></li>
                <li><a href="{{ route('user.customer.withdrawl') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-wallet text-purple-700"></i> <span class="ml-3">Withdrawal</span></a></li>
                <li><a href="{{ route('user.password.change') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-key text-purple-700"></i> <span class="ml-3">Change Password</span></a></li>
            </ul>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="px-6 pb-6 mt-auto">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center px-4 py-2 rounded-full bg-purple-500 text-white font-semibold shadow hover:bg-blue-500 transition">
                <i class="fas fa-sign-out-alt"></i> <span class="ml-3">Sign Out</span>
            </button>
        </form>
    </aside>
@else
    <!-- Guest/public sidebar -->
    <aside class="w-72 bg-white shadow-lg flex flex-col">
        <div class="bg-purple-700 text-white p-6 flex items-center justify-between">
            <span class="flex items-center gap-2">
                <img src="/images/travel_stride.svg" alt="TravelStride Logo" class="h-8 w-auto">
                <span class="font-bold text-lg tracking-wide">TravelStride</span>
            </span>
        </div>
        <nav class="flex-1 py-4">
            <ul class="space-y-1">
                <li><a href="{{ route('user.team') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-users text-gray-600"></i> <span class="ml-3">Team</span></a></li>
                <li><a href="{{ route('user.terms') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-file-alt text-gray-600"></i> <span class="ml-3">T&amp;C</span></a></li>
                <li><a href="{{ route('user.faq') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-question-circle text-gray-600"></i> <span class="ml-3">FAQs</span></a></li>
                <li><a href="{{ route('user.about') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-info-circle text-gray-600"></i> <span class="ml-3">About Us</span></a></li>
                <li><a href="{{ route('login') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-sign-in-alt text-gray-600"></i> <span class="ml-3">Sign In</span></a></li>
                <li><a href="{{ route('register') }}" class="flex items-center px-6 py-3 hover:bg-purple-50"><i class="fas fa-user-plus text-gray-600"></i> <span class="ml-3">Register</span></a></li>
            </ul>
        </nav>
    </aside>
@endauth 