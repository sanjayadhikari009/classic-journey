@extends('admin.layouts.app')

@section('title', 'Member Details')

@section('content')
{{-- Show success and error messages --}}
@if(session('success'))
    <div class="w-full bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 mt-8">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="w-full bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 mt-8">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow p-8 mb-8">
    <h1 class="text-3xl font-extrabold mb-6 text-gray-800 flex items-center gap-3">
        <i class="fas fa-user-circle text-indigo-400 text-3xl"></i>
        Member Details
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-3 mb-6">
        <div><span class="text-gray-400 text-sm">ID</span><div class="font-semibold text-gray-800">{{ $member->id }}</div></div>
        <div><span class="text-gray-400 text-sm">Username</span><div class="font-semibold text-gray-800">{{ $member->username }}</div></div>
        <div><span class="text-gray-400 text-sm">Mobile Number</span><div class="font-semibold text-gray-800">{{ $member->mobile_number }}</div></div>
        <div><span class="text-gray-400 text-sm">Balance</span><div class="font-semibold text-green-600">${{ number_format($member->balance, 2) }}</div></div>
        @php
            $levelSetting = \App\Models\LevelSetting::where('level', $member->level)->first();
            $maxJourney = $levelSetting ? $levelSetting->number_of_journey : 40;
            $currentJourney = $member->journey ?? 0;
        @endphp
        <div><span class="text-gray-400 text-sm">Journey</span><div class="font-semibold text-gray-800">{{ $currentJourney }}</div></div>
        <div><span class="text-gray-400 text-sm">Maximum Journey</span><div class="font-semibold text-gray-800">{{ $maxJourney }}</div></div>
        <div><span class="text-gray-400 text-sm">Level</span><div class="font-semibold text-gray-800">{{ $member->level }}</div></div>
        <div><span class="text-gray-400 text-sm">Commission</span><div class="font-semibold text-indigo-600">${{ number_format($member->commission, 2) }}</div></div>
        <div class="md:col-span-2 border-t pt-3 mt-3"></div>
        <div><span class="text-gray-400 text-sm">Referral By</span><div class="font-semibold text-gray-800">
            @if($member->referral_by && $referral = $referrals->firstWhere('id', $member->referral_by))
                {{ $referral->referral_code }} - {{ $referral->username }}
            @else
                —
            @endif
        </div></div>
        <div><span class="text-gray-400 text-sm">Referral Code</span><div class="font-semibold text-gray-800">{{ $member->referral_code ?: '—' }}</div></div>
        <div><span class="text-gray-400 text-sm">Last Login At</span><div class="font-semibold text-gray-800">{{ $member->last_login_at ?: '—' }}</div></div>
        <div class="md:col-span-2 border-t pt-3 mt-3"></div>
        <div><span class="text-gray-400 text-sm">Created At</span><div class="font-semibold text-gray-800">{{ $member->created_at }}</div></div>
        <div><span class="text-gray-400 text-sm">Updated At</span><div class="font-semibold text-gray-800">{{ $member->updated_at }}</div></div>
    </div>
    <a href="{{ route('admin.admin.members.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow transition">Back to Members List</a>
</div>

