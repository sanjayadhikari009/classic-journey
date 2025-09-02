@extends('admin.layouts.app')

@section('title', 'Review Details')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Review Details</h1>
        <a href="{{ route('admin.reviews.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
            Back to Reviews
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $review->title }}</h2>
                <p class="text-gray-700 mb-4">{{ $review->content }}</p>
                
                <div class="space-y-2">
                    <div><span class="font-semibold">User:</span> {{ $review->user->name ?? 'N/A' }}</div>
                    <div><span class="font-semibold">Email:</span> {{ $review->user->email ?? 'N/A' }}</div>
                    <div><span class="font-semibold">Rating:</span> 
                        <div class="flex items-center mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm text-gray-500">({{ $review->rating }}/5)</span>
                        </div>
                    </div>
                    <div><span class="font-semibold">Status:</span> <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $review->status === 'approved' ? 'bg-green-100 text-green-800' : ($review->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">{{ ucfirst($review->status) }}</span></div>
                    <div><span class="font-semibold">Verified Purchase:</span> {{ $review->verified_purchase ? 'Yes' : 'No' }}</div>
                    <div><span class="font-semibold">Commission Earned:</span> ${{ number_format($review->commission_earned, 2) }}</div>
                    <div><span class="font-semibold">Created:</span> {{ $review->created_at->format('M d, Y H:i') }}</div>
                </div>

                @if($review->trip)
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-2">Trip Information</h3>
                        <div><span class="font-semibold">Trip:</span> {{ $review->trip->title }}</div>
                        <div><span class="font-semibold">Destination:</span> {{ $review->trip->destination }}</div>
                        <div><span class="font-semibold">Price:</span> ${{ number_format($review->trip->price, 2) }}</div>
                    </div>
                @endif

                @if($review->company)
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-2">Company Information</h3>
                        <div><span class="font-semibold">Company:</span> {{ $review->company->name }}</div>
                        <div><span class="font-semibold">Country:</span> {{ $review->company->country }}</div>
                        <div><span class="font-semibold">Email:</span> {{ $review->company->email }}</div>
                    </div>
                @endif
            </div>
            <div>
                @if($review->images)
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Review Images</h3>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($review->images as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Review Image" class="w-full h-32 object-cover rounded-lg">
                        @endforeach
                    </div>
                @else
                    <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 