@extends('admin.layouts.app')

@section('title', 'Wallet Settings')

@section('content')
<div class="container py-5">
    <h1 class="text-2xl font-bold mb-4">Wallet Settings</h1>
    <div class="bg-white rounded-lg shadow p-6 w-full max-w-5xl mx-auto">
        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.wallet.settings.save') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- ERC20 -->
                <div class="mb-6">
                    <h2 class="font-semibold text-lg mb-2">ERC20 Wallet</h2>
                    <label class="block font-medium mb-1">Chain Type</label>
                    <div class="mb-2 font-semibold text-indigo-700">ERC20</div>
                    <label class="block font-medium mb-1">Wallet Address</label>
                    <input type="text" name="wallet_erc20_address" class="form-input w-full border rounded px-3 py-2 mb-2" value="{{ $wallet_erc20_address ?? '' }}" placeholder="Enter ERC20 wallet address">
                    <label class="block font-medium mb-1">Scanner Image (QR Code)</label>
                    <input type="file" name="wallet_erc20_qr" class="form-input w-full border rounded px-3 py-2">
                    @if(!empty($wallet_erc20_qr))
                        <div class="mt-2"><img src="{{ asset('storage/' . $wallet_erc20_qr) }}" alt="ERC20 QR" class="w-32 h-32 object-contain border"></div>
                    @endif
                </div>
                <!-- TRC20 -->
                <div class="mb-6">
                    <h2 class="font-semibold text-lg mb-2">TRC20 Wallet</h2>
                    <label class="block font-medium mb-1">Chain Type</label>
                    <div class="mb-2 font-semibold text-indigo-700">TRC20</div>
                    <label class="block font-medium mb-1">Wallet Address</label>
                    <input type="text" name="wallet_trc20_address" class="form-input w-full border rounded px-3 py-2 mb-2" value="{{ $wallet_trc20_address }}" placeholder="Enter TRC20 wallet address">
                    <label class="block font-medium mb-1">Scanner Image (QR Code)</label>
                    <input type="file" name="wallet_trc20_qr" class="form-input w-full border rounded px-3 py-2">
                    @if($wallet_trc20_qr)
                        <div class="mt-2"><img src="{{ asset('storage/' . $wallet_trc20_qr) }}" alt="TRC20 QR" class="w-32 h-32 object-contain border"></div>
                    @endif
                </div>
                <!-- BEP20 -->
                <div class="mb-6">
                    <h2 class="font-semibold text-lg mb-2">BEP20 Wallet</h2>
                    <label class="block font-medium mb-1">Chain Type</label>
                    <div class="mb-2 font-semibold text-indigo-700">BEP20</div>
                    <label class="block font-medium mb-1">Wallet Address</label>
                    <input type="text" name="wallet_bep20_address" class="form-input w-full border rounded px-3 py-2 mb-2" value="{{ $wallet_bep20_address }}" placeholder="Enter BEP20 wallet address">
                    <label class="block font-medium mb-1">Scanner Image (QR Code)</label>
                    <input type="file" name="wallet_bep20_qr" class="form-input w-full border rounded px-3 py-2">
                    @if($wallet_bep20_qr)
                        <div class="mt-2"><img src="{{ asset('storage/' . $wallet_bep20_qr) }}" alt="BEP20 QR" class="w-32 h-32 object-contain border"></div>
                    @endif
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <button type="submit" class="btn btn-primary bg-indigo-600 text-white px-4 py-2 rounded">Save Settings</button>
            </div>
        </form>
    </div>
</div>
@endsection 