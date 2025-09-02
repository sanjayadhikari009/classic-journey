<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposite;
use App\Models\Withdraw;
use App\Models\Product;
use App\Models\UserOrder;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrderCount = UserOrder::count();
        $totalOrders = UserOrder::sum('amount');
        $totalDeposits = Deposite::sum('amount');
        $totalRecharge = $totalDeposits; // alias for clarity
        $totalWithdrawals = Withdraw::sum('amount');
        $totalUserBalance = User::sum('balance');
        $totalCommission = User::sum('commission');

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'totalOrderCount' => $totalOrderCount,
            'totalOrders' => $totalOrders,
            'totalDeposits' => $totalDeposits,
            'totalRecharge' => $totalRecharge,
            'totalWithdrawals' => $totalWithdrawals,
            'totalUserBalance' => $totalUserBalance,
            'totalCommission' => $totalCommission,
        ]);
    }
} 