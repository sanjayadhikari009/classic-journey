@extends('admin.layouts.app')

@section('title', 'Product List')

@section('content')
<div class="bg-white rounded-lg shadow p-6 mb-8 relative">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Product List</h2>
        <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add Product</a>
    </div>
    
    <!-- Filter Form -->
    <form method="GET" action="" class="mb-6 flex flex-wrap gap-2 items-center">
        <input type="text" name="product_id" placeholder="Product ID" value="{{ $filters['product_id'] ?? '' }}" class="border rounded px-2 py-1" style="width: 120px;">
        <input type="number" step="0.01" name="min_price" placeholder="Min Price" value="{{ $filters['min_price'] ?? '' }}" class="border rounded px-2 py-1" style="width: 120px;">
        <input type="number" step="0.01" name="max_price" placeholder="Max Price" value="{{ $filters['max_price'] ?? '' }}" class="border rounded px-2 py-1" style="width: 120px;">
        <select name="per_page" onchange="this.form.submit()" class="border rounded px-2 py-1">
            <option value="10" {{ ($filters['per_page'] ?? 10) == 10 ? 'selected' : '' }}>10</option>
            <option value="50" {{ ($filters['per_page'] ?? 10) == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ ($filters['per_page'] ?? 10) == 100 ? 'selected' : '' }}>100</option>
        </select>
        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Filter</button>
        <a href="{{ route('admin.products.index') }}" class="ml-2 text-gray-600 hover:underline">Reset</a>
    </form>
    
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-50 p-4 rounded-lg">
            <div class="text-sm text-blue-600 font-medium">Total Products</div>
            <div class="text-2xl font-bold text-blue-800">{{ $totalProducts }}</div>
        </div>
        <div class="bg-green-50 p-4 rounded-lg">
            <div class="text-sm text-green-600 font-medium">Total Quantity</div>
            <div class="text-2xl font-bold text-green-800">{{ $totalQuantity }}</div>
        </div>
        <div class="bg-purple-50 p-4 rounded-lg">
            <div class="text-sm text-purple-600 font-medium">Total Value</div>
            <div class="text-2xl font-bold text-purple-800">${{ number_format($totalValue, 2) }}</div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 sticky left-0 bg-gray-100 z-10">ProductID</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Total Amount</th>
                    <th class="px-4 py-2">Add Time</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 sticky left-0 bg-white z-10">{{ $product->id }}</td>
                    <td class="px-4 py-2">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Image" class="w-12 h-12 object-cover rounded">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">${{ number_format($product->price, 2) }}</td>
                    <td class="px-4 py-2">{{ $product->quantity ?? 0 }}</td>
                    <td class="px-4 py-2 font-semibold text-green-600">${{ number_format($product->total_amount, 2) }}</td>
                    <td class="px-4 py-2">{{ $product->created_at->format('M d, Y h:i A') }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900 mr-2"><i class="fa fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                {{ $products->links() }}
            </div>
            <a href="{{ route('admin.products.create') }}" class="bg-green-600 hover:bg-green-700 text-primary font-bold py-3 px-8 rounded-lg shadow text-lg text-center transition block md:inline-block w-full md:w-auto">+ Add Product</a>
        </div>
    </div>
</div>
@endsection 