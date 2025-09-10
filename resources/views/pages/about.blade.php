@extends('layouts.public')

@section('title', 'About Travelstride')

@section('content')
<!-- Hero Section -->
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto ">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-travelstride-gray-900 mb-4">About Classic Journey</h1>
            <p class="text-xl text-travelstride-gray-600 mb-8">The new way to explore the world's wonders</p>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-travelstride-gray-900 mb-6">Our Mission</h2>
            <p class="text-lg text-travelstride-gray-600 leading-relaxed">
                Classic Journey helps you search and compare 50,000+ expert-planned trips from 1,000+ companies.
                Get the real picture with both traveler and expert reviews to ensure the trip you book is the right one
                for you.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div
                    class="bg-travelstride-green-lighter rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-travelstride-green text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Widest Selection</h3>
                <p class="text-travelstride-gray-600 text-sm">
                    Many sites show only companies that pay them. Not us, we aim to show every option.
                </p>
            </div>

            <div class="text-center">
                <div
                    class="bg-travelstride-blue-lighter rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-travelstride-blue text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Real Reviews</h3>
                <p class="text-travelstride-gray-600 text-sm">
                    Learn from real traveler reviews on expert-planned trips visiting multiple destinations.
                </p>
            </div>

            <div class="text-center">
                <div
                    class="bg-travelstride-orange rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-dollar-sign text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Member Benefits</h3>
                <p class="text-travelstride-gray-600 text-sm">
                    Get a rebate up to 15% of your trip price after you share your review.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- What We Do Section -->
<section class="py-16 bg-travelstride-gray-50">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto ">
        <h2 class="text-3xl font-bold text-center text-travelstride-gray-900 mb-12">What We Do</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-2xl font-bold text-travelstride-gray-900 mb-6">Find wonderful travel, your way</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div
                            class="bg-travelstride-green rounded-full w-6 h-6 flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-travelstride-gray-900">One click trips</h4>
                            <p class="text-travelstride-gray-600 text-sm">Experience the fun parts of travel without the
                                hassle of planning logistics and booking different components from multiple sites</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="bg-travelstride-green rounded-full w-6 h-6 flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-travelstride-gray-900">Reviewed itineraries</h4>
                            <p class="text-travelstride-gray-600 text-sm">Learn from real traveler reviews on
                                expert-planned trips visiting multiple destinations</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="bg-travelstride-green rounded-full w-6 h-6 flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-travelstride-gray-900">Compare 1,000+ brands</h4>
                            <p class="text-travelstride-gray-600 text-sm">Find the best trip for you, and the best
                                prices, when you search and compare all the operators and trip designers in one place
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-8">
                <h4 class="text-lg font-semibold text-travelstride-gray-900 mb-4">Our Numbers</h4>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-travelstride-gray-600">Expert-planned trips</span>
                        <span class="font-semibold text-travelstride-gray-900">50,000+</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-travelstride-gray-600">Travel companies</span>
                        <span class="font-semibold text-travelstride-gray-900">1,000+</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-travelstride-gray-600">Global and local brands</span>
                        <span class="font-semibold text-travelstride-gray-900">1,629</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-travelstride-gray-600">Member savings</span>
                        <span class="font-semibold text-travelstride-gray-900">Up to $700</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Companies Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto ">
        <h2 class="text-3xl font-bold text-center text-travelstride-gray-900 mb-12">Tours & Operators on Classic Journey
        </h2>
        <p class="text-center text-travelstride-gray-600 mb-8">Awarded and Featured by:</p>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <div class="text-center">
                <div
                    class="bg-travelstride-gray-100 rounded-lg p-4 h-20 flex items-center justify-center hover:bg-travelstride-gray-200 transition-colors cursor-pointer">
                    <span class="font-semibold text-travelstride-gray-700 text-sm">Intrepid Travel</span>
                </div>
            </div>
            <div class="text-center">
                <div
                    class="bg-travelstride-gray-100 rounded-lg p-4 h-20 flex items-center justify-center hover:bg-travelstride-gray-200 transition-colors cursor-pointer">
                    <span class="font-semibold text-travelstride-gray-700 text-sm">Audley Travel</span>
                </div>
            </div>
            <div class="text-center">
                <div
                    class="bg-travelstride-gray-100 rounded-lg p-4 h-20 flex items-center justify-center hover:bg-travelstride-gray-200 transition-colors cursor-pointer">
                    <span class="font-semibold text-travelstride-gray-700 text-sm">Exodus Adventure Travels</span>
                </div>
            </div>
            <div class="text-center">
                <div
                    class="bg-travelstride-gray-100 rounded-lg p-4 h-20 flex items-center justify-center hover:bg-travelstride-gray-200 transition-colors cursor-pointer">
                    <span class="font-semibold text-travelstride-gray-700 text-sm">Road Scholar</span>
                </div>
            </div>
            <div class="text-center">
                <div
                    class="bg-travelstride-gray-100 rounded-lg p-4 h-20 flex items-center justify-center hover:bg-travelstride-gray-200 transition-colors cursor-pointer">
                    <span class="font-semibold text-travelstride-gray-700 text-sm">National Geographic
                        Expeditions</span>
                </div>
            </div>
            <div class="text-center">
                <div
                    class="bg-travelstride-gray-100 rounded-lg p-4 h-20 flex items-center justify-center hover:bg-travelstride-gray-200 transition-colors cursor-pointer">
                    <span class="font-semibold text-travelstride-gray-700 text-sm">Collette</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-travelstride-blue">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to start your journey?</h2>
        <p class="text-xl text-travelstride-blue-lighter mb-8">Join thousands of travelers who trust Classic Journey for
            their adventures</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('trips.index') }}" class="btn-secondary">
                Browse Trips
            </a>
            <a href="{{ route('design-trip') }}"
                class="btn-outline border-white text-white hover:bg-white hover:text-travelstride-blue">
                Design My Trip
            </a>
        </div>
    </div>
</section>
@endsection