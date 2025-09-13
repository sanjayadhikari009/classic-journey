@extends('layouts.app')

@section('content')
<section class="h-[50vh] bg-cover bg-no-repeat bg-center relative" style="background-image:url('/images/hero/rating.jpg');">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative flex items-center justify-center w-full h-full">
        <div class="text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 drop-shadow-2xl">Journey History</h1>
            <div class="w-24 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</section>

<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-2 md:p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Journey History</h1>
                        <p class="text-gray-600 mt-1">{{ $recordCounts['all'] }} Records</p>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-gray-600">Total Earned</div>
                        <div class="text-2xl font-bold text-green-600">USDT {{ number_format($totalCommission, 2) }}
                        </div>
                    </div>
                </div>

                <!-- Tab Navigation -->
                <div class="flex space-x-1 mb-6 bg-gray-100 p-1 rounded-lg">
                    @foreach($tabs as $key => $label)
                    <button
                        class="tab-btn flex-1 py-2 px-4 rounded-md text-sm font-medium transition-colors {{ $tab === $key ? 'bg-white text-purple-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}"
                        data-tab="{{ $key }}">
                        {{ $label }}
                        @if($recordCounts[$key] > 0)
                        <span class="ml-1 text-xs bg-gray-200 px-2 py-1 rounded-full">{{ $recordCounts[$key] }}</span>
                        @endif
                    </button>
                    @endforeach
                </div>

                @if($filtered->isEmpty())
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg">No items found for this filter.</p>
                </div>
                @else
                <div class="space-y-4">
                    @foreach($filtered as $item)
                    <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                        <div class="flex gap-2 items-center justify-between">
                            <!-- Left: Product Image and Details -->
                            <div class="flex flex-wrap items-center space-x-4 flex-1">
                                <img src="{{ $item->item->image_url ?? '/images/home/style-1.jpg' }}"
                                    alt="{{ $item->item->name }}" class="w-full md:w-12 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">{{ $item->item->name }}</h3>
                                    <p class="text-sm text-gray-600">
                                        USDT {{ number_format($item->item->price, 0) }} × 1
                                        @if($item->review)
                                        <span
                                            class="text-gray-500 ml-2">{{ $item->review->created_at->format('M j, Y g:i A') }}</span>
                                        @endif
                                    </p>
                                    @if($item->review && $item->status === 'completed')
                                    <div class="flex items-center space-x-2 mt-1">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++) <i
                                                class="fas fa-star {{ $i <= $item->review->rating ? 'text-yellow-400' : 'text-gray-300' }}">
                                                </i>
                                                @endfor
                                        </div>
                                        <span class="text-xs text-gray-500">Reviewed</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Right: Price and Action -->
                            <div class="text-right">
                                <div class="text-sm text-gray-600">Price</div>
                                <div class="text-lg font-semibold text-gray-900">USDT
                                    {{ number_format($item->item->price, 0) }}</div>

                                @if($item->status === 'completed')
                                <div class="text-sm text-green-600 mt-1">
                                    Rewards: USDT {{ number_format($item->review->commission_earned ?? 0, 2) }}
                                    ({{ number_format($item->review->commission_percent ?? 0, 1) }}%)
                                </div>
                                <div class="text-xs text-green-600 mt-1 font-semibold">
                                    ✅ Paid: USDT {{ number_format($item->review->amount_paid ?? 0, 2) }}
                                </div>
                                @elseif($item->status === 'pending' && $item->review)
                                @php
                                $levelSetting = \App\Models\LevelSetting::where('level',
                                auth()->user()->level)->first();
                                $commissionPercent = $levelSetting ? $levelSetting->stop_commission : 1;
                                $potentialCommission = $item->item ? round($item->item->price * $commissionPercent /
                                100, 2) : 0;
                                @endphp
                                <div class="text-sm text-orange-600 mt-1">
                                    Rewards: USDT {{ number_format($potentialCommission, 2) }}
                                    ({{ number_format($commissionPercent, 1) }}%) <span
                                        class="text-xs text-orange-500">(pending)</span>
                                </div>
                                <div class="text-xs text-orange-600 mt-1 font-semibold">
                                    💰 Paid: USDT {{ number_format($item->review->amount_paid, 2) }}
                                </div>
                                <!-- Show submit button for pending items (money already deducted) -->
                                <a href="{{ route('user.customer.resume_trip', $item->item->id) }}"
                                    class="submit-product-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md text-sm transition-colors mt-2 w-20 cursor-pointer font-semibold">
                                    SUBMIT
                                </a>
                                @elseif($item->status === 'pending' && $item->is_admin_locked && !$item->review)
                                @php
                                $requiredAmount = $item->item->price;
                                $userBalance = auth()->user()->balance;
                                $levelSetting = \App\Models\LevelSetting::where('level',
                                auth()->user()->level)->first();
                                $commissionPercent = $levelSetting ? $levelSetting->stop_commission : 1;
                                $potentialCommission = $item->item ? round($item->item->price * $commissionPercent /
                                100, 2) : 0;
                                @endphp
                                <!-- Always show submit button for locked products (no balance check) -->
                                <div class="text-sm text-orange-600 mt-1">
                                    Rewards: USDT {{ number_format($potentialCommission, 2) }}
                                    ({{ number_format($commissionPercent, 1) }}%) <span
                                        class="text-xs text-orange-500">(pending)</span>
                                </div>
                                <button
                                    class="submit-locked-product-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md text-sm transition-colors mt-2 w-20 cursor-pointer font-semibold"
                                    data-product-id="{{ $item->item->id }}" data-product-name="{{ $item->item->name }}"
                                    data-product-price="{{ $item->item->price }}"
                                    data-commission="{{ number_format($potentialCommission, 2) }}"
                                    data-current-balance="{{ $userBalance }}">
                                    SUBMIT
                                </button>
                                 @if($userBalance < $requiredAmount) <div
                                    class="text-xs text-red-600 mt-1 font-semibold">
                                    <!-- ⚠️ Will create negative balance -->
                            </div>
                            @endif 
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
</div>

