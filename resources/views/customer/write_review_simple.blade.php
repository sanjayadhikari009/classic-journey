@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Write Review</h1>
    
    @if(isset($noMoreProducts) && $noMoreProducts)
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold">No more products to review!</h2>
            <p>You have completed all available product reviews.</p>
        </div>
    @elseif(isset($product) && $product)
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
            <p>Price: ${{ $product->price }}</p>
            
            <form method="POST" action="{{ route('user.customer.store_review') }}" class="mt-4">
                @csrf
                <input type="hidden" name="type" value="product">
                <input type="hidden" name="item_id" value="{{ $product->id }}">
                <input type="hidden" name="rating" value="5">
                
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Submit Review
                </button>
            </form>
        </div>
    @else
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold">No products available</h2>
            <p>Please contact support.</p>
        </div>
    @endif
</div>
@endsection 