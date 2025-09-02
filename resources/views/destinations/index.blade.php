@extends('layouts.app')

@section('title', 'Destinations - Travelstride')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-travelstride-blue-lighter to-travelstride-green-lighter py-16">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-travelstride-gray-900 mb-4">Explore Destinations</h1>
            <p class="text-xl text-travelstride-gray-600 mb-8">Discover amazing places around the world</p>
            
            <!-- Search Form -->
            <form class="max-w-2xl mx-auto">
                <div class="flex">
                    <input type="text" placeholder="Search destinations..." class="flex-1 px-4 py-3 rounded-l-lg border border-travelstride-gray-300 focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    <button type="submit" class="btn-primary rounded-l-none">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Popular Destinations -->
<section class="py-16 bg-white">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-travelstride-gray-900 mb-12">Popular Destinations</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <div class="text-center">
                <div class="card p-4 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="text-2xl mb-2">🇮🇹</div>
                    <h3 class="font-semibold text-travelstride-gray-900">Italy</h3>
                    <p class="text-sm text-travelstride-gray-600">2,073 trips</p>
                </div>
            </div>
            <div class="text-center">
                <div class="card p-4 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="text-2xl mb-2">🇫🇷</div>
                    <h3 class="font-semibold text-travelstride-gray-900">France</h3>
                    <p class="text-sm text-travelstride-gray-600">1,745 trips</p>
                </div>
            </div>
            <div class="text-center">
                <div class="card p-4 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="text-2xl mb-2">🇯🇵</div>
                    <h3 class="font-semibold text-travelstride-gray-900">Japan</h3>
                    <p class="text-sm text-travelstride-gray-600">814 trips</p>
                </div>
            </div>
            <div class="text-center">
                <div class="card p-4 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="text-2xl mb-2">🇨🇦</div>
                    <h3 class="font-semibold text-travelstride-gray-900">Canada</h3>
                    <p class="text-sm text-travelstride-gray-600">717 trips</p>
                </div>
            </div>
            <div class="text-center">
                <div class="card p-4 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="text-2xl mb-2">🇹🇿</div>
                    <h3 class="font-semibold text-travelstride-gray-900">Tanzania</h3>
                    <p class="text-sm text-travelstride-gray-600">603 trips</p>
                </div>
            </div>
            <div class="text-center">
                <div class="card p-4 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="text-2xl mb-2">🇦🇷</div>
                    <h3 class="font-semibold text-travelstride-gray-900">Argentina</h3>
                    <p class="text-sm text-travelstride-gray-600">628 trips</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- All Destinations by Region -->
<section class="py-16 bg-travelstride-gray-50">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-travelstride-gray-900 mb-12">Explore by Region</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Europe -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-travelstride-gray-900 mb-4 flex items-center">
                    <i class="fas fa-mountain text-travelstride-green mr-2"></i>
                    Europe
                </h3>
                <div class="space-y-2">
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Italy (2,073 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">France (1,745 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Spain (1,234 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Croatia (492 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Greece (678 trips)</a>
                </div>
            </div>

            <!-- Asia -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-travelstride-gray-900 mb-4 flex items-center">
                    <i class="fas fa-torii-gate text-travelstride-blue mr-2"></i>
                    Asia
                </h3>
                <div class="space-y-2">
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Japan (814 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Thailand (1,567 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Vietnam (637 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">India (892 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Cambodia (445 trips)</a>
                </div>
            </div>

            <!-- Americas -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-travelstride-gray-900 mb-4 flex items-center">
                    <i class="fas fa-globe-americas text-travelstride-orange mr-2"></i>
                    Americas
                </h3>
                <div class="space-y-2">
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Canada (717 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Argentina (628 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Peru (432 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Costa Rica (266 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Brazil (389 trips)</a>
                </div>
            </div>

            <!-- Africa -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-travelstride-gray-900 mb-4 flex items-center">
                    <i class="fas fa-safari text-travelstride-yellow mr-2"></i>
                    Africa
                </h3>
                <div class="space-y-2">
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Tanzania (603 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">South Africa (456 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Morocco (378 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Kenya (234 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Egypt (567 trips)</a>
                </div>
            </div>

            <!-- Oceania -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-travelstride-gray-900 mb-4 flex items-center">
                    <i class="fas fa-kiwi-bird text-travelstride-purple mr-2"></i>
                    Oceania
                </h3>
                <div class="space-y-2">
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Australia (756 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">New Zealand (423 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Fiji (156 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Tahiti (89 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Vanuatu (67 trips)</a>
                </div>
            </div>

            <!-- Middle East -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-travelstride-gray-900 mb-4 flex items-center">
                    <i class="fas fa-mosque text-travelstride-red mr-2"></i>
                    Middle East
                </h3>
                <div class="space-y-2">
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Jordan (234 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Israel (189 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Turkey (456 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">UAE (123 trips)</a>
                    <a href="#" class="block text-travelstride-gray-600 hover:text-travelstride-green transition-colors">Oman (78 trips)</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-travelstride-blue">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to explore?</h2>
        <p class="text-xl text-travelstride-blue-lighter mb-8">Find your perfect trip to any of these amazing destinations</p>
        <a href="{{ route('trips.index') }}" class="btn-secondary">
            Browse All Trips
        </a>
    </div>
</section>
@endsection 