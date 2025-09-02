@extends('admin.layouts.app')

@section('title', 'Trip Details')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Trip Details</h1>
        <a href="{{ route('admin.trips.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
            Back to Trips
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $trip->title }}</h2>
                <p class="text-gray-700 mb-2">{{ $trip->description }}</p>
                <div class="mb-2"><span class="font-semibold">Destination:</span> {{ $trip->destination }}</div>
                <div class="mb-2"><span class="font-semibold">Duration:</span> {{ $trip->duration }}</div>
                <div class="mb-2"><span class="font-semibold">Category:</span> {{ $trip->category }}</div>
                <div class="mb-2"><span class="font-semibold">Difficulty:</span> {{ ucfirst($trip->difficulty) }}</div>
                <div class="mb-2"><span class="font-semibold">Group Size:</span> {{ $trip->group_size }}</div>
                <div class="mb-2"><span class="font-semibold">Company:</span> {{ $trip->company->name ?? 'N/A' }}</div>
                <div class="mb-2"><span class="font-semibold">Status:</span> <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $trip->status === 'active' ? 'bg-green-100 text-green-800' : ($trip->status === 'inactive' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">{{ ucfirst($trip->status) }}</span></div>
                <div class="mb-2"><span class="font-semibold">Featured:</span> <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $trip->featured ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }}">{{ $trip->featured ? 'Yes' : 'No' }}</span></div>
                <div class="mb-2"><span class="font-semibold">Start Date:</span> {{ $trip->start_date ? $trip->start_date->format('M d, Y') : '-' }}</div>
                <div class="mb-2"><span class="font-semibold">End Date:</span> {{ $trip->end_date ? $trip->end_date->format('M d, Y') : '-' }}</div>
                <div class="mb-2"><span class="font-semibold">Total Seats:</span> {{ $trip->total_seats }}</div>
                <div class="mb-2"><span class="font-semibold">Seats Available:</span> {{ $trip->seats_available }}</div>
                <div class="mb-2"><span class="font-semibold">Price:</span> ${{ number_format($trip->price, 2) }}</div>
                @if($trip->discount_price)
                    <div class="mb-2"><span class="font-semibold">Discount Price:</span> <span class="text-green-600">${{ number_format($trip->discount_price, 2) }}</span></div>
                @endif
            </div>
            <div>
                @if($trip->image)
                    <img src="{{ asset('storage/' . $trip->image) }}" alt="Trip Image" class="w-full h-64 object-cover rounded-lg mb-4">
                @endif
                @if($trip->gallery)
                    <div class="flex flex-wrap gap-2">
                        @foreach($trip->gallery as $img)
                            <img src="{{ asset('storage/' . $img) }}" alt="Gallery Image" class="h-16 w-16 rounded-lg object-cover">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Bookings</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booked At</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($trip->bookings as $booking)
                        <tr>
                            <td class="px-4 py-2">{{ $booking->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ ucfirst($booking->status ?? '-') }}</td>
                            <td class="px-4 py-2">{{ $booking->created_at ? $booking->created_at->format('M d, Y') : '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-center text-gray-500">No bookings found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Reviews</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($trip->reviews as $review)
                        <tr>
                            <td class="px-4 py-2">{{ $review->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $review->rating }}/5</td>
                            <td class="px-4 py-2">{{ $review->title }}</td>
                            <td class="px-4 py-2">{{ ucfirst($review->status) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">No reviews found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 