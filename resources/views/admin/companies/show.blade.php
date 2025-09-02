@extends('admin.layouts.app')

@section('title', 'Company Details')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Company Details</h1>
        <a href="{{ route('admin.companies.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
            Back to Companies
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $company->name }}</h2>
                <p class="text-gray-700 mb-4">{{ $company->description }}</p>
                
                <div class="space-y-2">
                    <div><span class="font-semibold">Email:</span> {{ $company->email }}</div>
                    <div><span class="font-semibold">Phone:</span> {{ $company->phone }}</div>
                    <div><span class="font-semibold">Address:</span> {{ $company->address }}</div>
                    <div><span class="font-semibold">Country:</span> {{ $company->country }}</div>
                    @if($company->website)
                        <div><span class="font-semibold">Website:</span> <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:text-blue-800">{{ $company->website }}</a></div>
                    @endif
                    @if($company->established_year)
                        <div><span class="font-semibold">Established:</span> {{ $company->established_year }}</div>
                    @endif
                    <div><span class="font-semibold">Status:</span> <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $company->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ ucfirst($company->status) }}</span></div>
                    <div><span class="font-semibold">Featured:</span> <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $company->featured ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }}">{{ $company->featured ? 'Yes' : 'No' }}</span></div>
                    <div><span class="font-semibold">Rating:</span> 
                        <div class="flex items-center mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $company->rating)
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm text-gray-500">({{ $company->total_reviews }} reviews)</span>
                        </div>
                    </div>
                    <div><span class="font-semibold">Created:</span> {{ $company->created_at->format('M d, Y') }}</div>
                </div>
            </div>
            <div>
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="w-full h-64 object-cover rounded-lg mb-4">
                @else
                    <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Trips</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trip</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($company->trips as $trip)
                        <tr>
                            <td class="px-4 py-2">
                                <div class="text-sm font-medium text-gray-900">{{ $trip->title }}</div>
                                <div class="text-sm text-gray-500">{{ $trip->destination }}</div>
                            </td>
                            <td class="px-4 py-2">${{ number_format($trip->price, 2) }}</td>
                            <td class="px-4 py-2">{{ ucfirst($trip->status) }}</td>
                            <td class="px-4 py-2">{{ $trip->featured ? 'Yes' : 'No' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">No trips found.</td>
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
                        @forelse($company->reviews as $review)
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