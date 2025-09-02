@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
@if(session('success'))
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="mb-8">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
    <p class="text-gray-600">Welcome back, {{ Auth::user()->name }}! Here's an overview of your system.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    @php
        $cards = [
            [
                'icon' => 'fas fa-box',
                'color' => 'bg-teal-100 text-teal-500',
                'label' => 'Total quantity of goods',
                'value' => $totalProducts,
                'desc' => '0 New Products added today<br>0 New Products were added today',
            ],
            [
                'icon' => 'fas fa-users',
                'color' => 'bg-pink-100 text-pink-500',
                'label' => 'Total number of users',
                'value' => $totalUsers,
                'desc' => '0 New users today<br>0 New users were added today',
            ],
            [
                'icon' => 'fas fa-shopping-cart',
                'color' => 'bg-orange-100 text-orange-400',
                'label' => 'Total order quantity',
                'value' => $totalOrderCount,
                'desc' => '0 New orders today<br>0 New orders were added today',
            ],
        ];
    @endphp
    @foreach ($cards as $card)
    <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between min-h-[150px] transition-transform hover:-translate-y-1 hover:shadow-xl">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 flex items-center justify-center rounded-full {{ $card['color'] }} shadow">
                    <i class="{{ $card['icon'] }} text-2xl"></i>
                </div>
                <span class="text-gray-500 text-base font-medium">{{ $card['label'] }}</span>
            </div>
            <span class="text-3xl font-extrabold text-gray-800">{{ $card['value'] }}</span>
        </div>
        <div class="mt-4 text-xs text-gray-400">{!! $card['desc'] !!}</div>
    </div>
    @endforeach
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    @php
        $cards2 = [
            [
                'icon' => 'fas fa-dollar-sign',
                'color' => 'bg-teal-100 text-teal-500',
                'label' => 'The total amount of orders',
                'value' => number_format($totalOrders, 2),
                'desc' => 'The total amount of New orders today is 0<br>The total amount of New orders yesterday is 0',
            ],
            [
                'icon' => 'fas fa-bolt',
                'color' => 'bg-indigo-100 text-indigo-500',
                'label' => 'User recharge',
                'value' => number_format($totalRecharge, 2),
                'desc' => 'New recharge today is 0<br>The New recharges were yesterday is 0',
            ],
            [
                'icon' => 'fas fa-wallet',
                'color' => 'bg-indigo-100 text-indigo-700',
                'label' => 'User withdrawl',
                'value' => number_format($totalWithdrawals, 2),
                'desc' => 'New withdrawl today is 0<br>The New withdrawl were yesterday is 0',
            ],
        ];
    @endphp
    @foreach ($cards2 as $card)
    <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between min-h-[150px] transition-transform hover:-translate-y-1 hover:shadow-xl">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 flex items-center justify-center rounded-full {{ $card['color'] }} shadow">
                    <i class="{{ $card['icon'] }} text-2xl"></i>
                </div>
                <span class="text-gray-500 text-base font-medium">{{ $card['label'] }}</span>
            </div>
            <span class="text-3xl font-extrabold text-gray-800">{{ $card['value'] }}</span>
        </div>
        <div class="mt-4 text-xs text-gray-400">{!! $card['desc'] !!}</div>
    </div>
    @endforeach
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    @php
        $cards3 = [
            [
                'icon' => 'fas fa-coins',
                'color' => 'bg-teal-100 text-teal-600',
                'label' => 'Order grabbing commission',
                'value' => number_format($totalCommission, 2),
                'desc' => 'New commission today is 0<br>The New commission were yesterday is 0',
            ],
            [
                'icon' => 'fas fa-exchange-alt',
                'color' => 'bg-indigo-100 text-indigo-800',
                'label' => 'Instant Transfer',
                'value' => 0,
                'desc' => 'New interest treasure today is 0<br>The New interest treasure were yesterday is 0',
            ],
            [
                'icon' => 'fas fa-piggy-bank',
                'color' => 'bg-green-100 text-green-500',
                'label' => 'Total User Balance',
                'value' => number_format($totalUserBalance, 2),
                'desc' => 'Total interest treasure today is 0<br>The Total interest treasure were yesterday is 0',
            ],
        ];
    @endphp
    @foreach ($cards3 as $card)
    <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between min-h-[150px] transition-transform hover:-translate-y-1 hover:shadow-xl">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 flex items-center justify-center rounded-full {{ $card['color'] }} shadow">
                    <i class="{{ $card['icon'] }} text-2xl"></i>
                </div>
                <span class="text-gray-500 text-base font-medium">{{ $card['label'] }}</span>
            </div>
            <span class="text-3xl font-extrabold text-gray-800">{{ $card['value'] }}</span>
        </div>
        <div class="mt-4 text-xs text-gray-400">{!! $card['desc'] !!}</div>
    </div>
    @endforeach
</div>
<!-- Online customer service system section -->
<div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
    <div class="mb-2 text-gray-700 font-semibold">Online customer service system</div>
    <div class="mb-2">
        <a href="#" class="text-blue-500 hover:underline">Customer service system management backend entrance</a><br>
        <a href="#" class="text-blue-500 hover:underline">Widget test</a><br>
        <a href="#" class="text-blue-500 hover:underline">Customer service system client test</a>
    </div>
    <div class="text-gray-400 text-sm">Add new customer service system, account: admin password: admin01</div>
</div>
<!-- System Message and Product Team Tables -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="md:col-span-2 bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-lg font-semibold mb-4">System Message</h2>
        <table class="min-w-full text-sm">
            <tbody>
                <tr class="border-b"><td class="py-2 text-indigo-600">Current program version</td><td class="py-2">LEGEND</td></tr>
                <tr class="border-b"><td class="py-2">Run PHP version</td><td class="py-2">5.6.40</td></tr>
                <tr class="border-b"><td class="py-2">ThinkPHP version</td><td class="py-2">5.1.38 LTS</td></tr>
                <tr class="border-b"><td class="py-2">MySQL database version</td><td class="py-2">5.6.50-log</td></tr>
                <tr class="border-b"><td class="py-2">Server operating system</td><td class="py-2">Linux</td></tr>
                <tr class="border-b"><td class="py-2">WEB operating environment</td><td class="py-2">fpm-fcgi</td></tr>
                <tr class="border-b"><td class="py-2">Upload size limit</td><td class="py-2">50M</td></tr>
                <tr><td class="py-2">POST size limit</td><td class="py-2">50M</td></tr>
            </tbody>
        </table>
    </div>
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Product Team</h2>
        <table class="min-w-full text-sm">
            <tbody>
                <tr class="border-b"><td class="py-2 text-indigo-600">Product name</td><td class="py-2">Grab order source code</td></tr>
                <tr class="border-b"><td class="py-2">Product Description</td><td class="py-2">This product is only for learning, testing and communication. Please do not use it for commercial purposes or illegal activities. You will be responsible for all consequences.</td></tr>
                <tr class="border-b"><td class="py-2">Do not click</td><td class="py-2">404</td></tr>
                <tr class="border-b"><td class="py-2">Product size</td><td class="py-2">25.5M</td></tr>
                <tr class="border-b"><td class="py-2">database</td><td class="py-2">Mysql</td></tr>
                <tr class="border-b"><td class="py-2">Version</td><td class="py-2">20100106</td></tr>
                <tr class="border-b"><td class="py-2">Upload size limit</td><td class="py-2">50M</td></tr>
                <tr><td class="py-2">POST size limit</td><td class="py-2">50M</td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection 