@extends('layouts.app')

@section('title', 'Support')

@section('content')
@php($active = 'support')
<div class="space-y-8">
    <!-- Page Header -->
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Support Center</h1>
        <p class="text-gray-600">Get help with your bookings, account, or any travel-related questions</p>
    </div>

    <!-- Quick Help -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mx-auto mb-4 w-12 h-12 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">FAQ</h3>
            <p class="text-sm text-gray-600 mb-4">Find answers to common questions</p>
            <a href="#faq" class="text-green-600 hover:text-green-700 font-medium">Browse FAQ →</a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mx-auto mb-4 w-12 h-12 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Email Support</h3>
            <p class="text-sm text-gray-600 mb-4">Send us a detailed message</p>
            <a href="#contact" class="text-green-600 hover:text-green-700 font-medium">Contact Us →</a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600 mx-auto mb-4 w-12 h-12 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Live Chat</h3>
            <p class="text-sm text-gray-600 mb-4">Chat with our support team</p>
            <button class="text-green-600 hover:text-green-700 font-medium">Start Chat →</button>
        </div>
    </div>

    <!-- Contact Form -->
    <div id="contact" class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Us</h2>
        
        <form method="POST" action="{{ route('user.support.contact') }}" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
            </div>
            
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                <select id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">Select a topic</option>
                    <option value="booking">Booking Issues</option>
                    <option value="payment">Payment Problems</option>
                    <option value="account">Account Issues</option>
                    <option value="technical">Technical Support</option>
                    <option value="general">General Inquiry</option>
                </select>
            </div>
            
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                <textarea id="message" name="message" rows="6" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                          placeholder="Please describe your issue in detail..."></textarea>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Send Message
                </button>
            </div>
        </form>
    </div>

    <!-- FAQ Section -->
    <div id="faq" class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
        
        <div class="space-y-4">
            <div class="border border-gray-200 rounded-lg">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50">
                    <span class="font-medium text-gray-900">How do I cancel my booking?</span>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-600">You can cancel your booking through your dashboard. Go to "My Bookings" and click on the booking you want to cancel. Please note that cancellation policies vary by trip and may incur fees.</p>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50">
                    <span class="font-medium text-gray-900">What payment methods do you accept?</span>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-600">We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. All payments are processed securely through our payment partners.</p>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50">
                    <span class="font-medium text-gray-900">How do I change my booking dates?</span>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-600">To change your booking dates, contact our support team at least 30 days before your trip. Date changes are subject to availability and may incur additional fees.</p>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50">
                    <span class="font-medium text-gray-900">What is included in my trip package?</span>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-600">Each trip package includes accommodation, transportation, guided tours, and some meals as specified in the trip details. Flights, travel insurance, and personal expenses are typically not included.</p>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50">
                    <span class="font-medium text-gray-900">How do I get a refund?</span>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-600">Refund requests are processed according to our cancellation policy. Please contact our support team with your booking reference number to initiate a refund request.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Other Ways to Reach Us</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mx-auto mb-4 w-12 h-12 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="font-medium text-gray-900 mb-2">Phone Support</h3>
                <p class="text-sm text-gray-600 mb-2">Available 24/7</p>
                <p class="text-green-600 font-medium">+1 (555) 123-4567</p>
            </div>

            <div class="text-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600 mx-auto mb-4 w-12 h-12 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-medium text-gray-900 mb-2">Email Support</h3>
                <p class="text-sm text-gray-600 mb-2">Response within 24 hours</p>
                <p class="text-green-600 font-medium">support@travelstride.com</p>
            </div>

            <div class="text-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600 mx-auto mb-4 w-12 h-12 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="font-medium text-gray-900 mb-2">Office Address</h3>
                <p class="text-sm text-gray-600 mb-2">Visit us in person</p>
                <p class="text-green-600 font-medium">123 Travel St, City, State 12345</p>
            </div>
        </div>
    </div>
</div>
@endsection 