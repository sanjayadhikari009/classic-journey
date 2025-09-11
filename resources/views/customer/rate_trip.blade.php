@extends('layouts.app')
@section('title', 'Rate this journey')
@section('content')
<section class="h-[50vh] bg-cover bg-no-repeat bg-center relative" style="background-image:url('/images/hero/rating.jpg');">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative flex items-center justify-center w-full h-full">
        <div class="text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 drop-shadow-2xl">Rate this journey</h1>
            <div class="w-32 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</section>

<section class="py-[65px]">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto space-y-8">
        <!-- Stats Section -->
        <div class="bg-white rounded-lg shadow p-6">
            {{-- Show validation errors above the stats --}}
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="font-bold text-gray-700">Level</div>
                    <div class="text-xl text-indigo-600">{{ $user->level }}</div>
                </div>
                <div class="text-center">
                    <div class="font-bold text-gray-700">Current Balance</div>
                    <div class="text-xl text-gray-900">USDT {{ number_format(auth()->user()->balance ?? 0, 2) }}</div>
                </div>
                <div class="text-center">
                    <div class="font-bold text-gray-700">Total Commission</div>
                    <div class="text-xl text-green-600">USDT {{ number_format($totalProductEarnings ?? 0, 2) }}</div>
                </div>
                <div class="text-center">
                    <div class="font-bold text-gray-700">Max Journey</div>
                    <div class="text-xl text-gray-900">{{ $totalJourney ?? 0 }}</div>
                </div>

                <div class="text-center">
                    <div class="font-bold text-gray-700">Current Journey</div>
                    <div class="text-xl text-blue-600">{{ $visitedJourneys }}</div>
                </div>
                <div class="text-center">
                    <div class="font-bold text-gray-700">Journeys Remaining</div>
                    <div class="text-xl text-orange-600">{{ max(($totalJourney - $visitedJourneys), 0) }}</div>
                </div>

            </div>
            <!-- Journey Progress Bar -->
            @if($totalJourney > 0)
            <div class="mt-4 pt-4 border-t border-gray-200">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Journey Progress</span>
                    <span>{{ min($visitedJourneys, $totalJourney) }}/{{ $totalJourney }}
                        ({{ max($totalJourney - $visitedJourneys, 0) }} remaining)</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full"
                        style="width: {{ $totalJourney > 0 ? min(($visitedJourneys / $totalJourney) * 100, 100) : 0 }}%">
                    </div>
                </div>
                @php
                    $showedToast = false;
                @endphp
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        @if(session('error'))
                            showToast(@json(session('error')), 'error');
                            window._showedToast = true;
                        @elseif(session('success'))
                            showToast(@json(session('success')), 'success');
                            window._showedToast = true;
                        @elseif(session('message'))
                            showToast(@json(session('message')), 'warning');
                            window._showedToast = true;
                        @elseif($totalJourney - $visitedJourneys <= 0)
                            showToast('You have completed assigned journeys.', 'success');
                            window._showedToast = true;
                        @endif
                    });
                </script>
            </div>
            @endif
            <div class="mt-4">
                @if(isset($journeyLimitReached) && $journeyLimitReached)
                <div class="p-3 bg-red-100 border border-red-300 rounded text-sm text-red-700 font-semibold">
                    {{ $journeyLimitMessage ?? 'You have reached the maximum number of journeys for your current level. Please upgrade your level to continue.' }}
                </div>
                @elseif(isset($journeyLocked) && $journeyLocked)
                <div class="p-3 bg-yellow-100 border border-yellow-300 rounded text-sm text-orange-700 font-semibold">
                    You must review assigned products before continuing.
                </div>
                @else
                <div class="p-3 bg-green-100 border border-green-300 rounded text-sm text-green-700 font-semibold">
                    <!-- Not locked. You can continue journeys. -->
                </div>
                @endif
            </div>
            @if(isset($journeyLocked) && $journeyLocked && isset($pendingLockedProducts) &&
            $pendingLockedProducts->count() > 0)
            <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="font-semibold text-orange-700 mb-2">You have the following locked product(s) to complete
                    before continuing your journey:</div>
                <ul class="space-y-2">
                    @foreach($pendingLockedProducts as $lockedProduct)
                    <li class="flex items-center justify-between bg-white border border-yellow-100 rounded p-3">
                        <div>
                            <span class="font-bold text-gray-800">{{ $lockedProduct->name }}</span>
                            <span class="ml-2 text-sm text-gray-600">USDT
                                {{ number_format($lockedProduct->price, 2) }}</span>
                        </div>
                        <a href="{{ route('user.customer.start_locked_product', $lockedProduct->id) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-semibold transition-colors">
                            Start Locked Journey
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <!-- Start Journey Button -->
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <!-- Negative Balance Error Message -->
            @if(isset($hasNegativeBalance) && $hasNegativeBalance)
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-red-700 font-medium">{{ $negativeBalanceMessage }}</span>
                </div>
            </div>
            @endif
            @if(isset($journeyLimitReached) && $journeyLimitReached)
            <button
                class="inline-block w-full bg-gray-300 text-gray-500 px-8 py-4 rounded-lg font-bold text-lg cursor-not-allowed"
                disabled>
                Start Journey
            </button>
            @elseif(isset($currentJourney) && $currentJourney && !$hasPendingSubmissions && !$hasNegativeBalance)
            <a href="{{ route('user.customer.write_review') }}"
                class="inline-block w-full bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-bold text-lg transition-all duration-200">
                Start Journey
            </a>
            @else
            <button onclick="showJourneyStatusToast()"
                class="inline-block w-full bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-bold text-lg transition-all duration-200">
                Start Journey
            </button>
            @endif
        </div>

        <!-- Explore Hotels Section -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-6 text-gray-800">Explore Hotels</h2>
            <div class="space-y-4">
                <!-- Hotel Europe -->
                <div
                    class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                    <img src="/images/home/style-1.jpg" alt="Hotel Europe" class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-blue-600 hover:text-blue-800">Hotel Europe</h3>
                        <p class="text-sm text-gray-600 mt-1">Finding a romantic hotel in Singapore is not difficult at
                            all. Shangri-La Hotel is a great choice for travelers.</p>
                    </div>
                </div>

                <!-- Crowne Plaza Dubai -->
                <div
                    class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                    <img src="/images/home/style-2.jpg" alt="Crowne Plaza Dubai"
                        class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-blue-600 hover:text-blue-800">Crowne Plaza Dubai, an IHG Hotel
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">Crowne Plaza Dubai is ideally located on Sheikh Zayed
                            Road, directly opposite the Dubai International Convention Centre.</p>
                    </div>
                </div>

                <!-- Grand Resort -->
                <div
                    class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                    <img src="/images/home/style-3.jpg" alt="Grand Resort" class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-blue-600 hover:text-blue-800">Grand Resort & Spa</h3>
                        <p class="text-sm text-gray-600 mt-1">Experience luxury and comfort at our premium resort with
                            world-class amenities and stunning views.</p>
                    </div>
                </div>

                <!-- Luxury Beach Resort -->
                <div
                    class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                    <img src="/images/home/style-4.jpg" alt="Luxury Beach Resort"
                        class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-blue-600 hover:text-blue-800">Luxury Beach Resort</h3>
                        <p class="text-sm text-gray-600 mt-1">Escape to paradise with our beachfront luxury resort
                            featuring pristine beaches and exceptional service.</p>
                    </div>
                </div>

                <!-- Mountain View Lodge -->
                <div
                    class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                    <img src="/images/home/style-5.jpg" alt="Mountain View Lodge"
                        class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-blue-600 hover:text-blue-800">Mountain View Lodge</h3>
                        <p class="text-sm text-gray-600 mt-1">Discover breathtaking mountain views and outdoor
                            adventures at our cozy mountain lodge retreat.</p>
                    </div>
                </div>

                <!-- City Center Hotel -->
                <div
                    class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                    <img src="/images/home/style-6.jpg" alt="City Center Hotel"
                        class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-blue-600 hover:text-blue-800">City Center Hotel</h3>
                        <p class="text-sm text-gray-600 mt-1">Stay in the heart of the city with easy access to
                            shopping, dining, and entertainment venues.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

