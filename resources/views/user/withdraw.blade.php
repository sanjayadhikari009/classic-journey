@extends('layouts.app')

@section('title', 'Withdraw')

@section('content')
<div class="relative w-full h-64 md:h-80 lg:h-96 mb-8">
    <img src="/images/hero/withdrawal.jpg" alt="Teams Banner"
        class="w-full h-full object-cover object-center rounded-b-2xl">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-2xl mb-4">Withdraw</h1>
            <div class="w-32 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</div>
<div class="space-y-8 max-w-7xl px-2 sm:px-6 md:px-8 mx-auto">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Withdraw</h1>
            <p class="text-gray-600">Request a withdrawal of your available balance.</p>
        </div>
    </div>

    <!-- Commission (matching sidebar) -->
    <!-- <div class="bg-white rounded-lg p-6 text-center shadow mb-6 border border-blue-200">
        <div class="text-xs text-blue-700 font-semibold">Commission</div>
        <div class="font-bold text-2xl text-gray-900">
            ${{ number_format((float)($sidebarCommission ?? 0), 2) }}
        </div>
    </div> -->
     <!-- Withdrawable Earnings -->
     <div class="bg-yellow-500 rounded-lg p-8 text-white mb-6">
        <h2 class="text-2xl font-bold mb-4">💰 Withdrawal Information</h2>
        <p class="text-lg">Minimum withdrawal amount: <strong>USDT 50.00</strong></p>
        <p class="text-lg">Processing time: <strong>24-48 hours</strong></p>
    </div>

    <!-- Balance -->
    <div class="bg-green-500 rounded-lg p-8 text-white mb-6">
        <h2 class="text-2xl font-bold mb-4">✅ Current Balance</h2>
        <p class="text-4xl font-bold">USDT {{ number_format(auth()->user()->balance, 2) }}</p>
    </div>

    <!-- Withdraw Form -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Withdraw Funds</h2>
        <form method="POST" action="{{ route('user.withdraw.submit') }}" class="space-y-6">
            @csrf
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount (USDT)</label>
                @php
                $minWithdraw = 1;
                $maxWithdraw = $withdrawableEarnings ?? 0;
                @endphp
                <input type="number" id="amount" name="amount" class="form-input" min="{{ $minWithdraw }}"
                    max="{{ $maxWithdraw }}" @if($maxWithdraw < $minWithdraw) disabled @endif required>
                @if($maxWithdraw < $minWithdraw) <div class="text-red-500 text-sm mt-2">
                    You have no withdrawable earnings from completed journeys.
            </div>
            @endif
    </div>
    <div>
        <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2">Payment Method</label>
        <select id="payment_method" name="payment_method" required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">Select Method</option>
            <option value="bank">Bank Transfer</option>
            <option value="paypal">PayPal</option>
            <option value="crypto">Crypto</option>
        </select>
    </div>
    <div>
        <label for="chain_type" class="block text-sm font-medium text-gray-700 mb-2">Chain Type</label>
        <select id="chain_type" name="chain_type" required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">Select Chain</option>
            <option value="TRC20">TRC 20</option>
            <option value="ERC20">ERC 20</option>
        </select>
    </div>
    <div>
        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter your Address"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            required>
    </div>
    <div>
        <label for="redemption_amount" class="block text-sm font-medium text-gray-700 mb-2">Redemption Amount</label>
        <input type="number" id="redemption_amount" name="redemption_amount" placeholder="Enter Amount"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            min="1" step="0.01" required>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="btn btn-primary" @if($maxWithdraw < $minWithdraw) disabled @endif>Withdraw</button>
    </div>
    </form>
</div>

<!-- Withdraw History -->
<div class="bg-white rounded-lg shadow-md p-8">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Withdrawal History</h2>
    @php($withdrawals = auth()->user()->withdrawals()->latest()->take(10)->get())
    @if($withdrawals->count() > 0)
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Payment Method</th>
                </tr>
            </thead>
            <tbody>
                @foreach($withdrawals as $withdrawal)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">${{ number_format($withdrawal->amount, 2) }}</td>
                    <td class="px-4 py-2">
                        <span
                            class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $withdrawal->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($withdrawal->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ $withdrawal->created_at->format('M d, Y h:i A') }}</td>
                    <td class="px-4 py-2">{{ $withdrawal->payment_method ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-gray-500">Your recent withdrawals will appear here.</p>
    @endif
</div>
</div>
@endsection