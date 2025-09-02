@php($active = 'terms')
@extends('layouts.app')

@section('title', 'Terms')
@section('content')
    <!-- Banner with overlay text -->
    <div class="relative w-full h-64 md:h-80 lg:h-96 mb-8">
        <img src="/images/hero/activity.jpg" alt="Terms Banner" class="w-full h-full object-cover object-center rounded-b-2xl">
        <!-- Simple dark overlay -->
        <div class="absolute inset-0 bg-black/50"></div>
        
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-2xl mb-4">Terms & Conditions</h1>
                <div class="w-40 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
            </div>
        </div>
    </div>
<!-- Main content section -->
<div class="max-w-4xl mx-auto px-4 pb-12">
    <h2 class="text-2xl md:text-3xl font-bold mb-4">Term and Condition</h2>
    <ul class="list-disc pl-6 text-lg text-gray-700 space-y-3">
        <li>Only one account can be registered per phone number. Please do not disclose your account password and
            withdrawal password to others.</li>
        <li>Our platform will not be held responsible for any losses caused. All journeys are randomly allocated by the
            system and once the reservation deal has been accepted and allocated by the system, any changes,
            cancellations or abandonment of reservation are strictly not allowed.</li>
        <li>There will be total 40 journeys. Legal action will be taken in the event of inappropriate use of the
            account. Kindly confirm the deposit address with customer service before transferring funds.</li>
        <li>If the deposit is made to the wrong deposit address, the platform will not take any responsibility. Each and
            every member need to pay for the taxes according to country rules and regulations.</li>
        <li>Please do not re-bind the same wallet address to different account to reserve bookings to avoid your
            earnings being frozen. According to the platform rules and regulations, member only allowed to use register
            wallet address to recharge, if use others wallet address need to inform platform live agent.</li>
    </ul>
</div>
@endsection