<!-- Journey Product Locking Section - Enhanced Design -->
<div class="w-full bg-white rounded-2xl shadow-lg p-4 md:p-8 mt-8">
    <h2 class="text-xl font-bold mb-6">Journey Management & Product Assignment</h2>
    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div><span class="text-gray-600">Current Journey:</span> <span class="font-semibold">{{ $member->journey ?? 0 }}</span></div>
            <div><span class="text-gray-600">Level:</span> <span class="font-semibold">{{ $member->level ?? 1 }}</span></div>
            <div><span class="text-gray-600">Balance:</span> <span class="font-semibold text-green-600">${{ number_format($member->balance, 2) }}</span></div>
        </div>
    </div>

    {{-- Validation message for lock and pending reviews --}}
    @if(isset($lockedIds) && $member->journey_lock_at && ($member->journey + 1) >= $member->journey_lock_at && count($lockedIds) > 0)
        <div class="text-red-500 font-semibold mb-4">
            You are currently locked at journey {{ $member->journey_lock_at }}. Please complete reviews of locked products before continuing.
        </div>
    @endif

    <!-- Journey Lock Settings -->
    <div class="mb-6 p-4 bg-orange-50 border border-orange-200 rounded-lg">
        <h3 class="text-lg font-semibold mb-3 text-orange-800">🔒 Journey Lock Settings</h3>
        <form method="POST" action="{{ route('admin.admin.members.updateJourneyLock', $member->id) }}" class="mb-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium mb-1">Lock at Journey Number</label>
                    <input type="number" name="journey_lock_at" min="1" max="{{ $maxJourney }}" 
                           value="{{ old('journey_lock_at', $member->journey_lock_at ?? '') }}" 
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" 
                           placeholder="e.g., 20 (leave blank for no lock)">
                </div>
                <div>
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-4 py-2 rounded-lg shadow transition">
                        Update Journey Lock
                    </button>
                </div>
            </div>
            <div class="mt-2 text-xs text-gray-600">
                <strong>How it works:</strong> If you set "4", user will be locked when they reach journey 4 and must complete assigned products below before continuing.
            </div>
        </form>
        
        @if($member->journey_lock_at)
            @if($member->journey + 1 >= $member->journey_lock_at)
                <div class="mt-2 p-2 bg-yellow-100 border border-yellow-300 rounded text-sm">
                    <strong>🔒 Locked at Journey {{ $member->journey_lock_at }}:</strong> User must review assigned products before continuing.
                </div>
            @else
                <div class="mt-2 p-2 bg-green-100 border border-green-300 rounded text-sm">
                    <!-- <strong>Not locked:</strong> User can continue journeys. -->
                </div>
            @endif
        @else
            <div class="mt-2 text-gray-500 text-sm">No journey lock set for this user.</div>
        @endif
    </div>
    
    <!-- Price Filter Section -->
    <form method="GET" action="{{ route('admin.admin.members.show', $member->id) }}" class="mb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div>
                <label class="block text-sm font-medium mb-1">Min Price</label>
                <input type="number" step="0.01" name="min_price" value="{{ request('min_price') }}" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       placeholder="enter Min Price">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Max Price</label>
                <input type="number" step="0.01" name="max_price" value="{{ request('max_price') }}" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       placeholder="enter Max Price">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Auto-Select Count (Optional)</label>
                <input type="number" id="lockCount" value="" placeholder="Enter number to auto-select first N products"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow transition">
                    Lookup
                </button>
            </div>
        </div>
    </form>

    <!-- Current Locked Products Section -->
    @if(isset($lockedIds) && count($lockedIds) > 0)
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Current Locked Products ({{ count($lockedIds) }})</h3>
            <span class="text-sm text-gray-600">Action</span>
        </div>
        <div class="space-y-3">
            @foreach($lockedIds as $lockedId)
                @php
                    $product = \App\Models\Product::find($lockedId);
                    $alreadyReviewed = in_array($lockedId, $alreadyReviewedProductIds ?? []);
                @endphp
                @if($product)
                <div class="bg-red-50 border border-red-200 rounded-lg px-4 py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3">
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-medium">ID: {{ $lockedId }}</span>
                                <span class="font-semibold text-gray-900">{{ $product->name }}</span>
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-medium">${{ number_format($product->price, 2) }}</span>
                                @if($alreadyReviewed)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700 ml-2">
                                        ✅ Already Reviewed
                                    </span>
                                @endif
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.users.journey.removeProducts', $member->id) }}" class="inline">
                            @csrf
                            <input type="hidden" name="product_ids[]" value="{{ $lockedId }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-semibold transition-colors" 
                                    onclick="return confirm('Remove {{ $product->name }} from locked list?')">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Product ID {{ $lockedId }} (Not Found)</span>
                        <form method="POST" action="{{ route('admin.users.journey.removeProducts', $member->id) }}" class="inline">
                            @csrf
                            <input type="hidden" name="product_ids[]" value="{{ $lockedId }}">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm font-semibold" 
                                    onclick="return confirm('Remove invalid product ID {{ $lockedId }}?')">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @else
    <div class="mb-8">
        <div class="bg-green-50 border border-green-200 rounded-lg px-4 py-3">
            <div class="flex items-center">
                <span class="text-green-600 font-medium">✅ No products currently locked for this user</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Product Selection and Lock Section -->
    <form method="POST" action="{{ route('admin.admin.members.updateLockedProducts', $member->id) }}" id="lockProductsForm">
        @csrf
        
        <div class="mb-4 flex gap-3">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded-lg shadow transition">
                Update Locked Products (<span id="selectedCount">0</span> selected)
            </button>
            <button type="button" id="clearAll" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded-lg shadow transition">
                Clear All Selections
            </button>
        </div>

        <!-- Products Table -->
        <div class="border border-gray-200 rounded-lg overflow-hidden">
            <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-700">Available Products ({{ $allProducts->count() }})</span>
                    <span class="text-xs text-gray-500">✓ Manually select specific products OR use auto-select field above</span>
                </div>
            </div>
            <div class="max-h-96 overflow-y-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 sticky top-0">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" id="selectAll" class="rounded">
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($allProducts as $index => $product)
                        @php
                            $isLocked = in_array($product->id, $lockedIds);
                            $isHighPrice = $product->price > 500;
                            $alreadyReviewed = in_array($product->id, $alreadyReviewedProductIds ?? []);
                        @endphp
                        <tr class="hover:bg-gray-50 {{ $isHighPrice ? 'bg-yellow-50' : '' }}">
                            <td class="px-4 py-3">
                                <input type="checkbox" name="locked_journeys[]" value="{{ $product->id }}" 
                                       class="product-checkbox rounded focus:ring-indigo-500"
                                       {{ $isLocked ? 'checked' : '' }}>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">{{ $product->id }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">
                                {{ $product->name }}
                                @if($alreadyReviewed)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700 ml-2">
                                        ✅ Already Reviewed
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold {{ $isHighPrice ? 'text-red-600' : 'text-gray-900' }}">
                                ${{ number_format($product->price, 2) }}
                            </td>
                            <td class="px-4 py-3">
                                @if($isLocked)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        🔒 Locked
                                    </span>
                                @elseif($isHighPrice)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        💰 High Price
                                    </span>
                                @elseif($alreadyReviewed)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700">
                                        ✅ Already Reviewed
                                    </span>
                                @else
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        ✅ Available
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>