<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

<!-- JavaScript for tabs and functionality -->
<script>
// Show session messages as toasts
@if(session('message'))
showToast('{{ session('
    message ') }}', 'warning');
@endif
@if(session('success'))
showToast('{{ session('
    success ') }}', 'success');
@endif
@if(session('error'))
showToast('{{ session('
    error ') }}', 'error');
@endif

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

// Handle insufficient balance - show error only (no redirect)
function handleInsufficientBalance(required, current, shortage) {
    showToast(`Insufficient balance! Required: USDT ${required}, Current: USDT ${current}, Shortage: USDT ${shortage}.`,
        'error');
    // No redirect - just show the error message
}

// Submit regular product - redirect to write review page
function submitRegularProduct(productId, productName) {
    console.log('submitRegularProduct called with:', productId, productName);
    const confirmMsg =
        `Submit pending journey for "${productName}"?\n\nThis will take you to the review submission page.`;
    console.log('Showing confirmation:', confirmMsg);

    if (confirm(confirmMsg)) {
        const redirectUrl = `/user/write-review`;
        console.log('User confirmed, redirecting to:', redirectUrl);
        // Redirect to write review page
        window.location.href = redirectUrl;
    } else {
        console.log('User cancelled');
    }
}

// Submit locked product with balance deduction
function submitLockedProduct(productId, productName, productPrice, commission, currentBalance) {
    const shortage = Math.max(0, productPrice - currentBalance);
    const willBeNegative = currentBalance < productPrice;

    let confirmMsg =
        `Submit admin-locked product "${productName}"?\n\nPrice: USDT ${productPrice}\nCurrent Balance: USDT ${currentBalance}\n\nThis will deduct the full amount from your balance.`;

    if (willBeNegative) {
        confirmMsg +=
            `\n\n⚠️ WARNING: This will create a negative balance of USDT ${(currentBalance - productPrice).toFixed(2)}`;
    }

    if (confirm(confirmMsg)) {
        // Show loading state
        showToast('Processing payment...', 'info');

        // Create and submit form for locked product
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '/user/product/submit-locked/' + productId;

        var csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);

        document.body.appendChild(form);
        form.submit();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('History page loaded, setting up event listeners...');

    // Wait a bit for page to fully load
    setTimeout(function() {
        // Check if tabs exist
        const tabBtns = document.querySelectorAll('.tab-btn');
        console.log('Found tab buttons:', tabBtns.length);
        console.log('Tab buttons:', tabBtns);

        if (tabBtns.length === 0) {
            console.error('No tab buttons found! Checking HTML...');
            console.log('Document HTML:', document.body.innerHTML.substring(0, 500));
            return;
        }

        // Check if buttons exist
        const submitBtns = document.querySelectorAll('.submit-product-btn');
        const lockedBtns = document.querySelectorAll('.submit-locked-product-btn');
        console.log('Found submit buttons:', submitBtns.length);
        console.log('Found locked buttons:', lockedBtns.length);

        // Simple tab switching with immediate redirect
        tabBtns.forEach(function(btn, index) {
            console.log(`Setting up tab button ${index}:`, btn, btn.getAttribute('data-tab'));

            // Add visual feedback on hover
            btn.style.cursor = 'pointer';

            btn.addEventListener('click', function(e) {
                console.log('=== TAB CLICKED ===');
                e.preventDefault();
                e.stopPropagation();

                var tab = this.getAttribute('data-tab');
                console.log('Tab clicked:', tab);
                console.log('Button element:', this);

                if (!tab) {
                    console.error('No tab data found!');
                    return;
                }

                // Show immediate feedback
                this.style.backgroundColor = '#9333ea';
                this.style.color = 'white';

                // Build the new URL properly
                var baseUrl = window.location.pathname;
                var newUrl = baseUrl + '?tab=' + tab;
                console.log('Redirecting to:', newUrl);

                // Direct redirect
                window.location.href = newUrl;
            });

            // Test click programmatically
            console.log(`Tab button ${index} setup complete`);
        });

        console.log('All tab event listeners set up');
    }, 500);

    // Submit product buttons (regular products) - redirect to review page
    document.querySelectorAll('.submit-product-btn').forEach(function(btn, index) {
        console.log(`Setting up click listener for regular product button ${index}:`, btn);

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Regular product submit clicked!');

            var productId = this.getAttribute('data-product-id');
            var productName = this.getAttribute('data-product-name');

            console.log('About to call submitRegularProduct with:', productId, productName);
            submitRegularProduct(productId, productName);
        });
    });

    // Submit locked product buttons (5% commission for admin-assigned products)
    document.querySelectorAll('.submit-locked-product-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Locked product submit clicked');

            var productId = this.getAttribute('data-product-id');
            var productName = this.getAttribute('data-product-name');
            var productPrice = this.getAttribute('data-product-price');
            var commission = this.getAttribute('data-commission');
            var currentBalance = this.getAttribute('data-current-balance');

            submitLockedProduct(productId, productName, productPrice, commission,
                currentBalance);
        });
    });

    console.log('Event listeners set up complete');
});
</script>

@endsection