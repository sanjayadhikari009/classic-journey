@extends('layouts.app')

@section('title', 'Recharge')

@section('content')
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded text-center font-semibold">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-800 rounded text-center font-semibold">
        <div class="flex items-center justify-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            {{ session('error') }}
        </div>
    </div>
@endif
<section class="h-[50vh] bg-cover bg-no-repeat bg-center relative" style="background-image:url('/images/hero/recharge.jpg');">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative flex items-center justify-center w-full h-full">
        <div class="text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 drop-shadow-2xl">Recharge</h1>
            <div class="w-24 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</section>
<section class="py-[65px]">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto space-y-8 flex justify-center">

        <div class="w-full lg:w-2/3  p-6 space-y-5">

            <div class="w-full bg-primary p-4 rounded-2xl">
                <p class="text-sm text-white">Account Balance</p>
                <h2 class="text-xl font-semibold text-white {{ auth()->user()->balance < 0 ? 'text-red-200' : 'text-white' }}">
                    USDT {{ number_format(auth()->user()->balance ?? 0, 2) }}
                </h2>
                @if(auth()->user()->balance < 0)
                    <p class="text-xs text-red-200 mt-1">⚠️ Negative Balance</p>
                @endif
            </div>
            {{-- <div class="w-full bg-white p-4 rounded-2xl mb-4 mt-2 text-gray-800 text-sm">
                <span class="mr-4">Total Recharged: <span class="font-semibold">${{ number_format($totalRecharged, 2) }}</span></span>
                <span class="mr-4">Total Deducted: <span class="font-semibold">${{ number_format($totalDeducted, 2) }}</span></span>
                <span class="mr-4">Total Commission: <span class="font-semibold">${{ number_format($totalCommission, 2) }}</span></span>
                <span>Total Balance: <span class="font-semibold">${{ number_format($totalBalance, 2) }}</span></span>
            </div> --}}

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class=" bg-primary  p-4 rounded-2xl w-full text-center text-white select-amount" data-amount="100">
                    $100</div>
                <div class=" bg-primary  p-4 rounded-2xl w-full text-center text-white select-amount" data-amount="200">
                    $200</div>
                <div class=" bg-primary  p-4 rounded-2xl w-full text-center text-white select-amount" data-amount="500">
                    $500</div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                <input id="amountInput" type="number" placeholder="Enter Amount"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" />
            </div>

            <!-- Wallet Options and Recharge Form -->
            <form method="POST" action="{{ route('user.recharge.submit') }}" enctype="multipart/form-data" class="space-y-6 mt-6">
                @csrf
                <input type="hidden" name="amount" id="hiddenAmount" value="">
                @php
                    $erc20_address = \App\Models\AppSetting::where('key', 'wallet_erc20_address')->value('value');
                    $erc20_qr = \App\Models\AppSetting::where('key', 'wallet_erc20_qr')->value('value');
                    $trc20_address = \App\Models\AppSetting::where('key', 'wallet_trc20_address')->value('value');
                    $trc20_qr = \App\Models\AppSetting::where('key', 'wallet_trc20_qr')->value('value');
                    $bep20_address = \App\Models\AppSetting::where('key', 'wallet_bep20_address')->value('value');
                    $bep20_qr = \App\Models\AppSetting::where('key', 'wallet_bep20_qr')->value('value');
                @endphp
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Chain Type</label>
                    <select name="chain_type" id="chainTypeSelect" class="w-full px-3 py-2 border rounded-md" required>
                        <option value="">Choose Chain Type</option>
                        <option value="ERC20">ERC20</option>
                        <option value="TRC20">TRC20</option>
                        <option value="BEP20">BEP20</option>
                    </select>
                </div>
                <div id="walletDetails" class="my-4">
                    <!-- Wallet details will be shown here by JS -->
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload Payment Screenshot <span class="text-red-500">*</span></label>
                    <input type="file" name="payment_screenshot" accept="image/*" class="w-full px-3 py-2 border rounded-md" required>
                </div>
                <button type="submit" id="rechargeBtn"
                    class="w-full bg-primary text-white py-2 rounded-md font-semibold hover:bg-primary/50 transition cursor-pointer">
                    Recharge
                </button>
            </form>
            <script>
            const walletData = {
                ERC20: {
                    address: @json($erc20_address),
                    qr: @json($erc20_qr)
                },
                TRC20: {
                    address: @json($trc20_address),
                    qr: @json($trc20_qr)
                },
                BEP20: {
                    address: @json($bep20_address),
                    qr: @json($bep20_qr)
                }
            };
            function copyToClipboard(text, btn) {
                navigator.clipboard.writeText(text).then(function() {
                    btn.innerText = 'Copied!';
                    setTimeout(() => { btn.innerText = 'Copy'; }, 1200);
                });
            }
            document.getElementById('chainTypeSelect').addEventListener('change', function() {
                const val = this.value;
                const details = walletData[val] || {};
                let html = '';
                if (val && details.address) {
                    html += `<div class='mb-2 flex items-center gap-2'><span class='font-bold'>Wallet Address:</span> <span class='select-all bg-gray-100 px-2 py-1 rounded border font-mono' id='walletAddressSpan'>${details.address}</span> <button type='button' class='ml-2 px-2 py-1 text-xs bg-primary text-white rounded' onclick='copyToClipboard("${details.address}", this)'>Copy</button></div>`;
                }
                if (val && details.qr) {
                    html += `<div class='mb-2'><img src='${window.location.origin}/storage/${details.qr}' alt='${val} QR' class='w-32 h-32 object-contain border'></div>`;
                }
                if (!html && val) {
                    html = `<div class='text-red-500'>No wallet address set for ${val}.</div>`;
                }
                document.getElementById('walletDetails').innerHTML = html;
            });
            </script>
        </div>
    </div>