<!-- Logic for Start Journey (ensure only allowed when not locked and all reviews done) -->
@php
    $canStartJourney = true;
    if ($member->journey_lock_at && ($member->journey + 1) >= $member->journey_lock_at && isset($lockedIds) && count($lockedIds) > 0) {
        $canStartJourney = false;
    }
@endphp

{{-- Example Start Journey Button (if present elsewhere, logic can be reused) --}}
{{-- 
<form method="POST" action="{{ route('admin.members.startJourney', $member->id) }}">
    @csrf
    <button type="submit" class="btn btn-primary" {{ !$canStartJourney ? 'disabled' : '' }}>
        Start Next Journey
    </button>
</form>
--}}

<!-- Reset Journey Section -->
<div class="w-full bg-white rounded-2xl shadow-lg p-4 md:p-8 mt-8">
    <h2 class="text-xl font-bold mb-6 text-red-600">Reset Journey Progress</h2>
    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">Warning: This action cannot be undone</h3>
                <div class="mt-2 text-sm text-red-700">
                    <p>Resetting journey progress will:</p>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li>Delete all product reviews for this user</li>
                        <li>Reset journey count to 0</li>
                        <li>Reset level to 1</li>
                        <li>Keep user balance and commission unchanged</li>
                        <li>Allow user to start journeys from the beginning</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <h4 class="font-semibold text-gray-700 mb-2">Current Progress:</h4>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span>Current Level:</span>
                    <span class="font-medium">{{ $member->level }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Journey Count:</span>
                    <span class="font-medium">{{ $member->journey }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Total Reviews:</span>
                    <span class="font-medium">{{ $member->reviews()->whereNotNull('product_id')->count() }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Commission Earned:</span>
                    <span class="font-medium">${{ number_format($member->commission ?? 0, 2) }}</span>
                </div>
            </div>
        </div>
        <div>
            <h4 class="font-semibold text-gray-700 mb-2">After Reset:</h4>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span>Level:</span>
                    <span class="font-medium text-blue-600">1</span>
                </div>
                <div class="flex justify-between">
                    <span>Journey Count:</span>
                    <span class="font-medium text-blue-600">0</span>
                </div>
                <div class="flex justify-between">
                    <span>Reviews:</span>
                    <span class="font-medium text-blue-600">0</span>
                </div>
                <div class="flex justify-between">
                    <span>Commission:</span>
                    <span class="font-medium text-green-600">${{ number_format($member->commission ?? 0, 2) }} (Unchanged)</span>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.members.resetJourney', $member->id) }}" class="text-center">
        @csrf
        <button type="submit" 
                class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-3 rounded-lg shadow transition-colors"
                onclick="return confirm('Are you absolutely sure you want to reset this user\'s journey progress? This action cannot be undone and will delete all their product reviews.')">
            🔄 Reset Journey Progress
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select All functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const productCheckboxes = document.querySelectorAll('.product-checkbox');
    
    selectAllCheckbox.addEventListener('change', function() {
        productCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
    
    // Clear All button functionality
    const clearAllBtn = document.getElementById('clearAll');
    clearAllBtn.addEventListener('click', function() {
        productCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
        selectAllCheckbox.checked = false;
        selectAllCheckbox.indeterminate = false;
        document.getElementById('lockCount').value = '';
        updateSelectAllState(); // Update counter
    });
    
    // Auto-select based on lock count (only when admin enters a number)
    const lockCountInput = document.getElementById('lockCount');
    lockCountInput.addEventListener('input', function() {
        const count = parseInt(this.value);
        if (count > 0) {
            // Clear all selections first
            productCheckboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
            // Select the first 'count' products
            productCheckboxes.forEach((checkbox, index) => {
                if (index < count) {
                    checkbox.checked = true;
                }
            });
            updateSelectAllState();
        }
    });
    
    // Update select all state when individual checkboxes change
    productCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectAllState);
    });
    
    function updateSelectAllState() {
        const checkedCount = document.querySelectorAll('.product-checkbox:checked').length;
        const totalCount = productCheckboxes.length;
        
        selectAllCheckbox.checked = checkedCount === totalCount;
        selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < totalCount;
        
        // Update selected count display
        document.getElementById('selectedCount').textContent = checkedCount;
    }
    
    // Initialize select all state
    updateSelectAllState();
});
</script>
@endsection 