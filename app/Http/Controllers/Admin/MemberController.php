<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->username) {
            $query->where('username', 'like', "%{$request->username}%");
        }
        if ($request->mobile_number) {
            $query->where('mobile_number', 'like', "%{$request->mobile_number}%");
        }
        if ($request->registration_date) {
            $query->whereDate('created_at', $request->registration_date);
        }
        $sortable = ['id','username','balance','journey','maximum_journey','level','commission','referral_by','mobile_number','referral_code','last_login_at'];
        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'desc');
        if (!in_array($sort, $sortable)) {
            $sort = 'id';
        }
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }
        $members = $query->orderBy($sort, $direction)->paginate(10)->appends($request->all());
        $referrals = User::select('id', 'username', 'referral_code')->get();
        $levels = \App\Models\LevelSetting::orderBy('level')->get();
        return view('admin.members', [
            'active' => 'role',
            'members' => $members,
            'referrals' => $referrals,
            'levels' => $levels,
        ]);
    }

    public function create()
    {
        $referrals = User::select('id', 'username', 'referral_code')->get();
        $levels = \App\Models\LevelSetting::orderBy('level')->get();
        return view('admin.members_create', compact('referrals', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required',
            'password' => 'required',

            'referral_code' => 'nullable|string|unique:users,referral_code',
            'referral_by' => 'nullable|exists:users,id',
            'level' => 'nullable|integer',
        ]);
        // Always generate a unique referral code
        $referralCode = $request->referral_code ?: strtoupper(Str::random(6));
        while (User::where('referral_code', $referralCode)->exists()) {
            $referralCode = strtoupper(Str::random(6));
        }
        $user = User::create([
            'name' => $request->username,
            'username' => $request->username,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),

            'referral_code' => $referralCode,
            'referral_by' => $request->referral_by,
            'level' => $request->level,
            // Add other fields as needed
        ]);
        $referralMsg = '';
        if ($request->referral_by) {
            $referrer = User::find($request->referral_by);
            if ($referrer) {
                $referrer->commission += 10.00;
                $referrer->balance += 10.00;
                $referrer->save();
                $referralMsg = ' Referrer has received a $10 bonus!';
            }
        }
        return redirect()->route('admin.admin.members.index')->with('success', 'Member added successfully.' . $referralMsg);
    }

    public function edit($id)
    {
        $member = User::findOrFail($id);
        $referrals = User::select('id', 'username', 'referral_code')->get();
        $levels = \App\Models\LevelSetting::orderBy('level')->get();
        return view('admin.members_edit', compact('member', 'referrals', 'levels'));
    }

    public function update(Request $request, $id)
    {
        $member = User::findOrFail($id);
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'mobile_number' => 'required',
            'referral_code' => 'nullable|string|unique:users,referral_code,' . $id,
            'referral_by' => 'nullable|exists:users,id',
            'level' => 'nullable|integer',
        ]);
        $member->username = $request->username;
        $member->mobile_number = $request->mobile_number;
        if ($request->password) {
            $member->password = Hash::make($request->password);
        }

        if ($request->referral_code) {
            $member->referral_code = $request->referral_code;
        }
        $member->referral_by = $request->referral_by;
        $member->level = $request->level;
        // Update other fields as needed
        $member->save();
        return redirect()->route('admin.admin.members.index')->with('success', 'Member updated successfully');
    }

    public function destroy($id)
    {
        $member = User::findOrFail($id);
        $member->delete();
        return redirect()->route('admin.admin.members.index')->with('success', 'Member deleted successfully');
    }

    public function show($id, Request $request)
    {
        $member = User::findOrFail($id);
        $referrals = User::select('id', 'username', 'referral_code')->get();
        $order = $member->order;
        $lockedItems = collect();
        $lockedIds = [];
        if ($order && is_array($order->locked_journeys)) {
            $lockedIds = $order->locked_journeys;
            foreach ($order->locked_journeys as $lockedId) {
                $product = \App\Models\Product::find($lockedId);
                if ($product) {
                    $lockedItems->push((object)[
                        'type' => 'Product',
                        'item' => $product
                    ]);
                }
            }
        }
        $allProductsQuery = \App\Models\Product::query();
        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');
        if ($minPrice !== null && $minPrice !== '') {
            $allProductsQuery->where('price', '>=', $minPrice);
        }
        if ($maxPrice !== null && $maxPrice !== '') {
            $allProductsQuery->where('price', '<=', $maxPrice);
        }
        $allProducts = $allProductsQuery->get();
        $levelStop = $member->level_stop;
        // Get product IDs already reviewed by this user
        $alreadyReviewedProductIds = $member->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
        return view('admin.members_show', compact('member', 'referrals', 'lockedItems', 'allProducts', 'lockedIds', 'minPrice', 'maxPrice', 'levelStop', 'alreadyReviewedProductIds'));
    }

    public function updateLockedProducts(Request $request, $id)
    {
        $member = User::findOrFail($id);
        $locked_journeys = $request->input('locked_journeys', []);

        // Prevent locking products already reviewed
        $alreadyReviewedProductIds = $member->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
        $invalidSelections = array_intersect($locked_journeys, $alreadyReviewedProductIds);
        if (!empty($invalidSelections)) {
            return redirect()->back()->with('error', 'Some selected products have already been reviewed by this user and cannot be locked again.');
        }

        // Create or update the order with locked journeys
        $member->order()->updateOrCreate(
            ['user_id' => $member->id],
            ['locked_journeys' => $locked_journeys]
        );

        $productCount = count($locked_journeys);
        $message = $productCount > 0 
            ? "Successfully locked {$productCount} product(s) for this user." 
            : "All product locks removed for this user.";

        return redirect()->route('admin.admin.members.show', $id)->with('success', $message);
    }

    public function adjustBalance(Request $request, User $user)
    {
        $request->validate([
            'type' => 'required|in:increase,deduct',
            'amount' => 'required|numeric|min:0.01',
        ]);
        $amount = $request->amount;
        if ($request->type === 'increase') {
            $user->balance += $amount;
        } else {
            $user->balance -= $amount;
        }
        $user->save();
        return back()->with('success', 'Balance updated successfully.');
    }

    public function updateBank(Request $request, User $user)
    {
        $request->validate([
            'chain_type' => 'required|in:ERC 20,TRC 20',
            'address' => 'required|string|max:255',
        ]);
        $user->bank()->updateOrCreate(
            ['user_id' => $user->id],
            ['chain_type' => $request->chain_type, 'address' => $request->address]
        );
        return redirect()->route('admin.deposite.user', $user->id)->with('success', 'Bank info updated.');
    }

    public function setupOrder(Request $request, User $user)
    {
        $request->validate([
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'locked_journeys' => 'nullable|array',
        ]);
        $user->order()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'min_price' => $request->min_price,
                'max_price' => $request->max_price,
                'locked_journeys' => $request->locked_journeys,
            ]
        );
        return back()->with('success', 'Order settings updated.');
    }

    public function updateLevelStop(Request $request, $id)
    {
        $request->validate([
            'level_stop' => 'nullable|integer|min:1',
        ]);
        $member = User::findOrFail($id);
        $member->level_stop = $request->input('level_stop');
        $member->save();
        return redirect()->route('admin.admin.members.show', $id)->with('success', 'Level stop/lock updated successfully.');
    }

    public function updateJourneyLock(Request $request, $id)
    {
        $member = User::findOrFail($id);
        $levelSetting = \App\Models\LevelSetting::where('level', $member->level)->first();
        $maxJourney = $levelSetting ? $levelSetting->number_of_journey : 40;
        $request->validate([
            'journey_lock_at' => 'nullable|integer|min:1|max:' . $maxJourney,
        ]);
        $member->journey_lock_at = $request->input('journey_lock_at');
        $member->save();
        $message = $request->input('journey_lock_at') 
            ? "Journey lock set at journey {$request->input('journey_lock_at')}. User will be locked when they reach journey " . ($request->input('journey_lock_at') - 1) . "."
            : "Journey lock removed for this user.";
        return redirect()->route('admin.admin.members.show', $id)->with('success', $message);
    }

    public function addProductsToJourney(Request $request, $id)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
        ]);
        
        $member = User::findOrFail($id);
        $order = $member->order;
        
        // Get current locked journeys
        $currentLockedJourneys = [];
        if ($order && is_array($order->locked_journeys)) {
            $currentLockedJourneys = $order->locked_journeys;
        }
        
        // Add new products to the journey
        $newLockedJourneys = array_unique(array_merge($currentLockedJourneys, $request->product_ids));
        
        // Create or update the order
        $member->order()->updateOrCreate(
            ['user_id' => $member->id],
            ['locked_journeys' => $newLockedJourneys]
        );
        
        $productCount = count($request->product_ids);
        return redirect()->route('admin.admin.members.show', $id)
            ->with('success', "Successfully added {$productCount} product(s) to user's journey.");
    }

    public function removeProductsFromJourney(Request $request, $id)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
        ]);
        
        $member = User::findOrFail($id);
        $order = $member->order;
        
        if ($order && is_array($order->locked_journeys)) {
            // Remove products from the journey
            $newLockedJourneys = array_diff($order->locked_journeys, $request->product_ids);
            
            $order->locked_journeys = array_values($newLockedJourneys);
            $order->save();
            
            $productCount = count($request->product_ids);
            return redirect()->route('admin.admin.members.show', $id)
                ->with('success', "Successfully removed {$productCount} product(s) from user's journey.");
        }
        
        return redirect()->route('admin.admin.members.show', $id)
            ->with('error', 'No journey found for this user.');
    }

    public function resetJourney(Request $request, $id)
    {
        try {
            $member = User::findOrFail($id);
            
            // Store original values for logging
            $originalLevel = $member->level;
            $originalJourney = $member->journey;
            $reviewCount = $member->reviews()->whereNotNull('product_id')->count();
            
            // Delete all product reviews for this user
            $member->reviews()->whereNotNull('product_id')->delete();
            
            // Reset journey progress
            $member->journey = 0;
            $member->level = 1;
            $member->save();
            
            // Reset order locked journeys if exists
            if ($member->order) {
                $member->order->locked_journeys = [];
                $member->order->save();
            }
            
            $message = "Journey reset successful! " .
                      "Level: {$originalLevel} → 1, " .
                      "Journey: {$originalJourney} → 0, " .
                      "Reviews deleted: {$reviewCount}";
            
            return redirect()->route('admin.admin.members.show', $id)
                ->with('success', $message);
                
        } catch (\Exception $e) {
            return redirect()->route('admin.admin.members.show', $id)
                ->with('error', 'Failed to reset journey: ' . $e->getMessage());
        }
    }
} 