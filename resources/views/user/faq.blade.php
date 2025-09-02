@extends('layouts.app')
@section('content')
    <!-- Banner with overlay text -->
    <div class="relative w-full h-64 md:h-80 lg:h-96 mb-8">
        <img src="/images/hero/activity.jpg" alt="FAQ Banner" class="w-full h-full object-cover object-center rounded-b-2xl">
        <!-- Simple dark overlay -->
        <div class="absolute inset-0 bg-black/50"></div>
        
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow-2xl mb-4">Frequently asked questions (FAQ)</h1>
                <div class="w-32 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
            </div>
        </div>
    </div>
    <!-- Main content section -->
    <div class="max-w-4xl mx-auto px-4 pb-12">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Frequently asked questions (FAQ)</h2>
        <div class="space-y-8 text-lg text-gray-700">
            <div>
                <p class="font-semibold mb-2">🔹1. Recharge process</p>
                <p>To recharge, you only required to recharge within the home page. The followings steps is the recharge process:</p>
                <ol class="list-decimal pl-6 mb-2">
                    <li>Click on the "Recharge" button</li>
                    <li>Fill in the corresponding amount to be transferred and click on the "Recharge" button to redirect to the online recharge customer service to assist in remittance recharge.</li>
                    <li>After remitting the money according to the account provided by the platform's customer service, make sure to submit a screenshot of the successful transfer to the account.</li>
                </ol>
                <p>In order to ensure that the recharge is made quickly, please make sure that the name of the person and the amount you are transferring are the same as the one being provided. If you encounter any unsolvable problems during the recharge process, please contact the customer service recharge department in time. Due to the large amount of information, please make sure to confirm the account card number of this platform carefully before recharging. The platform occasionally changes the account number. If you have any questions, please click the platform online customer service for consulting.</p>
            </div>
            <div>
                <p class="font-semibold mb-2">🔹2. Reservation</p>
                <p>After completing your personal information. After you recharged your account, you may start reservation, click "Deal Now" to redirect to the relevant page to "Booking Now". Patiently wait for the system to book an order, submit the order once submission pop up to complete the tasks. Complete 35 (Normal promoter) submissions per day to perform withdrawal.</p>
            </div>
            <!-- Add more FAQ items as needed -->
        </div>
    </div>
@endsection 