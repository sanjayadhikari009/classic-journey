@php($active = 'reviews')
@extends('layouts.app')

@section('title', 'Edit Review')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8 mt-8">
    <h1 class="text-2xl font-bold mb-6">Edit Your Review</h1>
    <form method="POST" action="{{ route('user.reviews.update', $review->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $review->title) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Rating</label>
            <input type="number" name="rating" min="1" max="5" value="{{ old('rating', $review->rating) }}" class="w-24 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            @error('rating')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Content</label>
            <textarea name="content" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('content', $review->content) }}</textarea>
            @error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Update Review</button>
        </div>
    </form>
</div>
@endsection 