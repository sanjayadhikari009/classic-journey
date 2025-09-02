<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposite;

class DepositeController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Deposite::with('user');

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('username', 'like', "%$search%")
                       ->orWhere('email', 'like', "%$search%")
                       ->orWhere('id', $search);
                })
                ->orWhere('contact_number', 'like', "%$search%")
                ->orWhere('id', $search);
            });
        }

        // Sorting
        $sortable = ['id', 'username', 'contact_number', 'created_at'];
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');
        if (!in_array($sort, $sortable)) {
            $sort = 'id';
        }
        if ($sort === 'username') {
            $query->join('users', 'deposits.user_id', '=', 'users.id')
                  ->orderBy('users.username', $direction)
                  ->select('deposits.*');
        } else {
            $query->orderBy($sort, $direction);
        }

        $deposits = $query->paginate(10)->appends($request->query());

        return view('admin.deposite_list', compact('deposits'));
    }

    public function userList($userId)
    {
        $deposits = \App\Models\Deposite::with('user')->where('user_id', $userId)->orderByDesc('created_at')->paginate(10);
        return view('admin.deposite_list', compact('deposits'));
    }

    public function updateStatus(Request $request, $id)
    {
        $deposit = \App\Models\Deposite::findOrFail($id);
        $deposit->status = $request->status;
        $deposit->save();
        return redirect()->route('admin.deposite.user', $deposit->user_id)->with('success', 'Deposite status updated.');
    }

    public function approve($id)
    {
        $deposit = \App\Models\Deposite::findOrFail($id);
        if ($deposit->status !== 'complete') {
            $user = $deposit->user;
            // Only add to balance if not already applied
            $totalDeducted = $user->reviews()->whereNotNull('product_id')->sum('amount_paid');
            $user->balance = floatval($user->balance) + floatval($deposit->amount) + floatval($totalDeducted);
            $user->save();
            // Reset all amount_paid in reviews to 0 so it's not double-counted
            $user->reviews()->whereNotNull('product_id')->where('amount_paid', '>', 0)->update(['amount_paid' => 0]);
            $deposit->status = 'complete';
            $deposit->save();
        }
        return back()->with('success', 'Recharge approved and balance updated.');
    }

    public function reject($id)
    {
        $deposit = \App\Models\Deposite::findOrFail($id);
        if ($deposit->status !== 'rejected') {
            $deposit->status = 'rejected';
            $deposit->save();
        }
        return back()->with('success', 'Recharge rejected.');
    }
} 