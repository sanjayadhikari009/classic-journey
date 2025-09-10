@extends('layouts.app')
@section('content')
<!-- Banner with overlay text -->
<div class="relative w-full h-64 md:h-80 lg:h-96 mb-8">
    <img src="/images/hero/activity.jpg" alt="About Us Banner"
        class="w-full h-full object-cover object-center rounded-b-2xl">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-2xl mb-4">About Us</h1>
            <div class="w-32 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</div>
<!-- Main content section -->
<div class="max-w-6xl mx-auto px-4 pb-12 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
    <div>
        <h2 class="text-2xl md:text-3xl font-bold mb-4">About us?</h2>
        <p class="mb-4 text-lg text-gray-700">
            Classic Journey is an intuitive platform providing support to global tourism and an opportunity to work from
            home enthusiasts.
        </p>
        <p class="mb-2 text-lg text-gray-700 font-semibold">What do we do:</p>
        <p class="mb-4 text-lg text-gray-700">
            Classic Journey brings individuals to help tourism and travel websites get more positive ratings and earn a
            handsome living while working from home or on the go.
        </p>
        <p class="mb-2 text-lg text-gray-700 font-semibold">How does it work:</p>
        <p class="text-lg text-gray-700">
            We choose our best trainers to help you understand the process towards a successful career from the comfort
            of your home. Working with us you're helping the travel and tourism merchants to get more positive ratings
            with in return help those merchants to get more sales. Our partner merchants share a portion of their
            revenue to our platform members helping them to make a living of this part-time work from home
            opportunities.
        </p>
    </div>
    <div class="flex justify-center items-center">
        <!-- Placeholder for video or image -->
        <img src="/images/hero/activity.jpg" alt="Who is TourRadar"
            class="rounded-xl shadow-lg w-full max-w-xs md:max-w-sm">
        <!-- You can replace the above <img> with an <iframe> for a video if needed -->
    </div>
</div>
@endsection