</section>

<section class="py-4 max-w-7xl mx-auto">
    <div class="w-full lg:w-2/3 mx-auto bg-white rounded-2xl shadow p-6 mt-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-900">Recharge History</h2>
        <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Start Date</label>
                <input type="date" name="start_date" value="{{ $startDate ?? '' }}" class="border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">End Date</label>
                <input type="date" name="end_date" value="{{ $endDate ?? '' }}" class="border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Min Amount</label>
                <input type="number" step="0.01" name="min_amount" value="{{ $minAmount ?? '' }}" class="border rounded px-2 py-1" placeholder="Min">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Max Amount</label>
                <input type="number" step="0.01" name="max_amount" value="{{ $maxAmount ?? '' }}" class="border rounded px-2 py-1" placeholder="Max">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Status</label>
                <select name="status" class="border rounded px-2 py-1">
                    <option value="">All</option>
                    <option value="complete" @if(($status ?? '') == 'complete') selected @endif>Complete</option>
                    <option value="pending" @if(($status ?? '') == 'pending') selected @endif>Pending</option>
                    <option value="failed" @if(($status ?? '') == 'failed') selected @endif>Failed</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Filter</button>
            </div>
        </form>
        @if($rechargeHistory->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($rechargeHistory as $recharge)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $recharge->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-2 text-sm text-green-700 font-semibold">${{ number_format($recharge->amount, 2) }}</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="inline-block px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">{{ ucfirst($recharge->status) }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $rechargeHistory->links() }}
            </div>
        @else
            <p class="text-gray-500">No recharge history found.</p>
        @endif
    </div>
</section>

<script>
document.querySelectorAll(".select-amount").forEach((el) => {
    el.addEventListener("click", () => {
        const amount = el.getAttribute("data-amount");
        document.getElementById("amountInput").value = amount;
        document.getElementById("hiddenAmount").value = amount;
    });
});

// Handle manual input
document.getElementById("amountInput").addEventListener("input", function() {
    document.getElementById("hiddenAmount").value = this.value;
});

// Handle form submission
document.querySelector("form").addEventListener("submit", function(e) {
    const amount = document.getElementById("amountInput").value;
    if (!amount || amount <= 0) {
        e.preventDefault();
        alert("Please enter a valid amount to recharge.");
        return false;
    }
    document.getElementById("hiddenAmount").value = amount;
});
</script>
@endsection