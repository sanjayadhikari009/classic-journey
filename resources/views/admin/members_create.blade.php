@extends('admin.layouts.app')

@section('title', 'Add Member')

@section('content')
<div class="bg-white rounded-lg shadow p-8 mb-8">
    <h1 class="text-2xl font-bold mb-6">Add Member</h1>
    <form method="POST" action="{{ route('admin.admin.members.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium">User Name*</label>
            <input name="username" type="text" class="form-input w-full border rounded px-3 py-2" value="{{ old('username') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Phone Number*</label>
            <input name="mobile_number" type="text" class="form-input w-full border rounded px-3 py-2" value="{{ old('mobile_number') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Login Password*</label>
            <input name="password" type="password" class="form-input w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Transaction Password</label>
            <input name="transaction_password" type="password" class="form-input w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Referral Code</label>
            <input name="referral_code" type="text" class="form-input w-full border rounded px-3 py-2" value="{{ old('referral_code') }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Select Referral</label>
            <select name="referral_by" class="form-select w-full border rounded px-3 py-2">
                <option value="">Select User</option>
                @foreach($referrals as $ref)
                    <option value="{{ $ref->id }}" @if(old('referral_by') == $ref->id) selected @endif>{{ $ref->referral_code }} - {{ $ref->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Level*</label>
            <select name="level" id="level-select" class="form-select w-full border rounded px-3 py-2" required>
                <option value="">Select Level</option>
                @foreach($levels as $level)
                    <option value="{{ $level->level }}" data-normal_commission="{{ $level->normal_commission }}" data-stop_commission="{{ $level->stop_commission }}" data-journey="{{ $level->number_of_journey }}" data-signup_bonus="{{ $level->signup_bonus }}" @if(old('level', 1) == $level->level) selected @endif>
                        Level {{ $level->level }} - Normal Commission: {{ number_format($level->normal_commission, 2) }}%, Stop Commission: {{ number_format($level->stop_commission, 2) }}%, Journeys: {{ $level->number_of_journey }}, Signup Bonus: ${{ number_format($level->signup_bonus, 2) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-6" id="level-info">
            <!-- Dynamic level info will be shown here -->
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn btn-primary bg-indigo-600 text-white px-4 py-2 rounded">Submit</button>
            <a href="{{ route('admin.admin.members.index') }}" class="btn btn-secondary bg-gray-200 text-gray-700 px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function updateLevelInfo() {
        var select = document.getElementById('level-select');
        var selected = select.options[select.selectedIndex];
        if (!selected.value) {
            document.getElementById('level-info').innerHTML = '';
            return;
        }
        var html = `<table class="min-w-full text-sm mt-2">
            <tr><td class="font-semibold pr-2">Normal Commission:</td><td>
                ${parseFloat(selected.getAttribute('data-normal_commission')).toFixed(2)}%</td></tr>
            <tr><td class="font-semibold pr-2">Stop Commission:</td><td>
                ${parseFloat(selected.getAttribute('data-stop_commission')).toFixed(2)}%</td></tr>
            <tr><td class="font-semibold pr-2">Number of Journeys:</td><td>
                ${selected.getAttribute('data-journey')}</td></tr>
            <tr><td class="font-semibold pr-2">Signup Bonus:</td><td>
                $${parseFloat(selected.getAttribute('data-signup_bonus')).toFixed(2)}</td></tr>
        </table>`;
        document.getElementById('level-info').innerHTML = html;
    }
    document.getElementById('level-select').addEventListener('change', updateLevelInfo);
    window.addEventListener('DOMContentLoaded', updateLevelInfo);
</script>
@endpush 