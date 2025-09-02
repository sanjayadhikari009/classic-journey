@php($active = 'dashboard')
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8 ">
    <!-- Welcome Section -->
    <div class="bg-green-600 rounded-lg p-8 text-white pt-[150px]">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
                <p class="text-green-100">Ready for your next adventure? Explore amazing trips and manage your
                    bookings.
                </p>
            </div>
            <div class="hidden md:block">
                <svg class="w-24 h-24 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m-6 3l6-3">
                    </path>
                </svg>
            </div>
        </div>

    </div>

    <!-- Statistics Cards -->
    <div>

    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('trips.index') }}"
                class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900">Browse Trips</h3>
                    <p class="text-sm text-gray-600">Discover amazing destinations</p>
                </div>
            </a>

            <a href="{{ route('user.bookings') }}"
                class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                <div class="p-2 rounded-full bg-green-100 text-green-600 mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900">My Bookings</h3>
                    <p class="text-sm text-gray-600">View your reservations</p>
                </div>
            </a>

            <a href="{{ route('user.favorites') }}"
                class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                <div class="p-2 rounded-full bg-red-100 text-red-600 mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900">Favorites</h3>
                    <p class="text-sm text-gray-600">Your saved trips</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-900">Recent Bookings</h2>
            <a href="{{ route('user.bookings') }}" class="text-green-600 hover:text-green-700 font-medium">View All</a>
        </div>

        @php($recentBookings = auth()->user()->orders()->with('trip')->latest()->take(5)->get())

        @if($recentBookings->count() > 0)
        <div class="space-y-4">
            @foreach($recentBookings as $booking)
            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                <div class="flex items-center">
                    @if($booking->trip && $booking->trip->image)
                    <img src="{{ asset('storage/' . $booking->trip->image) }}" alt="{{ $booking->trip->title }}"
                        class="w-12 h-12 rounded-lg object-cover mr-4">
                    @else
                    <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    @endif
                    <div>
                        <h3 class="font-medium text-gray-900">{{ $booking->trip->title ?? 'Trip' }}</h3>
                        <p class="text-sm text-gray-600">{{ $booking->trip->destination ?? 'Destination' }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-medium text-gray-900">${{ number_format($booking->amount, 2) }}</p>
                    <span
                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                               ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-8">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                </path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No bookings yet</h3>
            <p class="text-gray-600 mb-4">Start exploring amazing trips and make your first booking!</p>
            <a href="{{ route('trips.index') }}"
                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Browse Trips
            </a>
        </div>
        @endif
    </div>

    <!-- Travel Inspiration -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Travel Inspiration</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-500 rounded-lg p-6 text-white">
                <h3 class="font-semibold mb-2">Adventure Awaits</h3>
                <p class="text-blue-100 text-sm mb-4">Discover thrilling outdoor experiences and adrenaline-pumping
                    activities.</p>
                <a href="{{ route('trips.index') }}?category=adventure"
                    class="text-blue-200 hover:text-white text-sm font-medium">Explore →</a>
            </div>

            <div class="bg-green-500 rounded-lg p-6 text-white">
                <h3 class="font-semibold mb-2">Cultural Experiences</h3>
                <p class="text-green-100 text-sm mb-4">Immerse yourself in local traditions and authentic cultural
                    experiences.</p>
                <a href="{{ route('trips.index') }}?category=cultural"
                    class="text-green-200 hover:text-white text-sm font-medium">Explore →</a>
            </div>

            <div class="bg-purple-500 rounded-lg p-6 text-white">
                <h3 class="font-semibold mb-2">Luxury Getaways</h3>
                <p class="text-purple-100 text-sm mb-4">Indulge in premium accommodations and exclusive travel
                    experiences.</p>
                <a href="{{ route('trips.index') }}?category=luxury"
                    class="text-purple-200 hover:text-white text-sm font-medium">Explore →</a>
            </div>
        </div>
    </div>
</div>
@endsection