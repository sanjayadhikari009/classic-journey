@extends('layouts.app')

@section('title', 'Recharge')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Recharge</h1>
            <p class="text-gray-600">Add funds to your account to start your journey and earn rewards.</p>
        </div>
    </div>

    <!-- Balance & Quick Recharge -->
    <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg p-8 text-white mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <div class="text-lg">Account Balance</div>
                <div class="text-3xl font-bold mt-2">${{ number_format($user->balance ?? 0, 2) }}</div>
                <div class="mt-2 text-sm">
                    <span class="mr-4">Total Recharged: <span class="font-semibold">${{ number_format($totalRecharged, 2) }}</span></span>
                    <span class="mr-4">Total Deducted: <span class="font-semibold">${{ number_format($totalDeducted, 2) }}</span></span>
                    <span class="mr-4">Total Commission: <span class="font-semibold">${{ number_format($totalCommission, 2) }}</span></span>
                    <span>Total Balance: <span class="font-semibold">${{ number_format($totalBalance, 2) }}</span></span>
                </div>
            </div>
            <div class="flex gap-4 mt-6 md:mt-0">
                <button class="bg-white text-purple-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-purple-100 transition">$10</button>
                <button class="bg-white text-purple-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-purple-100 transition">$50</button>
                <button class="bg-white text-purple-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-purple-100 transition">$100</button>
            </div>
        </div>
    </div>

    <!-- Recharge Form -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Recharge Amount</h2>
        <form method="POST" action="{{ route('user.recharge.submit') }}" class="space-y-6">
            @csrf
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount (USD)</label>
                <input type="number" id="amount" name="amount" min="1" step="0.01" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">Recharge</button>
            </div>
        </form>
    </div>

    <!-- Recharge History Placeholder -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Recharge History</h2>
        <p class="text-gray-500">Your recent recharges will appear here.</p>
    </div>
</div>
@endsection 