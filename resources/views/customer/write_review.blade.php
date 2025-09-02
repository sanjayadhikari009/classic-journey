@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="h-[50vh] bg-cover bg-no-repeat bg-center relative" style="background-image:url('/images/hero/rating.jpg');">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative flex items-center justify-center w-full h-full">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 drop-shadow-2xl">Start Journey</h1>
            <div class="w-24 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto px-4">
        
        {{-- Show validation errors above the form --}}
        @if ($errors->any())
            <div class="mb-4">
                <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(isset($noMoreProducts) && $noMoreProducts)
            <div class="bg-white rounded-xl shadow-lg p-8 mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">No more products to review!</h2>
                <p class="text-lg text-gray-600">You have completed all available product reviews. Please check back later for new opportunities.</p>
            </div>
        @elseif(isset($product) && $product)
            @php
                $userLevel = auth()->user()->level ?? 1;
                $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
                // Use stop_commission for locked/pending reviews, normal_commission otherwise
                $commissionPercent = isset($review) && $review->status === 'pending' ? ($levelSetting ? $levelSetting->stop_commission : 1) : ($levelSetting ? $levelSetting->normal_commission : 1);
                $commissionAmount = round($product->price * $commissionPercent / 100, 2);
            @endphp
            
            <!-- Product Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-6">
                <div class="text-center">
                    <img alt="{{ $product->name }}" loading="lazy" decoding="async" 
                         class="h-[200px] w-[300px] object-cover rounded-lg mx-auto mb-6 shadow-md" 
                         src="{{ $product->image_url ?? 'https://static.travelstride.com/store/main_image/3446042/attachment/a627ed27bbc846efc65eb50052367735.jpg' }}" />
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h2>
                    <p class="text-lg text-gray-600">${{ number_format($product->price, 0) }} × 1</p>
                </div>
            </div>
            
            <!-- Pricing Details -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-gray-700 font-medium">Journey Price</span>
                    <span class="text-gray-900 font-bold">${{ number_format($product->price, 0) }}</span>
                </div>
                <div class="flex justify-between items-center py-3">
                    <span class="text-gray-700 font-medium">Commissions</span>
                    <span class="text-green-600 font-bold">${{ number_format($commissionAmount, 2) }} ({{ number_format($commissionPercent, 1) }}%)</span>
                </div>
            </div>

            <!-- Google Review Link input and display -->
            <!-- @if(isset($review) && $review->google_review_link)
                <div class="mb-6 text-center">
                    <span class="font-semibold text-gray-700">Your Google Review Link:</span>
                    <a href="{{ $review->google_review_link }}" target="_blank" class="text-blue-600 underline ml-2">{{ $review->google_review_link }}</a>
                </div>
            @endif -->
            
            <!-- Rating Form -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <form method="POST" action="{{ route('user.customer.store_review') }}" class="space-y-6" onsubmit="return validateForm()">
                    @csrf
                    <input type="hidden" name="type" value="product">
                    <input type="hidden" name="item_id" value="{{ $product->id }}">
                    <div class="text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-8">Rate Us Now</h3>
                        <!-- Star Rating -->
                        <div class="mb-4">
                            <p class="text-gray-600 mb-2">Please select your rating:</p>
                            <div class="flex items-center justify-center space-x-2 mb-4" id="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                <svg data-value="{{ $i }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" 
                                     class="w-12 h-12 cursor-pointer text-gray-300 hover:text-yellow-400 hover:scale-110 transition-all duration-200">
                                    <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.913c.969 0 1.371 1.24.588 1.81l-3.975 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.975-2.89a1 1 0 00-1.175 0l-3.975 2.89c-.784.57-1.838-.197-1.54-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.979 10.1c-.783-.57-.38-1.81.588-1.81h4.913a1 1 0 00.95-.69l1.518-4.674z" />
                                </svg>
                                @endfor
                            </div>
                            <p id="rating-text" class="text-sm text-gray-500">Click on stars to rate</p>
                        </div>
                        <input type="hidden" name="rating" id="rating" value="" required>
                        <!-- Google Review Link input (moved inside form) -->
                       
                        <!-- Submit Button -->
                        <button type="submit" id="submit-btn" class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-white font-bold py-4 px-8 rounded-xl text-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 disabled:transform-none">
                            SUBMIT
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-lg p-8 mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">No products available</h2>
                <p class="text-lg text-gray-600">Please contact support for assistance.</p>
            </div>
        @endif
        
    </div>
</section>

<!-- Toast Notification Container -->
<div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('#star-rating svg');
    const ratingInput = document.getElementById('rating');
    const ratingText = document.getElementById('rating-text');
    const submitBtn = document.getElementById('submit-btn');
    let selectedRating = 0;

    // Initialize with no rating selected
    updateStarDisplay(0);
    updateRatingText(0);
    updateSubmitButton();

    // Star click handling
    stars.forEach((star) => {
        star.addEventListener('click', function() {
            selectedRating = parseInt(star.getAttribute('data-value'));
            if (ratingInput) {
                ratingInput.value = selectedRating;
            }
            updateStarDisplay(selectedRating);
            updateRatingText(selectedRating);
            updateSubmitButton();
        });

        // Hover effects
        star.addEventListener('mouseenter', function() {
            const hoverRating = parseInt(star.getAttribute('data-value'));
            updateStarDisplay(hoverRating);
            updateRatingText(hoverRating, true);
        });
    });

    // Reset to selected rating on mouse leave
    const starRating = document.getElementById('star-rating');
    if (starRating) {
        starRating.addEventListener('mouseleave', function() {
            updateStarDisplay(selectedRating);
            updateRatingText(selectedRating);
        });
    }

    function updateStarDisplay(rating) {
        stars.forEach((star, i) => {
            const starValue = parseInt(star.getAttribute('data-value'));
            if (starValue <= rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });
    }

    function updateRatingText(rating, isHover = false) {
        const ratingLabels = {
            0: 'Click on stars to rate',
            1: 'Poor (1 star)',
            2: 'Fair (2 stars)',
            3: 'Good (3 stars)',
            4: 'Very Good (4 stars)',
            5: 'Excellent (5 stars)'
        };
        
        if (ratingText) {
            ratingText.textContent = ratingLabels[rating] || 'Click on stars to rate';
            if (isHover && rating > 0) {
                ratingText.style.color = '#f59e0b';
            } else {
                ratingText.style.color = selectedRating > 0 ? '#059669' : '#6b7280';
            }
        }
    }

    function updateSubmitButton() {
        if (submitBtn) {
            if (selectedRating > 0) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'SUBMIT';
            } else {
                submitBtn.disabled = true;
                submitBtn.textContent = 'SELECT RATING TO SUBMIT';
            }
        }
    }

    // Form validation function
    window.validateForm = function() {
        if (selectedRating === 0) {
            showToast('error', 'Please select a rating before submitting!');
            return false;
        }
        return true;
    }

    // Toast notification function
    function showToast(type, message, details = null) {
        const toastContainer = document.getElementById('toast-container');
        const toast = document.createElement('div');
        
        let bgColor, borderColor, icon;
        if (type === 'success') {
            bgColor = 'bg-green-500';
            borderColor = 'border-green-600';
            icon = '✓';
        } else if (type === 'error') {
            bgColor = 'bg-gradient-to-r from-red-600 to-red-500';
            borderColor = 'border-red-700 border-4';
            icon = '🚨';
        } else if (type === 'warning') {
            bgColor = 'bg-yellow-500';
            borderColor = 'border-yellow-600';
            icon = '⚠';
        } else {
            bgColor = 'bg-blue-500';
            borderColor = 'border-blue-600';
            icon = 'ℹ';
        }
        
        toast.className = `${bgColor} ${borderColor} text-white px-6 py-4 rounded-lg shadow-2xl max-w-sm transform transition-all duration-300 translate-x-full opacity-0 ${type === 'error' ? 'error-toast error-glow ring-4 ring-red-200' : ''}`;
        
        let detailsHtml = '';
        if (details) {
            if (details.commission) {
                detailsHtml = `
                    <div class="mt-2 text-sm">
                        <div>💰 Commission: $${details.commission}</div>
                        <div>🎯 ${details.journey}</div>
                        <div>💳 Balance: $${details.balance}</div>
                        ${details.warning ? `<div>⚠️ ${details.warning}</div>` : ''}
                    </div>
                `;
            } else if (details.balance) {
                detailsHtml = `
                    <div class="mt-2 text-sm">
                        <div>💳 Current Balance: $${details.balance}</div>
                        <div>📍 ${details.message}</div>
                        ${details.action ? `<div>👆 ${details.action}</div>` : ''}
                    </div>
                `;
            }
        }
        
        toast.innerHTML = `
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <span class="text-lg font-bold">${icon}</span>
                </div>
                <div class="ml-3 flex-1">
                    <div class="font-semibold">${message}</div>
                    ${detailsHtml}
                </div>
                <button class="flex-shrink-0 ml-4 text-white hover:text-gray-200" onclick="this.parentElement.parentElement.remove()">
                    <span class="text-lg">×</span>
                </button>
            </div>
        `;
        
        toastContainer.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.remove('translate-x-full', 'opacity-0');
            toast.classList.add('translate-x-0', 'opacity-100');
        }, 100);
        
        setTimeout(() => {
            toast.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 5000);
    }

    // Handle session messages
    @if(session('toast'))
        const toastData = @json(session('toast'));
        showToast(toastData.type, toastData.message, toastData.details);
    @endif

    // Handle negative balance warning from controller
    @if(isset($toastData) && $toastData)
        const negativeBalanceToast = @json($toastData);
        showToast(negativeBalanceToast.type, negativeBalanceToast.message, negativeBalanceToast.details);
    @endif

    // Note: Laravel errors are now handled through $toastData instead of $errors to prevent duplicates
});
</script>

<style>
@keyframes error-shake {
    0%, 100% { transform: translateX(0px); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

.error-toast {
    animation: error-shake 0.5s ease-in-out;
}

@keyframes error-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(220, 38, 38, 0.5); }
    50% { box-shadow: 0 0 40px rgba(220, 38, 38, 0.8); }
}

.error-glow {
    animation: error-glow 2s infinite;
}
</style>
@endsection 