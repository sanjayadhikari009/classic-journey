@php($active = 'reviews')
@extends('layouts.app')

@section('title', 'Withdraw')

@section('content')
<section class="h-[50vh] bg-cover bg-no-repeat bg-center relative" style="background-image:url('/images/hero/withdrawal.jpg');">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative flex items-center justify-center w-full h-full">
        <div class="text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 drop-shadow-2xl">Withdrawal</h1>
            <div class="w-24 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</section>
<section class="py-[65px]">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto space-y-8 flex justify-center">

        <div class="w-full lg:w-2/3 bg-white rounded-lg shadow p-6 space-y-5">
            <!-- Icon + Title -->
            <div class="text-center">
                <!-- Replace the broken icon with a valid one or image -->
                <img alt="Travelstride Logo" class="h-[40px] w-full object-contain mb-4"
                    src="/images/travel_stride.svg" /></a>
                <h2 class="text-xl font-semibold text-gray-800">USDT Withdraw</h2>
                <p class="text-sm text-gray-500">Withdrawal will be transferred to USDT Address</p>
            </div>

            <!-- Chain Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Chain Type</label>
                <select class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    <option>Select type</option>
                    <option>ERC-20</option>
                    <option>TRC-20</option>
                    <option>BEP-20</option>
                </select>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <input type="text" placeholder="Enter your Address"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" />
            </div>

            <!-- Redemption Amount -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Redemption Amount</label>
                <input type="number" placeholder="Enter Amount"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" />
            </div>

            <!-- Redemption Pin -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Redemption Pin</label>
                <input type="password" placeholder="Enter Redemption Pin"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" />
            </div>

            <!-- Button -->
            <button class="w-full bg-primary text-white py-2 rounded-md font-semibold hover:bg-primary/50 transition">
                REDEMPTION
            </button>
        </div>
    </div>
</section>


@endsection