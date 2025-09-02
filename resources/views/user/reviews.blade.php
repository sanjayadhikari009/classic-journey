@php($active = 'reviews')
@extends('layouts.app')

@section('title', 'My Reviews')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-1">My Reviews</h1>
        <p class="text-gray-500 text-lg">Share your travel experiences and help other travelers</p>
        <div class="border-b border-gray-200 mt-4"></div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <div class="bg-yellow-100 text-yellow-500 rounded-full p-3 mb-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.036 6.29a1 1 0 00.95.69h6.631c.969 0 1.371 1.24.588 1.81l-5.37 3.905a1 1 0 00-.364 1.118l2.036 6.29c.3.921-.755 1.688-1.54 1.118l-5.37-3.905a1 1 0 00-1.176 0l-5.37 3.905c-.784.57-1.838-.197-1.54-1.118l2.036-6.29a1 1 0 00-.364-1.118L2.342 11.717c-.783-.57-.38-1.81.588-1.81h6.631a1 1 0 00.95-.69l2.036-6.29z"/></svg>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ $totalReviews ?? 0 }}</div>
            <div class="text-gray-500 text-sm">Total Reviews</div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <div class="bg-green-100 text-green-500 rounded-full p-3 mb-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6a2 2 0 012-2h12a2 2 0 012 2v8c0 2.21-3.582 4-8 4z"/></svg>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ $averageRating ?? '0.0' }}</div>
            <div class="text-gray-500 text-sm">Average Rating</div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <div class="bg-blue-100 text-blue-500 rounded-full p-3 mb-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 7.165 6 9.388 6 12v2.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ $totalViews ?? 0 }}</div>
            <div class="text-gray-500 text-sm">Total Views</div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <div class="bg-pink-100 text-pink-500 rounded-full p-3 mb-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.764 7.528A2 2 0 0115 22H9a2 2 0 01-1.789-1.578l-3.764-7.528A2 2 0 014.236 10H9m5 0V6a3 3 0 00-6 0v4m6 0H9"/></svg>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ $helpfulVotes ?? 0 }}</div>
            <div class="text-gray-500 text-sm">Helpful Votes</div>
        </div>
    </div>

    <!-- No Reviews State -->
    @if(empty($reviews) || $reviews->count() === 0)
        <div class="flex flex-col items-center justify-center py-20">
            <div class="mb-4">
                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h.01M9 16h6a2 2 0 002-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v7a2 2 0 002 2z"/></svg>
            </div>
            <div class="text-xl font-semibold text-gray-700 mb-2">No reviews yet</div>
            <div class="text-gray-500 mb-6">Share your travel experiences and help other travelers make informed decisions!</div>
                            <a href="{{ route('user.customer.write_review') }}" class="inline-block px-8 py-3 bg-pink-500 text-white font-bold rounded-lg shadow hover:bg-pink-600 transition">Write Your First Review</a>
        </div>
    @else
        <!-- Reviews List (if any) -->
        <div class="bg-white rounded-lg shadow-md">
            @php($reviews = auth()->user()->reviews()->with('trip')->latest()->paginate(10))

            @if($reviews->count() > 0)
            <div class="p-6">
                <div class="space-y-6">
                    @foreach($reviews as $review)
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                @if($review->trip && $review->trip->image)
                                <img src="{{ asset('storage/' . $review->trip->image) }}" alt="{{ $review->trip->title }}"
                                    class="w-16 h-16 rounded-lg object-cover mr-4">
                                @else
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                @endif
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $review->trip->title ?? 'Trip' }}
                                    </h3>
                                    <p class="text-gray-600">{{ $review->trip->destination ?? 'Destination' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('user.reviews.edit', $review->id) }}"
                                    class="text-blue-600 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </a>
                                <button class="text-red-600 hover:text-red-700" onclick="deleteReview({{ $review->id }})">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center mb-4">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++) <svg
                                    class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600">{{ $review->rating }}/5</span>
                            </div>
                            <span class="mx-4 text-gray-300">|</span>
                            <span class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</span>
                        </div>

                        <div class="mb-4">
                            <h4 class="font-medium text-gray-900 mb-2">{{ $review->title }}</h4>
                            <p class="text-gray-700">{{ $review->content }}</p>
                        </div>

                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <span>{{ $review->views }} views</span>
                                <span>{{ $review->rating }}/5 rating</span>
                            </div>
                            <span>Review #{{ $review->id }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $reviews->links() }}
                </div>
            </div>
            @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                    </path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No reviews yet</h3>
                <p class="text-gray-600 mb-6">Share your travel experiences and help other travelers make informed
                    decisions!</p>
                <a href="{{ route('user.customer.write_review') }}" class="inline-block px-8 py-3 bg-pink-500 text-white font-bold rounded-lg shadow hover:bg-pink-600 transition">Write Your First Review</a>
            </div>
            @endif
        </div>
    @endif
</div>

<script>
function deleteReview(reviewId) {
    if (confirm('Are you sure you want to delete this review?')) {
        fetch(`/user/reviews/${reviewId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
    }
}
</script>
@endsection