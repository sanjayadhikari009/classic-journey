@extends('admin.layouts.app')

@section('title', 'Level Setting')

@section('content')
<div class="container py-5">
    <h1 class="text-2xl font-bold mb-4">Level Setting</h1>
    <div class="bg-white rounded-lg shadow p-6">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.level.setting.save') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach(range(1, 5) as $i)
                    @php
                        $level = $levels->firstWhere('level', $i) ?? null;
                    @endphp
                    <div class="space-y-4 border p-4 rounded">
                        <h3 class="font-bold mb-2">Level {{ $i }}</h3>
                        <div>
                            <label>Normal Commission (%)</label>
                            <input type="number" step="0.01" name="levels[{{ $i }}][normal_commission]" class="form-control" value="{{ $level->normal_commission ?? '' }}" required>
                        </div>
                        <div>
                            <label>Stop Commission (%)</label>
                            <input type="number" step="0.01" name="levels[{{ $i }}][stop_commission]" class="form-control" value="{{ $level->stop_commission ?? '' }}" required>
                        </div>
                        <div>
                            <label>Number Of Journey</label>
                            <input type="number" name="levels[{{ $i }}][number_of_journey]" class="form-control" value="{{ $level->number_of_journey ?? '' }}" required>
                        </div>
                        <div>
                            <label>Signup Bonus</label>
                            <input type="number" step="0.01" name="levels[{{ $i }}][signup_bonus]" class="form-control" value="{{ $level->signup_bonus ?? '' }}">
                        </div>
                        <div>
                            <label>Entry Fee</label>
                            <input type="number" step="0.01" name="levels[{{ $i }}][entry_fee]" class="form-control" value="{{ $level->entry_fee ?? '' }}" required>
                        </div>
                        <input type="hidden" name="levels[{{ $i }}][level]" value="{{ $i }}">
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                <label class="block font-semibold mb-1">Signup Bonus</label>
                <input type="number" step="0.01" name="signup_bonus" class="form-control" value="{{ old('signup_bonus', $signupBonus) }}">
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection 