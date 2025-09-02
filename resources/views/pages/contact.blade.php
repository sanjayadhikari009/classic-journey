@extends('layouts.public')

@section('title', 'Contact Us - Travelstride')

@section('content')
<!-- Hero Section -->
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-travelstride-gray-900 mb-4">Contact Us</h1>
            <p class="text-xl text-travelstride-gray-600 mb-8">We're here to help you plan your perfect trip</p>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-16 bg-white">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="text-2xl font-bold text-travelstride-gray-900 mb-6">Send us a message</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">First Name</label>
                            <input type="text" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Last Name</label>
                            <input type="text" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Subject</label>
                        <select class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent">
                            <option>General Inquiry</option>
                            <option>Trip Planning</option>
                            <option>Technical Support</option>
                            <option>Partnership</option>
                            <option>Feedback</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-travelstride-gray-700 mb-2">Message</label>
                        <textarea rows="6" placeholder="Tell us how we can help you..." class="w-full px-4 py-3 border border-travelstride-gray-300 rounded-lg focus:ring-2 focus:ring-travelstride-green focus:border-transparent"></textarea>
                    </div>
                    
                    <button type="submit" class="btn-primary w-full">
                        Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-bold text-travelstride-gray-900 mb-6">Get in touch</h2>
                
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="bg-travelstride-green-lighter rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-travelstride-green"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-travelstride-gray-900 mb-2">Email</h3>
                            <p class="text-travelstride-gray-600">support@travelstride.com</p>
                            <p class="text-travelstride-gray-600">partnerships@travelstride.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-travelstride-blue-lighter rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-phone text-travelstride-blue"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-travelstride-gray-900 mb-2">Phone</h3>
                            <p class="text-travelstride-gray-600">+1 (555) 123-4567</p>
                            <p class="text-sm text-travelstride-gray-500">Monday - Friday, 9 AM - 6 PM EST</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-travelstride-orange rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-travelstride-gray-900 mb-2">Address</h3>
                            <p class="text-travelstride-gray-600">
                                Travelstride Inc.<br>
                                123 Travel Street<br>
                                New York, NY 10001<br>
                                United States
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-travelstride-purple rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-travelstride-gray-900 mb-2">Business Hours</h3>
                            <p class="text-travelstride-gray-600">Monday - Friday: 9:00 AM - 6:00 PM EST</p>
                            <p class="text-travelstride-gray-600">Saturday: 10:00 AM - 4:00 PM EST</p>
                            <p class="text-travelstride-gray-600">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="mt-8">
                    <h3 class="font-semibold text-travelstride-gray-900 mb-4">Follow us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-travelstride-blue text-white p-3 rounded-full hover:bg-travelstride-blue-light transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-travelstride-blue-light text-white p-3 rounded-full hover:bg-travelstride-blue transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-travelstride-purple text-white p-3 rounded-full hover:bg-travelstride-red transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="bg-travelstride-green text-white p-3 rounded-full hover:bg-travelstride-green-dark transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-travelstride-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-travelstride-gray-900 mb-12">Frequently Asked Questions</h2>
        
        <div class="space-y-6">
            <div class="card p-6">
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">How do I book a trip through Travelstride?</h3>
                <p class="text-travelstride-gray-600">You can browse our selection of trips, read reviews, and click through to book directly with the tour operator. We don't handle bookings ourselves but connect you with the best operators.</p>
            </div>
            
            <div class="card p-6">
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">How do I get the member savings?</h3>
                <p class="text-travelstride-gray-600">After you complete your trip, write a review and you'll receive a rebate of up to 15% of your trip price, up to $700 per person.</p>
            </div>
            
            <div class="card p-6">
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">Can I customize a trip?</h3>
                <p class="text-travelstride-gray-600">Yes! Use our "Design My Trip" feature to tell us your preferences and we'll connect you with operators who can create a custom itinerary for you.</p>
            </div>
            
            <div class="card p-6">
                <h3 class="text-lg font-semibold text-travelstride-gray-900 mb-2">How do I know which tour operator to choose?</h3>
                <p class="text-travelstride-gray-600">Read the detailed reviews from real travelers, check the operator's ratings, and compare itineraries. We show you all the options so you can make an informed decision.</p>
            </div>
        </div>
        
        <div class="text-center mt-8">
            <a href="#" class="text-travelstride-green hover:text-travelstride-green-dark font-medium transition-colors">
                View all FAQs →
            </a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-travelstride-blue">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to start planning?</h2>
        <p class="text-xl text-travelstride-blue-lighter mb-8">Let us help you find your perfect adventure</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('trips.index') }}" class="btn-secondary">
                Browse Trips
            </a>
            <a href="{{ route('design-trip') }}" class="btn-outline border-white text-white hover:bg-white hover:text-travelstride-blue">
                Design My Trip
            </a>
        </div>
    </div>
</section>
@endsection 