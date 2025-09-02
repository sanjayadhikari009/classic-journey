@extends('admin.layouts.app')

@section('title', 'withdraw List')

@section('content')
<div class="bg-white rounded-lg shadow p-6 mb-8">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Withdraw Management</h2>
        <form method="GET" action="" class="flex items-center space-x-2">
            <input type="text" name="search" value="{{ request('search') }}" class="border rounded px-3 py-1" placeholder="Search by username or bank card">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-1 rounded">Search</button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 sticky top-0">
                <tr>
                    <th class="px-4 py-2"><a href="?sort=id&direction={{ request('direction', 'asc') === 'asc' ? 'desc' : 'asc' }}">Id</a></th>
                    <th class="px-4 py-2"><a href="?sort=username&direction={{ request('direction', 'asc') === 'asc' ? 'desc' : 'asc' }}">Username</a></th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Actual Arrival</th>
                    <th class="px-4 py-2">Chain Type</th>
                    <th class="px-4 py-2"><a href="?sort=bank_card_number&direction={{ request('direction', 'asc') === 'asc' ? 'desc' : 'asc' }}">Bank Card Number</a></th>
                    <th class="px-4 py-2">Contact Number</th>
                    <th class="px-4 py-2"><a href="?sort=created_at&direction={{ request('direction', 'asc') === 'asc' ? 'desc' : 'asc' }}">Created At</a></th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdraws as $withdraw)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $withdraw->id }}</td>
                    <td class="px-4 py-2">{{ $withdraw->username }}</td>
                    <td class="px-4 py-2">{{ $withdraw->amount }}</td>
                    <td class="px-4 py-2">{{ $withdraw->actual_arrival }}</td>
                    <td class="px-4 py-2">{{ $withdraw->chain_type }}</td>
                    <td class="px-4 py-2">{{ $withdraw->bank_card_number }}</td>
                    <td class="px-4 py-2">{{ $withdraw->contact_number }}</td>
                    <td class="px-4 py-2">{{ $withdraw->created_at->format('M d, Y h:i A') }}</td>
                    <td class="px-4 py-2">
                        <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                            {{ $withdraw->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($withdraw->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        @if($withdraw->status == 'pending')
                            <form method="POST" action="{{ route('admin.withdraw.approve', $withdraw->id) }}" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:text-blue-700" title="Approve">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.withdraw.reject', $withdraw->id) }}" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Reject">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        @else
                            <span class="text-gray-500">-</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $withdraws->links() }}
        </div>
    </div>
</div>
@endsection 