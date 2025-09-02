@extends('layouts.app')

@section('title', 'Notifications - Travelstride')
@section('breadcrumb', 'Notifications')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Page Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Notifications</h1>
                    <p class="text-gray-600 mt-1">Stay updated with your latest activities and important messages</p>
                </div>
                <button class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    Mark All Read
                </button>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div class="text-center py-12">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-bell text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No notifications yet</h3>
        <p class="text-gray-600">You're all caught up! New notifications will appear here.</p>
    </div>
</div>
@endsection 