@php($active = 'change-password')
@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
<div class="max-w-md mx-auto mt-12 bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Change Password</h2>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('user.password.change') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="current_password">Current Password</label>
            <input type="password" name="current_password" id="current_password" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="new_password">New Password</label>
            <input type="password" name="new_password" id="new_password" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-6">
            <label class="block mb-1 font-semibold" for="new_password_confirmation">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-semibold hover:bg-indigo-700 transition">Change Password</button>
    </form>
</div>
@endsection 