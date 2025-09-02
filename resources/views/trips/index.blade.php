@extends('layouts.public')

@section('title', 'Trips - Travelstride')

@section('content')
<!-- Hero Section -->
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-travelstride-gray-900 mb-4">Find Your Perfect Trip</h1>
            <p class="text-xl text-travelstride-gray-600 mb-8">Search and compare 50,000+ expert-planned trips from 1,000+ companies</p>
            
            <!-- Search Form -->
            <form class="max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" placeholder="Where do you want to go?" class="w-full px-4 py-3 rounded-lg border border-travelstride-gray-300 focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    </div>
                    <div class="flex-1">
                        <select class="w-full px-4 py-3 rounded-lg border border-travelstride-gray-300 focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                            <option>All Trip Types</option>
                            <option>Guided Group</option>
                            <option>Custom</option>
                            <option>Small Ship & Expedition Cruises</option>
                            <option>Adventure</option>
                            <option>Self-Guided & Independent</option>
                            <option>Small Group</option>
                            <option>River Cruises</option>
                            <option>Private Guided</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-primary">
                        Search Trips
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Filters Section -->
<section class="py-8 bg-white border-b border-travelstride-gray-200">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-4">
            <button class="px-4 py-2 bg-travelstride-green-lighter text-travelstride-green rounded-full text-sm font-medium">All Trips</button>
            <button class="px-4 py-2 bg-travelstride-gray-100 text-travelstride-gray-700 rounded-full text-sm font-medium hover:bg-travelstride-green-lighter hover:text-travelstride-green transition-colors">Top 10 Lists</button>
            <button class="px-4 py-2 bg-travelstride-gray-100 text-travelstride-gray-700 rounded-full text-sm font-medium hover:bg-travelstride-green-lighter hover:text-travelstride-green transition-colors">Editor Picks</button>
            <button class="px-4 py-2 bg-travelstride-gray-100 text-travelstride-gray-700 rounded-full text-sm font-medium hover:bg-travelstride-green-lighter hover:text-travelstride-green transition-colors">Most Popular Trips</button>
            <button class="px-4 py-2 bg-travelstride-gray-100 text-travelstride-gray-700 rounded-full text-sm font-medium hover:bg-travelstride-green-lighter hover:text-travelstride-green transition-colors">Award Winners</button>
            <button class="px-4 py-2 bg-travelstride-gray-100 text-travelstride-gray-700 rounded-full text-sm font-medium hover:bg-travelstride-green-lighter hover:text-travelstride-green transition-colors">Collections</button>
            <button class="px-4 py-2 bg-travelstride-gray-100 text-travelstride-gray-700 rounded-full text-sm font-medium hover:bg-travelstride-green-lighter hover:text-travelstride-green transition-colors">Top Trending</button>
        </div>
    </div>
</section>

