@extends('admin.layouts.app')

@section('title', 'Edit Review')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Edit Review</h1>
        <a href="{{ route('admin.reviews.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
            Back to Reviews
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-8 mb-8">
        <form method="POST" action="{{ route('admin.reviews.update', $review->id) }}">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Review Information -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Review Information</h3>
                    
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $review->title) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                        <textarea id="content" name="content" rows="6" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('content', $review->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating *</label>
                        <select id="rating" name="rating" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="">Select Rating</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Status & Settings -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Status & Settings</h3>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select id="status" name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="">Select Status</option>
                            <option value="pending" {{ old('status', $review->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ old('status', $review->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ old('status', $review->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="verified_purchase" name="verified_purchase" value="1" {{ old('verified_purchase', $review->verified_purchase) ? 'checked' : '' }} class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="verified_purchase" class="ml-2 block text-sm text-gray-900">Verified Purchase</label>
                    </div>
                </div>
            </div>

            <!-- Review Details -->
            <div class="mt-6 space-y-4">
                <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Review Details</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-medium text-gray-900 mb-2">User Information</h4>
                        <div class="text-sm text-gray-600">
                            <div><span class="font-semibold">Name:</span> {{ $review->user->name ?? 'N/A' }}</div>
                            <div><span class="font-semibold">Email:</span> {{ $review->user->email ?? 'N/A' }}</div>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-medium text-gray-900 mb-2">Review Information</h4>
                        <div class="text-sm text-gray-600">
                            <div><span class="font-semibold">Created:</span> {{ $review->created_at->format('M d, Y H:i') }}</div>
                            <div><span class="font-semibold">Commission Earned:</span> ${{ number_format($review->commission_earned, 2) }}</div>
                        </div>
                    </div>
                </div>

                @if($review->trip)
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <h4 class="font-medium text-gray-900 mb-2">Trip Information</h4>
                        <div class="text-sm text-gray-600">
                            <div><span class="font-semibold">Trip:</span> {{ $review->trip->title }}</div>
                            <div><span class="font-semibold">Destination:</span> {{ $review->trip->destination }}</div>
                            <div><span class="font-semibold">Price:</span> ${{ number_format($review->trip->price, 2) }}</div>
                        </div>
                    </div>
                @endif

                @if($review->company)
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <h4 class="font-medium text-gray-900 mb-2">Company Information</h4>
                        <div class="text-sm text-gray-600">
                            <div><span class="font-semibold">Company:</span> {{ $review->company->name }}</div>
                            <div><span class="font-semibold">Country:</span> {{ $review->company->country }}</div>
                            <div><span class="font-semibold">Email:</span> {{ $review->company->email }}</div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">
                    Update Review
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 