<script>
// Show session messages as toasts
function showToast(message, type = 'info') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    let bgColor, textColor, icon;
    switch (type) {
        case 'success':
            bgColor = 'bg-green-500';
            textColor = 'text-white';
            icon = '✓';
            break;
        case 'error':
            bgColor = 'bg-red-500';
            textColor = 'text-white';
            icon = '✗';
            break;
        case 'warning':
            bgColor = 'bg-yellow-500';
            textColor = 'text-white';
            icon = '⚠';
            break;
        default:
            bgColor = 'bg-blue-500';
            textColor = 'text-white';
            icon = 'ℹ';
    }

    toast.className =
        `${bgColor} ${textColor} px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2 transform transition-all duration-300 translate-x-full opacity-0`;
    toast.innerHTML = `
        <span class="font-bold">${icon}</span>
        <span>${message}</span>
        <button onclick="this.parentElement.remove()" class="ml-4 hover:bg-white hover:bg-opacity-20 rounded p-1">
            <span class="text-sm">×</span>
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
        }, 300);
    }, 5000);
}

function showJourneyStatusToast() {
    @if(isset($journeyLocked) && $journeyLocked)
    showToast('You must review assigned products before continuing.', 'warning');
    @elseif(!isset($currentJourney) || !$currentJourney)
    showToast(
        'No available journey at the moment. Please check your history to complete pending journeys or wait for new products.',
        'warning');
    @endif
}
</script>
@endsection