<!-- Trips Grid -->
<section class="py-16 bg-travelstride-gray-50">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-travelstride-gray-900">Featured Trips</h2>
            <div class="flex items-center space-x-4">
                <span class="text-travelstride-gray-600">Sort by:</span>
                <select class="px-3 py-2 border border-travelstride-gray-300 rounded-md text-sm focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    <option>Most Popular</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Duration: Short to Long</option>
                    <option>Duration: Long to Short</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Italy Grand Tour -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="gradient-card-1 h-48 relative">
                    <div class="badge-featured absolute top-4 right-4">Featured</div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">The Italy Grand Tour</h3>
                    <p class="text-travelstride-gray-600 text-sm mb-2">By Alma Italia</p>
                    <p class="text-travelstride-gray-500 text-sm mb-3">Private Guided</p>
                    <div class="flex items-center mb-3">
                        <div class="rating-stars flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-sm text-travelstride-gray-600 ml-2">(127 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-travelstride-gray-600">13 days</span>
                        <span class="price-display text-lg">From $6,950</span>
                    </div>
                </div>
            </div>

            <!-- Explore Croatia -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="gradient-card-2 h-48 relative">
                    <div class="badge-popular absolute top-4 right-4">Popular</div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Explore Croatia</h3>
                    <p class="text-travelstride-gray-600 text-sm mb-2">By Intrepid Travel</p>
                    <p class="text-travelstride-gray-500 text-sm mb-3">Small Group Tour</p>
                    <div class="flex items-center mb-3">
                        <div class="rating-stars flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="text-sm text-travelstride-gray-600 ml-2">(89 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-travelstride-gray-600">8 days</span>
                        <span class="price-display text-lg">From $2,075</span>
                    </div>
                </div>
            </div>

            <!-- Central Europe -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="gradient-card-3 h-48"></div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Central Europe: Castles, Culture & Capitals</h3>
                    <p class="text-travelstride-gray-600 text-sm mb-2">By Exodus Adventure Travels</p>
                    <p class="text-travelstride-gray-500 text-sm mb-3">Small Group Tour</p>
                    <div class="flex items-center mb-3">
                        <div class="rating-stars flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-sm text-travelstride-gray-600 ml-2">(156 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-travelstride-gray-600">8 days</span>
                        <span class="price-display text-lg">From $3,000</span>
                    </div>
                </div>
            </div>

            <!-- Botswana Tour -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="gradient-card-4 h-48"></div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Botswana Tour</h3>
                    <p class="text-travelstride-gray-600 text-sm mb-2">By Safari365</p>
                    <p class="text-travelstride-gray-500 text-sm mb-3">Self-Guided / Independent Tour</p>
                    <div class="flex items-center mb-3">
                        <div class="rating-stars flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="text-sm text-travelstride-gray-600 ml-2">(67 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-travelstride-gray-600">8 days</span>
                        <span class="price-display text-lg">From $3,413</span>
                    </div>
                </div>
            </div>

            <!-- Treasures of Northern Thailand -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="bg-red-500 h-48"></div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Treasures of Northern Thailand</h3>
                    <p class="text-travelstride-gray-600 text-sm mb-2">By Exodus Adventure Travels</p>
                    <p class="text-travelstride-gray-500 text-sm mb-3">Small Group Tour</p>
                    <div class="flex items-center mb-3">
                        <div class="rating-stars flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-sm text-travelstride-gray-600 ml-2">(203 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-travelstride-gray-600">10 days</span>
                        <span class="price-display text-lg">From $2,625</span>
                    </div>
                </div>
            </div>

            <!-- Treasures of Spain and Portugal -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="bg-yellow-500 h-48"></div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Treasures of Spain and Portugal</h3>
                    <p class="text-travelstride-gray-600 text-sm mb-2">By Exodus Adventure Travels</p>
                    <p class="text-travelstride-gray-500 text-sm mb-3">Small Group Tour</p>
                    <div class="flex items-center mb-3">
                        <div class="rating-stars flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="text-sm text-travelstride-gray-600 ml-2">(142 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-travelstride-gray-600">15 days</span>
                        <span class="price-display text-lg">From $3,850</span>
                    </div>
                </div>
            </div>

            <!-- Morocco Adventure -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="bg-orange-500 h-48"></div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Morocco Adventure</h3>
                    <p class="text-travelstride-gray-600 text-sm mb-2">By Intrepid Travel</p>
                    <p class="text-travelstride-gray-500 text-sm mb-3">Small Group Tour</p>
                    <div class="flex items-center mb-3">
                        <div class="rating-stars flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-sm text-travelstride-gray-600 ml-2">(178 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-travelstride-gray-600">12 days</span>
                        <span class="price-display text-lg">From $1,895</span>
                    </div>
                </div>
            </div>

            <!-- Japan Discovery -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="bg-purple-500 h-48"></div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Japan Discovery</h3>
                    <p class="text-travelstride-gray-600 text-sm mb-2">By G Adventures</p>
                    <p class="text-travelstride-gray-500 text-sm mb-3">Small Group Tour</p>
                    <div class="flex items-center mb-3">
                        <div class="rating-stars flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="text-sm text-travelstride-gray-600 ml-2">(95 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-travelstride-gray-600">14 days</span>
                        <span class="price-display text-lg">From $4,200</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="btn-outline px-8 py-3">
                Load More Trips
            </button>
        </div>
    </div>
</section>

<!-- Trip Categories Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-travelstride-gray-900 mb-12">Explore by Trip Type</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ([
                ['title' => 'Guided Group Tours', 'icon' => 'fa-users', 'color' => 'bg-travelstride-yellow', 'count' => '15,234'],
                ['title' => 'Custom Tours', 'icon' => 'fa-heart', 'color' => 'bg-travelstride-orange', 'count' => '8,567'],
                ['title' => 'Small Ship Cruises', 'icon' => 'fa-ship', 'color' => 'bg-travelstride-blue', 'count' => '3,421'],
                ['title' => 'Adventure Tours', 'icon' => 'fa-hiking', 'color' => 'bg-travelstride-green', 'count' => '12,890'],
                ['title' => 'Self-Guided Tours', 'icon' => 'fa-map', 'color' => 'bg-travelstride-purple', 'count' => '6,234'],
                ['title' => 'River Cruises', 'icon' => 'fa-water', 'color' => 'bg-travelstride-blue-light', 'count' => '2,156'],
                ['title' => 'Private Guided', 'icon' => 'fa-user-tie', 'color' => 'bg-travelstride-green-light', 'count' => '4,789'],
                ['title' => 'Luxury Tours', 'icon' => 'fa-crown', 'color' => 'bg-travelstride-red', 'count' => '1,234'],
            ] as $category)
            <div class="card p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                <div class="{{ $category['color'] }} rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $category['icon'] }} text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-travelstride-gray-900 mb-2">{{ $category['title'] }}</h3>
                <p class="text-travelstride-gray-600 text-sm">{{ number_format($category['count']) }} trips</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Popular Destinations Section -->
<section class="py-16 bg-travelstride-gray-50">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-travelstride-gray-900 mb-12">Popular Destinations</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach ([
                ['name' => 'Italy', 'trips' => '2,073'],
                ['name' => 'France', 'trips' => '1,856'],
                ['name' => 'Spain', 'trips' => '1,234'],
                ['name' => 'Japan', 'trips' => '987'],
                ['name' => 'Thailand', 'trips' => '1,567'],
                ['name' => 'Australia', 'trips' => '756'],
                ['name' => 'Peru', 'trips' => '432'],
                ['name' => 'Croatia', 'trips' => '492'],
                ['name' => 'Greece', 'trips' => '678'],
                ['name' => 'Vietnam', 'trips' => '637'],
                ['name' => 'Costa Rica', 'trips' => '266'],
                ['name' => 'Canada', 'trips' => '717'],
            ] as $destination)
            <div class="bg-white rounded-lg p-4 text-center hover:shadow-md transition-shadow cursor-pointer">
                <h3 class="font-medium text-travelstride-gray-900 mb-1">{{ $destination['name'] }}</h3>
                <p class="text-sm text-travelstride-gray-600">{{ $destination['trips'] }} trips</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection 