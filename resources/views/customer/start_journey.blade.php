@extends('layouts.app')
@section('title', 'Start Journey')
@section('content')

<!-- Hero Banner with Simple Overlay -->
<section class="relative h-[40vh] bg-cover bg-no-repeat bg-center" style="background-image:url('/images/hero/rating.jpg');">
    <!-- Simple overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative flex items-center justify-center w-full h-full">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-2xl">Start Your Journey</h1>
            <p class="text-xl text-white/90 mb-4">Review and rate your travel experience</p>
            <div class="w-32 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</section>

<section class="py-12 px-4 min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto">

        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-400 text-red-800 rounded-r-lg shadow-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-semibold">{{ $errors->first() }}</span>
            </div>
        </div>
        @endif

        <!-- Success Message for Journey Started -->
        @if(session('journey_started'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-center mb-3">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-3">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold text-green-800">Journey Started Successfully! 🎉</span>
            </div>
            <div class="bg-white/60 rounded-lg p-4 text-center">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                    <div>
                        <span class="text-gray-600">Payment Processed</span>
                        <p class="font-bold text-green-700">USDT {{ number_format(session('amount_paid'), 2) }}</p>
                    </div>
                    <div>
                        <span class="text-gray-600">New Balance</span>
                        <p class="font-bold text-blue-700">USDT {{ number_format(session('new_balance'), 2) }}</p>
                    </div>
                    <div>
                        <span class="text-gray-600">Commission to Earn</span>
                        <p class="font-bold text-purple-700">USDT {{ number_format(session('commission_to_earn'), 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(!$hasReviewed)
            @php
                $userBalance = auth()->user()->balance;
                $journeyPrice = $item->price;
                $commissionPercent = auth()->user()->level ? (\App\Models\LevelSetting::where('level', auth()->user()->level)->value('normal_commission') ?? 1) : 1;
                $commissionAmount = round($item->price * $commissionPercent / 100, 2);
            @endphp
            <!-- Main Journey Card with Enhanced Design -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                
                <!-- Product Showcase Section -->
                <div class="bg-indigo-600 p-8 text-white text-center">
                    <div class="mb-6">
                        @if($item->image && file_exists(storage_path('app/public/' . $item->image)))
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                class="w-64 h-40 mx-auto object-cover rounded-2xl shadow-2xl border-4 border-white/30">
                        @else
                            <img src="https://static.travelstride.com/store/main_image/3446042/attachment/a627ed27bbc846efc65eb50052367735.jpg" alt="{{ $item->name }}"
                                class="w-64 h-40 mx-auto object-cover rounded-2xl shadow-2xl border-4 border-white/30">
                        @endif
                    </div>
                    <h2 class="text-3xl font-bold mb-2">{{ $item->name }}</h2>
                    <p class="text-xl text-white/80">USDT {{ number_format($item->price, 0) }} × 1</p>
                    <div class="mt-4 inline-block bg-white/20 backdrop-blur-sm rounded-full px-6 py-2">
                        <span class="text-sm font-semibold">✨ Premium Journey Experience</span>
                    </div>
                </div>

                <!-- Journey Financial Details -->
                <div class="p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 text-center">Journey Investment Details</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-6 bg-blue-50 rounded-xl border border-blue-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-700">Journey Investment</span>
                            </div>
                            <span class="text-xl font-bold text-blue-600">USDT {{ number_format($journeyPrice, 0) }}</span>
                        </div>
                        <div class="flex justify-between items-center p-6 bg-green-50 rounded-xl border border-green-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-700">Commission Reward ({{ $commissionPercent }}%)</span>
                            </div>
                            <span class="text-xl font-bold text-green-600">+USDT {{ number_format($commissionAmount, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Rating Section with Enhanced Design -->
                <div class="p-8 bg-gray-50">
                    <div class="text-center">
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">🌟 Rate Your Experience</h3>
                            <p class="text-gray-600">Share your thoughts and earn your commission</p>
                        </div>
                        
                        <!-- Enhanced Star Rating -->
                        <div class="flex items-center justify-center space-x-2 mb-8" id="star-rating">
                            @for($i=1; $i<=5; $i++) 
                            <div class="relative">
                                <svg data-value="{{ $i }}" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24"
                                    class="w-12 h-12 cursor-pointer text-gray-300 hover:text-yellow-400 transition-all duration-300 transform hover:scale-110">
                                    <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.913c.969 0 1.371 1.24.588 1.81l-3.975 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.975-2.89a1 1 0 00-1.175 0l-3.975 2.89c-.784.57-1.838-.197-1.54-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.979 10.1c-.783-.57-.38-1.81.588-1.81h4.913a1 1 0 00.95-.69l1.518-4.674z" />
                                </svg>
                            </div>
                            @endfor
                        </div>

                        <div class="mb-6">
                            <p id="rating-text" class="text-lg font-semibold text-gray-700">Excellent! (5 stars)</p>
                        </div>

                        <!-- Enhanced Submit Button -->
                        <form method="POST" action="{{ route('user.customer.store_review') }}" id="rating-form">
                            @csrf
                            <input type="hidden" name="type" value="product">
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <input type="hidden" name="rating" id="rating-value" value="5">
                            
                            <button type="submit" id="submit-btn"
                                class="relative overflow-hidden w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 px-8 rounded-xl text-lg transition-all duration-300 transform hover:scale-105 shadow-xl group">
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    SUBMIT REVIEW & EARN COMMISSION
                                </span>
                                <div class="absolute inset-0 bg-yellow-400/20 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                            </button>
                        </form>

                        <p class="mt-4 text-sm text-gray-500">
                            🎯 Complete your review to earn <strong>USDT {{ number_format($commissionAmount, 2) }}</strong> commission
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if($hasReviewed)
        <!-- Already Reviewed Section with Enhanced Design -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-green-500 p-6 text-white text-center">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">Journey Completed! 🎉</h3>
                <p class="text-white/90">You have successfully completed this journey</p>
            </div>
            <div class="p-8 text-center">
                <p class="text-gray-600 mb-6">Thank you for your review! Your commission has been processed.</p>
                <a href="{{ route('user.rate_trip') }}"
                    class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                    🏠 Back to Dashboard
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('#star-rating svg');
    const ratingInput = document.getElementById('rating-value');
    const ratingText = document.getElementById('rating-text');
    let selectedRating = 5; // Default to 5 stars

    const ratingLabels = {
        1: "Poor (1 star)",
        2: "Fair (2 stars)", 
        3: "Good (3 stars)",
        4: "Very Good (4 stars)",
        5: "Excellent! (5 stars)"
    };

    // Set default 5-star rating
    updateStarDisplay(5);

    stars.forEach((star, idx) => {
        star.addEventListener('click', function() {
            selectedRating = parseInt(star.getAttribute('data-value'));
            ratingInput.value = selectedRating;
            updateStarDisplay(selectedRating);
            updateRatingText(selectedRating);
            
            // Add a little animation
            star.classList.add('animate-pulse');
            setTimeout(() => star.classList.remove('animate-pulse'), 500);
        });

        // Enhanced hover effects
        star.addEventListener('mouseenter', function() {
            const hoverRating = parseInt(star.getAttribute('data-value'));
            updateStarDisplay(hoverRating);
            updateRatingText(hoverRating);
        });
    });

    // Reset to selected rating on mouse leave
    document.getElementById('star-rating').addEventListener('mouseleave', function() {
        updateStarDisplay(selectedRating);
        updateRatingText(selectedRating);
    });

    function updateStarDisplay(rating) {
        stars.forEach((star, i) => {
            if (i < rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400', 'drop-shadow-lg');
            } else {
                star.classList.remove('text-yellow-400', 'drop-shadow-lg');
                star.classList.add('text-gray-300');
            }
        });
    }

    function updateRatingText(rating) {
        if (ratingText) {
            ratingText.textContent = ratingLabels[rating];
            ratingText.className = `text-lg font-semibold transition-colors duration-300 ${
                rating >= 4 ? 'text-green-600' : rating >= 3 ? 'text-yellow-600' : 'text-red-600'
            }`;
        }
    }

    // Enhanced form submission with loading state
    const form = document.getElementById('rating-form');
    const submitBtn = document.getElementById('submit-btn');
    
    if (form && submitBtn) {
        form.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <span class="relative z-10 flex items-center justify-center">
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    SUBMITTING...
                </span>
            `;
        });
    }

    // Show success toast if there's a session message
    @if(session('success'))
        showToast(`{{ session('success') }}`, 'success');
    @endif
});

// Enhanced Toast function
function showToast(message, type = 'info') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    
    let bgColor, textColor, icon;
    switch(type) {
        case 'success':
            bgColor = 'bg-green-500';
            textColor = 'text-white';
            icon = '✅';
            break;
        case 'error':
            bgColor = 'bg-red-500';
            textColor = 'text-white';
            icon = '❌';
            break;
        case 'warning':
            bgColor = 'bg-yellow-500';
            textColor = 'text-white';
            icon = '⚠️';
            break;
        default:
            bgColor = 'bg-blue-500';
            textColor = 'text-white';
            icon = 'ℹ️';
    }
    
    toast.className = `${bgColor} ${textColor} px-6 py-4 rounded-xl shadow-2xl flex items-center space-x-3 transform transition-all duration-500 translate-x-full opacity-0 backdrop-blur-sm`;
    toast.innerHTML = `
        <span class="text-xl">${icon}</span>
        <span class="flex-1 font-medium">${message}</span>
        <button onclick="this.parentElement.remove()" class="ml-4 hover:bg-white/20 rounded-lg p-1 transition-colors">
            <span class="text-lg">×</span>
        </button>
    `;
    
    container.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-x-full', 'opacity-0');
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        toast.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => {
            if (toast.parentElement) {
                toast.remove();
            }
        }, 500);
    }, 5000);
}
</script>

<!-- Custom Styles -->
<style>
@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

.animate-shimmer {
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    background-size: 1000px 100%;
    animation: shimmer 2s infinite;
}

/* Additional animations */
@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(168, 85, 247, 0.4); }
    50% { box-shadow: 0 0 30px rgba(168, 85, 247, 0.6); }
}

.glow-on-hover:hover {
    animation: pulse-glow 2s infinite;
}
</style>
@endsection