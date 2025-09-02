<div class="flex flex-wrap items-center p-4 shadow-2xl rounded-2xl bg-white hover:shadow-xl transition">
    <div class="lg:basis-1/5 w-full flex items-center justify-center">
        @if($item->type === 'product')
            @if($item->item->image && file_exists(storage_path('app/public/' . $item->item->image)))
                <img alt="{{ $item->item->name ?? 'Product' }}" class="h-[120px] w-full object-cover rounded border" src="{{ asset('storage/' . $item->item->image) }}" />
            @else
                <img alt="{{ $item->item->name ?? 'Product' }}" class="h-[120px] w-full object-cover rounded border" src="https://static.travelstride.com/store/main_image/3446042/attachment/a627ed27bbc846efc65eb50052367735.jpg" />
            @endif
        @else
            <img alt="{{ $item->item->title ?? 'Trip' }}" class="h-[120px] w-full object-cover rounded border" src="{{ $item->item->image ? asset('storage/' . $item->item->image) : 'https://static.travelstride.com/store/main_image/3446042/attachment/a627ed27bbc846efc65eb50052367735.jpg' }}" />
        @endif
    </div>
    <div class="lg:basis-2/5 md:px-4 py-4 md:py-0 flex flex-col justify-center">
        @if($item->type === 'product')
            <div class="font-bold text-lg text-blue-700 mb-1">{{ $item->item->name }}</div>
            <div class="text-sm text-gray-600 mb-1">{{ Str::limit($item->item->description, 80) }}</div>
            @if($item->review)
                <div class="flex items-center mb-1">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $item->review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.5 6,11.7 4.8,17.6 9.9,14.6 15,17.6 13.8,11.7 18.2,7.5 12.2,6.6 "/></svg>
                    @endfor
                    <span class="ml-2 text-xs text-gray-500">({{ $item->review->rating }}/5)</span>
                </div>
                <div class="font-semibold text-sm text-gray-800 mb-1">{{ $item->review->title }}</div>
                <div class="text-xs text-gray-600 mb-1">{{ Str::limit($item->review->content, 80) }}</div>
                <div class="text-xs">
                    @if($item->review->status === 'approved')
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded">Approved</span>
                    @elseif($item->review->status === 'pending')
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded">Pending</span>
                    @elseif($item->review->status === 'rejected')
                        <span class="px-2 py-1 bg-red-100 text-red-700 rounded">Rejected</span>
                    @endif
                </div>
            @endif
        @else
            <div class="font-bold text-lg text-blue-700 mb-1">{{ $item->item->title }}</div>
            <div class="text-sm text-gray-600 mb-1">{{ Str::limit($item->item->description, 80) }}</div>
        @endif
        <div class="text-xs text-gray-400">Date: <span class="font-semibold text-black">{{ isset($item->order) && $item->order ? $item->order->created_at->format('M d, Y h:i A') : '-' }}</span></div>
        <div class="text-xs text-gray-400">Quantity: <span class="font-semibold text-black">{{ $item->order->quantity ?? 1 }}</span></div>
    </div>
    <div class="flex flex-wrap lg:justify-end gap-6 items-center lg:basis-2/5">
        <div>
            <p class="text-slate-400">Journey Price</p>
            <p class="text-lg">USDT {{ number_format(($item->order->amount ?? $item->item->price), 2) }}</p>
            <p class="text-slate-400">
                Commission (
                @if(isset($item->review) && isset($item->review->commission_percent))
                    {{ number_format($item->review->commission_percent, 0) }}%
                @else
                    {{ config('app.review_commission_percent', 1) }}%
                @endif
                )
            </p>
            <p class="text-lg text-primary">
                @if(isset($item->review) && isset($item->review->commission_earned))
                    USDT {{ number_format($item->review->commission_earned, 2) }}
                @else
                    USDT {{ number_format(\App\Http\Controllers\UserController::getReviewCommission($item->order->amount ?? $item->item->price), 2) }}
                @endif
            </p>
        </div>
        @if(isset($item->order) && $item->order && $item->order->status === 'completed')
            <div class="w-[150px] bg-green-100 text-green-700 py-2 rounded-md font-semibold text-center">
                Completed
            </div>
        @elseif($item->status === 'locked')
            <div class="w-[150px] bg-red-100 text-red-700 py-2 rounded-md font-semibold text-center border-2 border-red-300">
                <i class="fas fa-lock mr-1"></i>Locked
            </div>
        @elseif($item->status === 'pending')
            @php $userBalance = auth()->user()->balance; @endphp
            <button 
                type="button" 
                class="product-submit-btn w-[150px] py-2 rounded-md font-semibold transition cursor-pointer text-center block border-2 {{ $userBalance < $item->item->price ? 'bg-red-100 text-red-700 border-red-300' : 'bg-gradient-to-r from-pink-500 to-purple-500 text-white hover:from-purple-500 hover:to-pink-500 border-pink-500' }}"
                data-product-id="{{ $item->item->id }}"
                data-required-amount="{{ number_format($item->item->price, 2) }}"
                data-current-balance="{{ number_format($userBalance, 2) }}"
                data-shortage="{{ number_format($item->item->price - $userBalance, 2) }}"
                data-has-sufficient="{{ $userBalance >= $item->item->price ? 'true' : 'false' }}">
                {{ $userBalance < $item->item->price ? 'Insufficient Balance' : 'Submit' }}
            </button>
        @endif
    </div>
</div> 