@extends('admin.layouts.app')

@section('title', 'Deposite List')

@section('content')
<div class="bg-white rounded-lg shadow p-6 mb-8">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Deposite Management</h2>
        <form method="GET" action="" class="flex items-center space-x-2">
            <input type="text" name="search" value="{{ request('search') }}" class="border rounded px-3 py-1" placeholder="Search by username or contact number">
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
                    <th class="px-4 py-2">Chain Type</th>
                    <th class="px-4 py-2">Screenshot</th>
                    <th class="px-4 py-2"><a href="?sort=contact_number&direction={{ request('direction', 'asc') === 'asc' ? 'desc' : 'asc' }}">Contact Number</a></th>
                    <th class="px-4 py-2"><a href="?sort=created_at&direction={{ request('direction', 'asc') === 'asc' ? 'desc' : 'asc' }}">Created At</a></th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deposits as $deposit)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $deposit->id }}</td>
                    <td class="px-4 py-2">{{ $deposit->user->username ?? '' }}</td>
                    <td class="px-4 py-2">{{ $deposit->amount }}</td>
                    <td class="px-4 py-2">{{ $deposit->chain_type ?? '-' }}</td>
                    <td class="px-4 py-2">
                        @if($deposit->payment_screenshot)
                            <a href="{{ asset('storage/' . $deposit->payment_screenshot) }}" target="_blank">
                                <img src="{{ asset('storage/' . $deposit->payment_screenshot) }}" alt="Screenshot" class="w-12 h-12 object-cover rounded border" />
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $deposit->contact_number }}</td>
                    <td class="px-4 py-2">{{ $deposit->created_at }}</td>
                    <td class="px-4 py-2">
                        <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                            {{ $deposit->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($deposit->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        @if($deposit->status == 'pending')
                            <form method="POST" action="{{ route('admin.deposite.approve', $deposit->id) }}" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold mr-1">Approve</button>
                            </form>
                            <form method="POST" action="{{ route('admin.deposite.reject', $deposit->id) }}" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold">Reject</button>
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
            {{ $deposits->links() }}
        </div>
    </div>
</div>
@endsection 