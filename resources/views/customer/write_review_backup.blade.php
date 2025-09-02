@php($active = 'reviews')
@extends('layouts.app')

@section('title', 'Rate this journey')

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
        
        @if(isset($noMoreProducts) && $noMoreProducts)
            <div class="bg-white rounded-xl shadow-lg p-8 mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">No more products to review!</h2>
                <p class="text-lg text-gray-600">You have completed all available product reviews. Please check back later for new opportunities.</p>
            </div>
        @elseif(isset($product) && $product)
            @php
                $userLevel = auth()->user()->level ?? 1;
                $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
                $commissionPercent = $levelSetting ? $levelSetting->normal_commission : 1;
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
                    <span class="text-green-600 font-bold">${{ number_format($commissionAmount, 2) }}</span>
                </div>
            </div>
            
            <!-- Rating Form -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <form method="POST" action="{{ route('user.customer.store_review') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="type" value="product">
                    <input type="hidden" name="item_id" value="{{ $product->id }}">
                    
                    <div class="text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-8">Rate Us Now</h3>
                        
                        <!-- Star Rating -->
                        <div class="flex items-center justify-center space-x-2 mb-8" id="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                            <svg data-value="{{ $i }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" 
                                 class="w-12 h-12 cursor-pointer text-yellow-400 hover:scale-110 transition-all duration-200">
                                <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.913c.969 0 1.371 1.24.588 1.81l-3.975 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.975-2.89a1 1 0 00-1.175 0l-3.975 2.89c-.784.57-1.838-.197-1.54-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.979 10.1c-.783-.57-.38-1.81.588-1.81h4.913a1 1 0 00.95-.69l1.518-4.674z" />
                            </svg>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating" value="5">
                        
                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl text-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
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
<div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2">
    <!-- Toasts will be dynamically added here -->
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('#star-rating svg');
    const ratingInput = document.getElementById('rating');
    let selectedRating = 5;

    updateStarDisplay(5);
    if (ratingInput) {
        ratingInput.value = 5;
    }

    stars.forEach((star) => {
        star.addEventListener('click', function() {
            selectedRating = parseInt(star.getAttribute('data-value'));
            if (ratingInput) {
                ratingInput.value = selectedRating;
            }
            updateStarDisplay(selectedRating);
        });

        star.addEventListener('mouseenter', function() {
            const hoverRating = parseInt(star.getAttribute('data-value'));
            updateStarDisplay(hoverRating);
        });
    });

    const starRating = document.getElementById('star-rating');
    if (starRating) {
        starRating.addEventListener('mouseleave', function() {
            updateStarDisplay(selectedRating);
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

    function showToast(type, message, details = null) {
        const toastContainer = document.getElementById('toast-container');
        const toast = document.createElement('div');
        
        const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
        const icon = type === 'success' ? '✓' : type === 'error' ? '✗' : 'ℹ';
        
        toast.className = `${bgColor} text-white px-6 py-4 rounded-lg shadow-lg max-w-sm transform transition-all duration-300 translate-x-full opacity-0`;
        
        let detailsHtml = '';
        if (details) {
            detailsHtml = `
                <div class="mt-2 text-sm">
                    <div>💰 Commission: $${details.commission}</div>
                    <div>🎯 ${details.journey}</div>
                    <div>💳 Balance: $${details.balance}</div>
                </div>
            `;
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

    @if(session('toast'))
        const toastData = @json(session('toast'));
        showToast(toastData.type, toastData.message, toastData.details);
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            showToast('error', '{{ $error }}');
        @endforeach
    @endif
});
</script>
@endsection 