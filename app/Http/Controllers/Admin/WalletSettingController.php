<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppSetting;

class WalletSettingController extends Controller
{
    public function index()
    {
        $wallet_erc20_address = \App\Models\AppSetting::where('key', 'wallet_erc20_address')->value('value');
        $wallet_erc20_qr = \App\Models\AppSetting::where('key', 'wallet_erc20_qr')->value('value');
        $wallet_trc20_address = \App\Models\AppSetting::where('key', 'wallet_trc20_address')->value('value');
        $wallet_trc20_qr = \App\Models\AppSetting::where('key', 'wallet_trc20_qr')->value('value');
        $wallet_bep20_address = \App\Models\AppSetting::where('key', 'wallet_bep20_address')->value('value');
        $wallet_bep20_qr = \App\Models\AppSetting::where('key', 'wallet_bep20_qr')->value('value');
        return view('admin.wallet_settings', compact('wallet_erc20_address', 'wallet_erc20_qr', 'wallet_trc20_address', 'wallet_trc20_qr', 'wallet_bep20_address', 'wallet_bep20_qr'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'wallet_erc20_address' => 'nullable|string|max:255',
            'wallet_trc20_address' => 'nullable|string|max:255',
            'wallet_bep20_address' => 'nullable|string|max:255',
            'wallet_erc20_qr' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'wallet_trc20_qr' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'wallet_bep20_qr' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save addresses
        \App\Models\AppSetting::updateOrCreate(['key' => 'wallet_erc20_address'], ['value' => $data['wallet_erc20_address'] ?? '']);
        \App\Models\AppSetting::updateOrCreate(['key' => 'wallet_trc20_address'], ['value' => $data['wallet_trc20_address'] ?? '']);
        \App\Models\AppSetting::updateOrCreate(['key' => 'wallet_bep20_address'], ['value' => $data['wallet_bep20_address'] ?? '']);

        // Save QR images if uploaded
        if ($request->hasFile('wallet_erc20_qr')) {
            $path = $request->file('wallet_erc20_qr')->store('wallet_qr', 'public');
            \App\Models\AppSetting::updateOrCreate(['key' => 'wallet_erc20_qr'], ['value' => $path]);
        }
        if ($request->hasFile('wallet_trc20_qr')) {
            $path = $request->file('wallet_trc20_qr')->store('wallet_qr', 'public');
            \App\Models\AppSetting::updateOrCreate(['key' => 'wallet_trc20_qr'], ['value' => $path]);
        }
        if ($request->hasFile('wallet_bep20_qr')) {
            $path = $request->file('wallet_bep20_qr')->store('wallet_qr', 'public');
            \App\Models\AppSetting::updateOrCreate(['key' => 'wallet_bep20_qr'], ['value' => $path]);
        }

        return redirect()->route('admin.wallet.settings')->with('success', 'Wallet settings updated successfully.');
    }
}
