@php($active = 'history')
@extends('layouts.app')

@section('title', 'History')

@section('hero')
<section class="h-[40vh] bg-cover bg-no-repeat bg-center relative" style="background-image:url('/images/hero/activity.jpg');">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative flex items-center justify-center w-full h-full">
        <div class="text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 drop-shadow-2xl">Product Review History</h1>
            <div class="w-40 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="py-12">
    <div class="max-w-4xl px-2 sm:px-6 md:px-8 mx-auto space-y-8 flex justify-center">
        <div class="w-full lg:w-2/3 p-6 space-y-5">
            <div>
                <h2 class="text-xl font-semibold text-black">Earning History</h2>
                <p class="text-sm text-slate-400">{{ $reviewHistory->count() }} Records</p>
            </div>
            <div class="flex flex-wrap justify-between items-center bg-white rounded-lg shadow p-6 mb-6">
                <div>
                    <div class="font-bold text-gray-700">Total Earned (Product Price)</div>
                    <div class="text-2xl font-semibold text-blue-700">USDT {{ number_format($reviewHistory->sum(fn($item) => $item->product_price), 2) }}</div>
                </div>
                <div>
                    <div class="font-bold text-gray-700">Total Commission ({{ config('app.review_commission_percent', 1) }}%)</div>
                    <div class="text-2xl font-semibold text-green-600">USDT {{ number_format($reviewHistory->sum(fn($item) => $item->commission), 2) }}</div>
                </div>
            </div>
            @if(session('success'))
                <div class="w-full p-4 mb-4 bg-green-100 text-green-800 rounded text-center font-semibold">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="w-full p-4 mb-4 bg-red-100 text-red-800 rounded text-center font-semibold">
                    {{ $errors->first() }}
                </div>
            @endif
            @if($reviewHistory->isEmpty())
                <div class="bg-white rounded-lg shadow p-6 text-center">
                    <p class="text-gray-600">No earning history yet. Submit reviews and get them approved to earn commission!</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($reviewHistory as $item)
                        <div class="flex flex-wrap items-center p-4 shadow-2xl rounded-2xl bg-white hover:shadow-xl transition">
                            <div class="lg:basis-1/5 w-full flex items-center justify-center">
                                <img alt="{{ $item->product->name ?? 'Product' }}" class="h-[120px] w-full object-cover rounded border" src="{{ $item->product->image_url ?? '/images/default-product.png' }}" />
                            </div>
                            <div class="lg:basis-2/5 md:px-4 py-4 md:py-0 flex flex-col justify-center">
                                <div class="font-bold text-lg text-blue-700 mb-1">{{ $item->product->name }}</div>
                                <div class="text-sm text-gray-600 mb-1">{{ Str::limit($item->product->description, 80) }}</div>
                                <div class="text-xs text-gray-400">Date: <span class="font-semibold text-black">{{ $item->created_at->format('M d, Y h:i A') }}</span></div>
                                <div class="text-xs text-gray-400">Quantity: <span class="font-semibold text-black">{{ $item->quantity ?? 1 }}</span></div>
                            </div>
                            <div class="flex flex-wrap lg:justify-end gap-6 items-center lg:basis-2/5">
                                <div>
                                    <p class="text-slate-400">Product Price</p>
                                    <p class="text-lg">USDT {{ number_format($item->product_price, 2) }}</p>
                                    @php
                                        $levelSetting = \App\Models\LevelSetting::where('level', auth()->user()->level)->first();
                                        $commissionPercent = $levelSetting ? $levelSetting->stop_commission : 1;
                                        $potentialCommission = $item->product ? round($item->product->price * $commissionPercent / 100, 2) : 0;
                                    @endphp
                                    <p class="text-slate-400">Commission ({{ $item->status === 'approved' ? number_format($item->commission_percent, 1) : number_format($commissionPercent, 1) }}%)</p>
                                    <p class="text-lg text-primary">
                                        USDT {{ $item->status === 'approved' ? number_format($item->commission, 2) : number_format($potentialCommission, 2) }}
                                        @if($item->status === 'pending') <span class="text-xs text-orange-500">(pending)</span> @endif
                                    </p>
                                </div>
                                @if($item->status === 'approved')
                                    <div class="w-[150px] bg-green-100 text-green-700 py-2 rounded-md font-semibold text-center">
                                        Approved
                                    </div>
                                @elseif($item->status === 'pending')
                                    <div class="w-[150px] bg-yellow-100 text-yellow-700 py-2 rounded-md font-semibold text-center">
                                        Pending
                                    </div>
                                @elseif($item->status === 'rejected')
                                    <div class="w-[150px] bg-red-100 text-red-700 py-2 rounded-md font-semibold text-center">
                                        Rejected
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endsection 