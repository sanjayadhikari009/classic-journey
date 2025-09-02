@extends('admin.layouts.app')

@section('title', 'Members List')

@section('content')
<div x-data="{ 
    addMemberOpen: false, 
    balanceModalOpen: false, 
    bankModalOpen: false, 
    orderModalOpen: false, 
    selectedUser: null, 
    selectedUsername: '', 
    selectedUserId: null, 
    selectedChainType: '', 
    selectedBankAddress: '', 
    selectedMinPrice: '', 
    selectedMaxPrice: '', 
    selectedLockedJourneys: '',
}"
 x-effect="document.body.classList.toggle('overflow-hidden', addMemberOpen || balanceModalOpen || bankModalOpen || orderModalOpen)">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Members List</h1>
        <button @click="addMemberOpen = true" class="btn btn-secondary px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700 transition">Add Member</button>
    </div>
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded shadow text-center font-semibold">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded shadow text-center font-semibold">
            {{ $errors->first() }}
        </div>
    @endif
    <!-- Add Member Modal -->
    <div x-show="addMemberOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="min-height: 100vh;">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl p-8 relative animate-fade-in max-h-[90vh] overflow-y-auto flex flex-col justify-between">
            <button class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold" @click="addMemberOpen = false">&times;</button>
            <h2 class="text-2xl font-bold mb-6 text-center">Add Member</h2>
            <form method="POST" action="{{ route('admin.admin.members.store') }}" class="space-y-4 flex-1 flex flex-col justify-between">
                @csrf
                <div class="flex-1 space-y-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">User Name<span class="text-red-500">*</span></label>
                        <input name="username" type="text" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter user name" value="{{ old('username') }}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Email<span class="text-red-500">*</span></label>
                        <input name="email" type="email" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter email" value="{{ old('email') }}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Phone Number<span class="text-red-500">*</span></label>
                        <input name="mobile_number" type="text" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter phone number" value="{{ old('mobile_number') }}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Login Password<span class="text-red-500">*</span></label>
                        <input name="password" type="password" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter login password" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Transaction Password</label>
                        <input name="transaction_password" type="password" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter transaction password">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Select Referral</label>
                        <select name="referral_by" class="form-select w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Select User</option>
                            @foreach($referrals as $ref)
                                <option value="{{ $ref->id }}" @if(old('referral_by') == $ref->id) selected @endif>{{ $ref->referral_code }} - {{ $ref->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Level<span class="text-red-500">*</span></label>
                        <select name="level" id="level-select-modal" class="form-select w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Select Level</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->level }}" data-normal_commission="{{ $level->normal_commission }}" data-stop_commission="{{ $level->stop_commission }}" data-journey="{{ $level->number_of_journey }}" data-signup_bonus="{{ $level->signup_bonus }}" @if(old('level', 1) == $level->level) selected @endif>
                                    Level {{ $level->level }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-6" id="level-info-modal">
                    <!-- Dynamic level info will be shown here -->
                </div>
                <div class="flex justify-end gap-3 pt-4 sticky bottom-0 bg-white z-10">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">Submit</button>
                    <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-gray-400 transition" @click="addMemberOpen = false">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Plus/Deduction Modal -->
    <div x-show="balanceModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="min-height: 100vh;">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8 relative animate-fade-in">
            <button class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold" @click="balanceModalOpen = false">&times;</button>
            <h2 class="text-2xl font-bold mb-6 text-center">Plus Deduction</h2>
            <form method="POST" :action="'/admin/users/' + selectedUserId + '/balance'">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">User Name</label>
                    <input type="text" class="form-input w-full border border-gray-300 rounded px-3 py-2 bg-gray-100" :value="selectedUsername" readonly>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Increase</label>
                    <select name="type" class="form-select w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">Select</option>
                        <option value="increase">Increase</option>
                        <option value="deduct">Deduct</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Amount</label>
                    <input name="amount" type="number" step="0.01" min="0.01" class="form-input w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter Amount" required>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">Submit</button>
                    <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-gray-400 transition" @click="balanceModalOpen = false">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Bank Info Modal -->
    <div x-show="bankModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="min-height: 100vh;">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8 relative animate-fade-in">
            <button class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold" @click="bankModalOpen = false">&times;</button>
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Bank</h2>
            <form method="POST" :action="'/admin/users/' + selectedUserId + '/bank'">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Chain Type<span class='text-red-500'>*</span></label>
                    <select name="chain_type" class="form-select w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">Chain Type</option>
                        <option value="ERC 20">ERC 20</option>
                        <option value="TRC 20">TRC 20</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Address<span class='text-red-500'>*</span></label>
                    <input name="address" type="text" class="form-input w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter Address" required>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">Save Bank</button>
                    <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-gray-400 transition" @click="bankModalOpen = false">Cancel Edit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Order Setup Modal -->
    <div x-show="orderModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="min-height: 100vh;">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl p-8 relative animate-fade-in">
            <button class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold" @click="orderModalOpen = false">&times;</button>
            <h2 class="text-2xl font-bold mb-6 text-center">Set up order</h2>
            <form method="POST" :action="'/admin/users/' + selectedUserId + '/order'">
                @csrf
                <div class="mb-4"><strong>Balance :</strong> <span x-text="selectedBalance"></span></div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Min Price</label>
                        <input name="min_price" type="number" step="0.01" min="0" class="form-input w-full border border-gray-300 rounded px-3 py-2" placeholder="enter Min Price">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Max Price</label>
                        <input name="max_price" type="number" step="0.01" min="0" class="form-input w-full border border-gray-300 rounded px-3 py-2" placeholder="enter Max Price">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Lock Num Of journey</label>
                    <input name="locked_journeys[]" type="text" class="form-input w-full border border-gray-300 rounded px-3 py-2 mb-2" placeholder="Enter journey number (comma separated or multiple fields)">
                </div>
                <!-- Optionally, show current order settings here -->
                <div class="flex justify-end gap-3">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">Lock Journey</button>
                    <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-gray-400 transition" @click="orderModalOpen = false">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Search/Filter Form -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4" method="GET" action="{{ route('admin.admin.members.index') }}">
            <div>
                <label class="block text-sm font-medium">Enter User Name</label>
                <input name="username" type="text" class="form-input w-full border rounded px-3 py-2" placeholder="Enter user name" value="{{ request('username') }}">
            </div>
            <div>
                <label class="block text-sm font-medium">Enter Phone Number</label>
                <input name="mobile_number" type="text" class="form-input w-full border rounded px-3 py-2" placeholder="Enter phone number" value="{{ request('mobile_number') }}">
            </div>
            <div>
                <label class="block text-sm font-medium">Select Registration Date</label>
                <input name="registration_date" type="date" class="form-input w-full border rounded px-3 py-2" value="{{ request('registration_date') }}">
            </div>
            <div class="flex items-end">
                <button type="submit" class="btn btn-primary bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Search Data</button>
            </div>
        </form>
    </div>
    <!-- Members Table -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-sm">
                <thead>
                    <tr class="bg-gray-50">
                        @php
                            $fields = [
                                'id' => 'Id',
                                'username' => 'Username',
                                'email' => 'Email',
                                'balance' => 'Balance',
                                'journey' => 'Journey',
                                'maximum_journey' => 'Maximum Journey',
                                'level' => 'Level',
                                'commission' => 'Commission',
                                'referral_by' => 'Referral By',
                                'mobile_number' => 'Mobile number',
                                'referral_code' => 'Referral Code',
                                'last_login_at' => 'Last Login At',
                            ];
                            $currentSort = request('sort', 'id');
                            $currentDir = request('direction', 'desc');
                            $newDir = $currentDir === 'asc' ? 'desc' : 'asc';
                            $query = request()->except('sort', 'direction', 'page');
                        @endphp
                        @foreach($fields as $field => $label)
                            <th class="px-2 py-1 text-left font-semibold sticky top-0 bg-white z-10">
                                <a href="{{ route('admin.admin.members.index', array_merge($query, ['sort' => $field, 'direction' => $currentSort === $field ? $newDir : 'asc'])) }}"
                                   class="{{ $currentSort === $field ? 'underline font-bold' : '' }}">
                                    {{ $label }}
                                    @if($currentSort === $field)
                                        @if($currentDir === 'asc') ▲ @else ▼ @endif
                                    @endif
                                </a>
                            </th>
                        @endforeach
                        <th class="text-center w-32" title="Action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td class="px-2 py-2 text-center min-w-[40px]">{{ $member->id }}</td>
                            <td class="px-2 py-2 min-w-[100px]">{{ $member->username }}</td>
                            <td class="px-2 py-2 min-w-[160px] break-all">{{ $member->email }}</td>
                            <td class="px-2 py-2 min-w-[80px] text-right">{{ $member->balance }}</td>
                            <td class="px-2 py-2 min-w-[60px] text-center">{{ $member->journey }}</td>
                            <td class="px-2 py-2 min-w-[80px] text-center">{{ $member->maximum_journey }}</td>
                            <td class="px-2 py-2 min-w-[60px] text-center">{{ $member->level }}</td>
                            <td class="px-2 py-2 min-w-[80px] text-right">{{ $member->commission }}</td>
                            <td class="px-2 py-2 min-w-[100px] text-center">{{ $member->referral_by ? '- ' . optional($referrals->firstWhere('id', $member->referral_by))->username : '' }}</td>
                            <td class="px-2 py-2 min-w-[100px] break-all">{{ $member->mobile_number }}</td>
                            <td class="px-2 py-2 min-w-[100px] break-all">{{ $member->referral_code }}</td>
                            <td class="px-2 py-2 min-w-[120px] text-center">{{ $member->last_login_at }}</td>
                            <td class="px-2 py-2 text-center min-w-[120px]">
                                <!-- Lock Journey Button -->
                                <button type="button" class="btn-sm btn btn-outline-secondary" title="Lock journeys for this user"
                                    @click="orderModalOpen = true; selectedUserId = {{ $member->id }}; selectedUsername = '{{ addslashes($member->username) }}'; selectedBalance = '{{ $member->balance }}';">
                                    <i class="fa fa-lock"></i>
                                </button>
                                <!-- Existing action buttons -->
                                <a class="btn-sm btn btn-outline-secondary" href="{{ route('admin.admin.members.show', $member->id) }}" data-id="{{ $member->id }}" data-username="{{ addslashes($member->username) }}" title="Cart"><i class="fa fa-cart-plus"></i></a>
                                <button type="button" class="btn-sm btn btn-outline-warning incress-decress" title="Increase/Decrease"
                                    @click="balanceModalOpen = true; selectedUserId = {{ $member->id }}; selectedUsername = '{{ addslashes($member->username) }}';">
                                    <i class="fa fa-plus"></i>/<i class="fa fa-minus text-danger"></i>
                                </button>
                                <button type="button" class="btn-sm btn btn-outline-info" title="Bank"
                                    @click="bankModalOpen = true; selectedUserId = {{ $member->id }}; selectedUsername = '{{ addslashes($member->username) }}';">
                                    <i class="fa fa-piggy-bank"></i>
                                </button>
                                <button type="button" class="btn-sm btn btn-outline-primary" title="Order Setup"
                                    @click="orderModalOpen = true; selectedUserId = {{ $member->id }}; selectedUsername = '{{ addslashes($member->username) }}'; selectedBalance = '{{ $member->balance }}';">
                                    <i class="fa fa-cogs"></i>
                                </button>
                                <a class="btn-sm btn btn-outline-warning" href="{{ route('admin.withdraw.user', $member->id) }}" title="Withdraw"><i class="fa fa-rupee-sign"></i></a>
                                <a class="btn-sm btn btn-outline-success" href="{{ route('admin.deposite.user', $member->id) }}" title="Deposit"><i class="fa fa-file-invoice"></i></a>
                                <a class="btn-sm btn btn-outline-primary" href="{{ route('admin.admin.members.edit', $member->id) }}" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                <form method="POST" action="{{ route('admin.admin.members.destroy', $member->id) }}" accept-charset="UTF-8" id="delete-form-{{ $member->id }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-sm" title="Delete" onclick="if(confirm('Are You sure ?')){ this.closest('form').submit(); }"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $members->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 

@push('scripts')
<script>
    function updateLevelInfoModal() {
        var select = document.getElementById('level-select-modal');
        if (!select) return;
        var selected = select.options[select.selectedIndex];
        if (!selected.value) {
            document.getElementById('level-info-modal').innerHTML = '';
            return;
        }
        var html = `<div class='bg-gray-50 border border-gray-200 rounded p-3 mt-2'>
            <table class='min-w-full text-sm'>
                <tr><td class='font-semibold pr-2'>Normal Commission:</td><td><span class='text-indigo-700 font-bold'>${parseFloat(selected.getAttribute('data-normal_commission')).toFixed(2)}%</span></td></tr>
                <tr><td class='font-semibold pr-2'>Stop Commission:</td><td><span class='text-pink-700 font-bold'>${parseFloat(selected.getAttribute('data-stop_commission')).toFixed(2)}%</span></td></tr>
                <tr><td class='font-semibold pr-2'>Journeys:</td><td><span class='text-green-700 font-bold'>${selected.getAttribute('data-journey')}</span></td></tr>
                <tr><td class='font-semibold pr-2'>Signup Bonus:</td><td><span class='text-yellow-700 font-bold'>$${parseFloat(selected.getAttribute('data-signup_bonus')).toFixed(2)}</span></td></tr>
            </table>
        </div>`;
        document.getElementById('level-info-modal').innerHTML = html;
    }
    document.addEventListener('DOMContentLoaded', function() {
        var select = document.getElementById('level-select-modal');
        if (select) {
            select.addEventListener('change', updateLevelInfoModal);
            updateLevelInfoModal();
        }
    });
</script>
@endpush 