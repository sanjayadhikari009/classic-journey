<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\AppSetting;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required',
        ]);

        $login = $request->input('login');
        $password = $request->input('password');
        $isAdminLogin = $request->has('admin_login'); // Add a checkbox named admin_login to the login form for admin login
        
        // Determine if login is email or username
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        $credentials = [
            $field => $login,
            'password' => $password
        ];

        // If admin login, require is_admin = true
        if ($isAdminLogin) {
            $credentials['is_admin'] = true;
        }

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            
            // Update last login
            Auth::user()->update(['last_login_at' => now()]);
            
            // Redirect admin to admin dashboard, others to home
            if (Auth::user()->is_admin) {
                return redirect()->intended(route('admin.dashboard'));
            }
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.' . ($isAdminLogin ? ' (Admin login required for this account)' : ''),
        ])->onlyInput('login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|string|max:20',

            'password' => 'required|string|min:8|confirmed',
            'referral_code' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!\App\Models\User::whereRaw('LOWER(referral_code) = ?', [strtolower($value)])->exists()) {
                        $fail('The selected referral code is invalid.');
                    }
                }
            ],
        ]);

        // Find referrer if referral code provided (optional, do not error if not found)
        $referralBy = null;
        $referrer = null;
        if ($request->referral_code) {
            $referrer = \App\Models\User::whereRaw('LOWER(referral_code) = ?', [strtolower($request->referral_code)])->first();
            if ($referrer) {
                $referralBy = $referrer->id;
            }
        }

        // Fetch signup bonus from app_settings
        $signupBonus = AppSetting::where('key', 'signup_bonus')->value('value') ?? 0.00;
        
        // Get journey allocation for Level 1
        $levelSetting = \App\Models\LevelSetting::where('level', 1)->first();
        $initialJourneys = $levelSetting ? $levelSetting->number_of_journey : 40;

        $user = User::create([
            'name' => $request->username,
            'username' => $request->username,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),

            'referral_code' => strtoupper(Str::random(6)),
            'referral_by' => $referralBy,
            'balance' => $signupBonus,
            'journey' => 0, // Start user with 0 completed journeys
            'maximum_journey' => $initialJourneys,
            'level' => 1,
            'commission' => 0,
            'last_login_at' => now(),
        ]);

        // Reward the referrer with commission if applicable
        if ($referrer) {
            $commission = 10.00; // Fixed $10 referral bonus
            $referrer->commission += $commission;
            $referrer->balance += $commission;
            $referrer->save();
        }

        Auth::login($user);

        $successMsg = 'Welcome! Your account has been created successfully.';
        if ($referrer) {
            $successMsg .= ' You used a referral code and your referrer has received a $10 bonus!';
        }
        return redirect()->intended(route('home'))->with('success', $successMsg);

        // return redirect()->route('user.dashboard')->with('success', $successMsg);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // This would typically send a password reset email
        // For now, we'll just redirect with a message
        return back()->with('success', 'If an account with that email exists, we have sent a password reset link.');
    }

    public function showResetPassword($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // This would typically validate the token and reset the password
        // For now, we'll just redirect with a message
        return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
    }
} 