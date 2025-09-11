@php($active = 'change-password')
@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
<!-- Banner with overlay text -->
<div class="relative w-full h-64 md:h-80 lg:h-96 mb-8">
    <img src="/images/hero/activity.jpg" alt="Change Password Banner"
        class="w-full h-full object-cover object-center rounded-b-2xl">
    <!-- Simple dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-2xl mb-4">Change Password</h1>
            <div class="w-32 h-1 bg-white mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>
</div>

<!-- Main content section -->
<div class="max-w-2xl mx-auto px-4 pb-12">
    <div class="bg-white p-8 rounded-xl shadow-lg">
        @if(session('success'))
            <div class="mb-6 p-4 bg-blue-100 text-blue-800 rounded-lg border border-blue-200 shadow-md">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg border border-red-200 shadow-md">
                <i class="fas fa-exclamation-circle mr-2"></i>{{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('user.password.change') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2" for="current_password">
                    <i class="fas fa-lock mr-2 text-blue-600"></i>Current Password
                </label>
                <input type="password" name="current_password" id="current_password" 
                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-400 transition-all duration-200 hover:border-blue-300" 
                       placeholder="Enter your current password" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2" for="new_password">
                    <i class="fas fa-key mr-2 text-blue-600"></i>New Password
                </label>
                <input type="password" name="new_password" id="new_password" 
                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-400 transition-all duration-200 hover:border-blue-300" 
                       placeholder="Enter your new password" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2" for="new_password_confirmation">
                    <i class="fas fa-key mr-2 text-blue-600"></i>Confirm New Password
                </label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" 
                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-400 transition-all duration-200 hover:border-blue-300" 
                       placeholder="Confirm your new password" required>
            </div>
            
            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 text-white py-4 px-8 rounded-xl font-bold text-lg hover:bg-blue-700 hover:scale-105 transition-all duration-200 flex items-center justify-center shadow-lg">
                    <i class="fas fa-save mr-3"></i>Change Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 