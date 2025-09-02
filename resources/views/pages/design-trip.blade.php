@extends('layouts.app')

@section('title', 'Design My Trip - Travelstride')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-travelstride-blue-lighter to-travelstride-green-lighter py-16">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-travelstride-gray-900 mb-4">Design Your Perfect Trip</h1>
            <p class="text-xl text-travelstride-gray-600 mb-8">Tell us what you're looking for and we'll help you create the perfect journey</p>
        </div>
    </div>
</section>

<!-- Trip Design Form -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <form class="space-y-8">
            <!-- Destination -->
            <div>
                <label class="block text-lg font-medium text-travelstride-gray-900 mb-4">Where would you like to go?</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Primary Destination</label>
                        <input type="text" placeholder="e.g., Italy, Japan, Peru" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Additional Destinations</label>
                        <input type="text" placeholder="e.g., France, Switzerland" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- Travel Style -->
            <div>
                <label class="block text-lg font-medium text-travelstride-gray-900 mb-4">What type of travel experience are you looking for?</label>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Guided Group</div>
                            <div class="text-sm text-travelstride-gray-600">Groups of 25-60 people</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Small Group</div>
                            <div class="text-sm text-travelstride-gray-600">10-24 people</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Private Guided</div>
                            <div class="text-sm text-travelstride-gray-600">Exclusive attention</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Adventure</div>
                            <div class="text-sm text-travelstride-gray-600">Active experiences</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Luxury</div>
                            <div class="text-sm text-travelstride-gray-600">Premium experiences</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Cultural</div>
                            <div class="text-sm text-travelstride-gray-600">Local experiences</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Trip Details -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">When do you want to travel?</label>
                    <select class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                        <option>Select month</option>
                        <option>January 2025</option>
                        <option>February 2025</option>
                        <option>March 2025</option>
                        <option>April 2025</option>
                        <option>May 2025</option>
                        <option>June 2025</option>
                        <option>July 2025</option>
                        <option>August 2025</option>
                        <option>September 2025</option>
                        <option>October 2025</option>
                        <option>November 2025</option>
                        <option>December 2025</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">How long?</label>
                    <select class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                        <option>Select duration</option>
                        <option>1-3 days</option>
                        <option>4-7 days</option>
                        <option>8-14 days</option>
                        <option>15-21 days</option>
                        <option>22+ days</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Group size</label>
                    <select class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                        <option>Select group size</option>
                        <option>1 person</option>
                        <option>2 people</option>
                        <option>3-5 people</option>
                        <option>6-10 people</option>
                        <option>11+ people</option>
                    </select>
                </div>
            </div>

            <!-- Budget -->
            <div>
                <label class="block text-lg font-medium text-travelstride-gray-900 mb-4">What's your budget per person?</label>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="budget" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Budget</div>
                            <div class="text-sm text-travelstride-gray-600">Under $2,000</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="budget" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Mid-range</div>
                            <div class="text-sm text-travelstride-gray-600">$2,000-$5,000</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="budget" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Premium</div>
                            <div class="text-sm text-travelstride-gray-600">$5,000-$10,000</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="budget" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 mr-3">
                        <div>
                            <div class="font-medium text-travelstride-gray-900">Luxury</div>
                            <div class="text-sm text-travelstride-gray-600">$10,000+</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Interests -->
            <div>
                <label class="block text-lg font-medium text-travelstride-gray-900 mb-4">What interests you most?</label>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="flex items-center p-3 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <span class="text-travelstride-gray-900">History & Culture</span>
                    </label>
                    <label class="flex items-center p-3 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <span class="text-travelstride-gray-900">Food & Wine</span>
                    </label>
                    <label class="flex items-center p-3 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <span class="text-travelstride-gray-900">Nature & Wildlife</span>
                    </label>
                    <label class="flex items-center p-3 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <span class="text-travelstride-gray-900">Adventure & Sports</span>
                    </label>
                    <label class="flex items-center p-3 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <span class="text-travelstride-gray-900">Relaxation & Wellness</span>
                    </label>
                    <label class="flex items-center p-3 border border-travelstride-gray-300 rounded-lg hover:bg-travelstride-gray-50 cursor-pointer transition-colors">
                        <input type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded mr-3">
                        <span class="text-travelstride-gray-900">Photography</span>
                    </label>
                </div>
            </div>

            <!-- Contact Information -->
            <div>
                <label class="block text-lg font-medium text-travelstride-gray-900 mb-4">Contact Information</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">First Name</label>
                        <input type="text" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Last Name</label>
                        <input type="text" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Phone (optional)</label>
                        <input type="tel" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- Additional Notes -->
            <div>
                <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Additional Notes (optional)</label>
                <textarea rows="4" placeholder="Tell us anything else that might help us design your perfect trip..." class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn-primary px-12 py-4 text-lg">
                    Design My Trip
                </button>
                <p class="text-sm text-travelstride-gray-600 mt-4">We'll get back to you within 24 hours with personalized trip recommendations</p>
            </div>
        </form>
    </div>
</section>

<!-- Why Use Our Service -->
<section class="py-16 bg-travelstride-gray-50">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-travelstride-gray-900 mb-12">Why Use Our Trip Design Service?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-travelstride-green-lighter rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-tie text-travelstride-green text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Expert Guidance</h3>
                <p class="text-travelstride-gray-600">Our travel experts have visited these destinations and know the best experiences</p>
            </div>
            <div class="text-center">
                <div class="bg-travelstride-blue-lighter rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-travelstride-blue text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Save Time</h3>
                <p class="text-travelstride-gray-600">No more endless research - we'll find the perfect trips for your preferences</p>
            </div>
            <div class="text-center">
                <div class="bg-travelstride-orange rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Personalized</h3>
                <p class="text-travelstride-gray-600">Every recommendation is tailored to your specific interests and budget</p>
            </div>
        </div>
    </div>
</section>
@endsection 