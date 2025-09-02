<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;

class WithdrawController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Withdraw::with('user');

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%$search%")
                  ->orWhere('bank_card_number', 'like', "%$search%")
                  ->orWhere('contact_number', 'like', "%$search%")
                  ->orWhere('id', $search);
            });
        }

        // Sorting
        $sortable = ['id', 'username', 'bank_card_number', 'created_at'];
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');
        if (!in_array($sort, $sortable)) {
            $sort = 'id';
        }
        $query->orderBy($sort, $direction);

        $withdraws = $query->paginate(10)->appends($request->query());

        return view('admin.withdraw_list', compact('withdraws'));
    }

    public function userList($userId)
    {
        $withdraws = \App\Models\Withdraw::with('user')->where('user_id', $userId)->orderByDesc('created_at')->paginate(10);
        return view('admin.withdraw_list', compact('withdraws'));
    }

    public function updateStatus(Request $request, $id)
    {
        $withdraw = \App\Models\Withdraw::findOrFail($id);
        $withdraw->status = $request->status;
        $withdraw->save();
        return redirect()->route('admin.withdraw.user', $withdraw->user_id)->with('success', 'Withdraw status updated.');
    }

    public function approve($id)
    {
        $withdraw = \App\Models\Withdraw::findOrFail($id);
        if ($withdraw->status !== 'complete') {
            $withdraw->status = 'complete';
            $withdraw->save();
        }
        return back()->with('success', 'Withdrawal approved.');
    }

    public function reject($id)
    {
        $withdraw = \App\Models\Withdraw::findOrFail($id);
        if ($withdraw->status !== 'rejected') {
            $withdraw->status = 'rejected';
            $withdraw->save();
        }
        return back()->with('success', 'Withdrawal rejected.');
    }
} 