@php($active = 'team')
@extends('layouts.app')

@section('title', 'Team')
@section('content')
<!-- Banner with overlay text -->
<div class="relative w-full h-64 md:h-80 lg:h-96 mb-8">
    <img src="/images/hero/activity.jpg" alt="Teams Banner"
        class="w-full h-full object-cover object-center rounded-b-2xl">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-2xl mb-4">Teams</h1>
            <div class="w-32 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</div>
<!-- Main content section -->
<div class="max-w-4xl mx-auto px-4 pb-12">
    <h2 class="text-3xl font-bold mb-4">Teams</h2>
    <p class="mb-4 text-lg text-gray-700">
        Platform users can invite others to become agents of the platform through the invitation code and become your
        downline. As the upline, you can take a percentage of your downline's reward. The reward earned by the upline
        will be directly returned to the upline's platform account, or team report.
    </p>
    <p class="text-lg text-gray-700">
        As a member, you're required to complete the initial 5-days online training with the assigned trainer/mentor to
        help you achieve the best out of this platform. Additionally, Live Support is provided to help you with your
        transactions. Should you have any questions, please refer to our FAQs section.
    </p>
</div>
@endsection