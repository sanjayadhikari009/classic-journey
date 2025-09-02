@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="bg-white rounded-lg shadow p-6 mb-8">
    <h2 class="text-2xl font-semibold mb-6">Add Product</h2>
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" class="form-input w-full border border-gray-300 rounded px-3 py-2" required>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block mb-1 font-medium">Price ($)</label>
                <input type="number" step="0.01" name="price" id="price" class="form-input w-full border border-gray-300 rounded px-3 py-2" required onchange="calculateTotal()" onkeyup="calculateTotal()">
            </div>
            <div>
                <label class="block mb-1 font-medium">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-input w-full border border-gray-300 rounded px-3 py-2" value="1" min="1" onchange="calculateTotal()" onkeyup="calculateTotal()">
            </div>
        </div>
        <div class="mb-4 bg-gray-50 p-3 rounded">
            <label class="block mb-1 font-medium text-gray-600">Total Amount</label>
            <div class="text-2xl font-bold text-green-600" id="totalAmount">$0.00</div>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" class="form-input w-full border border-gray-300 rounded px-3 py-2" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Image</label>
            <input type="file" name="image" class="form-input w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Add Product</button>
        </div>
    </form>
</div>

<script>
function calculateTotal() {
    const price = parseFloat(document.getElementById('price').value) || 0;
    const quantity = parseInt(document.getElementById('quantity').value) || 0;
    const total = price * quantity;
    document.getElementById('totalAmount').textContent = '$' + total.toFixed(2);
}

// Calculate total on page load
document.addEventListener('DOMContentLoaded', function() {
    calculateTotal();
});
</script>
@endsection 