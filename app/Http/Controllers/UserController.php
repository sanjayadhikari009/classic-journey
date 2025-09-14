<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserOrder;
use App\Models\Deposite;
use App\Models\Withdraw;
use App\Models\Product;
use App\Models\Review;
use App\Models\LevelSetting;
use App\Services\ProductLockingService;

class UserController extends Controller
{
    protected $lockingService;
    
    public function __construct(ProductLockingService $lockingService)
    {
        $this->lockingService = $lockingService;
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $totalReviews = $user->reviews()->whereNotNull('product_id')->count();
        $totalCommission = $user->reviews()->whereNotNull('product_id')->where('status', 'approved')->sum('commission_earned');
        $userLevel = $user->level ?? 1;
        $levelSetting = LevelSetting::where('level', $userLevel)->first();
        $journeyLimit = $levelSetting ? $levelSetting->number_of_journey : 40;
        
        // Calculate completed journeys: Total allocation - remaining journeys
        $remainingJourneys = $user->journey ?? 0;
        $completedJourneys = $journeyLimit - $remainingJourneys;
        $progressPercentage = min(($completedJourneys / $journeyLimit) * 100, 100);
        
        // Get accessible products using new service
        $accessibleProducts = $this->lockingService->getAccessibleProducts($user);
        $reviewedProductIds = $user->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
        $remainingProducts = $accessibleProducts->whereNotIn('id', $reviewedProductIds)->count();

        return view('user.dashboard', compact(
            'totalReviews', 'totalCommission', 'userLevel', 'journeyLimit', 
            'completedJourneys', 'progressPercentage', 'remainingProducts'
        ));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile_number' => 'required|string|max:20',
            'username' => 'required|string|unique:users,username,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'username' => $request->username,
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password changed successfully!');
    }

    public function bookings()
    {
        $user = Auth::user();
        $bookings = UserOrder::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('user.bookings', compact('bookings'));
    }

    public function bookingDetail($id)
    {
        $user = Auth::user();
        $booking = UserOrder::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();
            
        return view('user.booking-detail', compact('booking'));
    }

    public function favorites()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->with('trip')->paginate(10);
        
        return view('user.favorites', compact('favorites'));
    }

    public function toggleFavorite(Request $request, $tripId)
    {
        $user = Auth::user();
        $favorite = $user->favorites()->where('trip_id', $tripId)->first();
        
        if ($favorite) {
            $favorite->delete();
            return response()->json(['success' => true, 'action' => 'removed']);
        } else {
            $user->favorites()->create(['trip_id' => $tripId]);
            return response()->json(['success' => true, 'action' => 'added']);
        }
    }

    public function reviews()
    {
        $user = Auth::user();
        $reviews = $user->reviews()->with('trip')->latest()->paginate(10);
        
        return view('user.reviews', compact('reviews'));
    }

    public function customerreviews()
    {
        $user = Auth::user();
        $reviews = $user->reviews()->with('trip')->latest()->paginate(10);
        return view('user.reviews', compact('reviews'));
    }

    public function customerwithdraw()
    {
        $user = Auth::user();
        // Only completed journeys are withdrawable
        $withdrawableEarnings = $user->orders()->where('status', 'completed')->sum('reward_earned');
        // Add product review commissions (only approved reviews)
        $approvedProductReviews = $user->reviews()->whereNotNull('product_id')->where('status', 'approved')->get();
        $productCommission = $approvedProductReviews->sum(function($review) {
            return self::getReviewCommission(optional($review->product)->price ?? 0);
        });
        // Sidebar commission logic (sum of commission_earned from approved product reviews)
        $sidebarCommission = $user->reviews()->whereNotNull('product_id')->where('status', 'approved')->sum('commission_earned');
        $withdrawableEarnings += $productCommission;
        // Add referral commission (kept in separate commission field for referrals)
        $withdrawableEarnings += $user->commission ?? 0;
        return view('user.withdraw', compact('withdrawableEarnings', 'sidebarCommission'));
    }


    public function customerRecharge(Request $request)
    {
        $user = auth()->user();
        $totalRecharged = \App\Models\Deposite::where('user_id', $user->id)->where('status', 'complete')->sum('amount');
        $totalDeducted = $user->reviews()->whereNotNull('product_id')->sum('amount_paid');
        $totalCommission = $user->reviews()->whereNotNull('product_id')->sum('commission_earned');
        $totalBalance = $totalRecharged + $totalCommission - $totalDeducted;

        // Wallet addresses and QR codes
        $erc20_address = \App\Models\AppSetting::where('key', 'wallet_erc20_address')->value('value');
        $erc20_qr = \App\Models\AppSetting::where('key', 'wallet_erc20_qr')->value('value');
        $trc20_address = \App\Models\AppSetting::where('key', 'wallet_trc20_address')->value('value');
        $trc20_qr = \App\Models\AppSetting::where('key', 'wallet_trc20_qr')->value('value');
        $bep20_address = \App\Models\AppSetting::where('key', 'wallet_bep20_address')->value('value');
        $bep20_qr = \App\Models\AppSetting::where('key', 'wallet_bep20_qr')->value('value');

        // Filters
        $query = \App\Models\Deposite::where('user_id', $user->id)->where('status', 'complete');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $minAmount = $request->input('min_amount');
        $maxAmount = $request->input('max_amount');
        $status = $request->input('status');
        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }
        if ($minAmount) {
            $query->where('amount', '>=', $minAmount);
        }
        if ($maxAmount) {
            $query->where('amount', '<=', $maxAmount);
        }
        if ($status) {
            $query->where('status', $status);
        }
        $rechargeHistory = $query->orderByDesc('created_at')->paginate(10)->appends($request->all());

        return view('customer.customer_recharge', compact(
            'user', 'totalRecharged', 'totalDeducted', 'totalCommission', 'totalBalance',
            'rechargeHistory', 'startDate', 'endDate', 'minAmount', 'maxAmount', 'status',
            'erc20_address', 'erc20_qr', 'trc20_address', 'trc20_qr', 'bep20_address', 'bep20_qr'
        ));
    }

    public function customerhistory()
    {
        $user = Auth::user();
        
        // Get user's order to check for admin-assigned locked products
        $order = $user->order;
        $adminLockedProductIds = $order ? $order->getActiveLockedJourneys() : [];
        
        // Get only products that have been reviewed or are admin-assigned
        $reviewedProductIds = $user->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
        
        $historyAll = collect();
        $userBalance = $user->balance ?? 0;
        
        // 1. Add products that have been reviewed
        if (!empty($reviewedProductIds)) {
            $reviewedProducts = \App\Models\Product::whereIn('id', $reviewedProductIds)->get();
            foreach ($reviewedProducts as $product) {
            $review = $user->reviews()->where('product_id', $product->id)->first();
            
                // Determine status based on payment and review completion
                if ($review->status === 'approved') {
                    $status = 'completed'; // User paid and completed review
                } else {
                    // Check if user actually paid for this product (amount_paid > 0)
                    if ($review->amount_paid > 0) {
                        $status = 'pending'; // User paid but hasn't completed review yet
                    } else {
                        continue; // Skip products without payment
                    }
            }
            
            $historyAll->push((object)[
                'type' => 'product',
                'item' => $product,
                'order' => null,
                'review' => $review,
                    'locked' => false,
                'status' => $status,
                    'is_admin_locked' => false,
                    'has_sufficient_balance' => true,
                    'balance_deficit' => 0
                ]);
            }
        }
        
        // 2. Add admin-assigned locked products (if any) - ONLY if user has reached the journey lock point
        $hasReachedLockPoint = false;
        if ($user->journey_lock_at && ($user->journey + 1) >= $user->journey_lock_at) {
            $hasReachedLockPoint = true;
        }
        
        if (!empty($adminLockedProductIds) && $hasReachedLockPoint) {
            $adminProducts = \App\Models\Product::whereIn('id', $adminLockedProductIds)
                ->whereNotIn('id', $reviewedProductIds) // Don't duplicate reviewed products
                ->get();
            
            foreach ($adminProducts as $product) {
                $historyAll->push((object)[
                    'type' => 'product',
                    'item' => $product,
                    'order' => null,
                    'review' => null,
                    'locked' => true,
                    'status' => 'pending', // Show as pending instead of on_hold
                    'is_admin_locked' => true,
                    'has_sufficient_balance' => $userBalance >= $product->price,
                    'balance_deficit' => max(0, $product->price - $userBalance)
                ]);
            }
        }
        
        // Sort by review creation date in descending order (most recent first)
        $historyAll = $historyAll->sortBy(function($item) {
            // For items with reviews, use review creation date
            if ($item->review) {
                return $item->review->created_at->timestamp * -1; // Multiply by -1 for descending order
            }
            // For items without reviews (locked products), use current timestamp to show at top
            return time() * -1;
        })->values();
        
        // Handle all the logic here instead of in the view
        $tab = request('tab', 'all');
        $tabs = [
            'all' => 'All',
            'pending' => 'Pending', 
            'completed' => 'Completed',
        ];
        
        // Calculate total commission from all approved reviews (dynamic from database)
        $totalCommission = $user->reviews()
            ->whereNotNull('product_id')
            ->where('status', 'approved')
            ->sum('commission_earned');
        
        // Filter items based on tab
        $filtered = $historyAll->filter(function($item) use ($tab) {
            if ($tab === 'all') return true;
            return $item->status === $tab;
        });
        
        // Count records for each tab (dynamic)
        $recordCounts = [
            'all' => $historyAll->count(),
            'pending' => $historyAll->where('status', 'pending')->count(),
            'completed' => $historyAll->where('status', 'completed')->count(),
        ];

        return view('customer.history', [
            'historyAll' => $historyAll,
            'tab' => $tab,
            'tabs' => $tabs,
            'totalCommission' => $totalCommission,
            'filtered' => $filtered,
            'userBalance' => $userBalance,
            'recordCounts' => $recordCounts,
            'adminLockedProductIds' => $adminLockedProductIds,
        ]);
    }

    public function customerWriteReview(Request $request)
    {
        $user = Auth::user();
        $trip = null;
        
        // Check if user's account balance is negative - block access and redirect back
        $currentBalance = $user->balance ?? 0;
        $hasNegativeBalance = $currentBalance < 0;
        
        if ($hasNegativeBalance) {
            return redirect()->route('user.rate_trip')
                ->with('error', 'Error ! Unable to proceed due to insufficient balance.');
        }
        
        // Check if user has reached journey lock point and has pending locked products
        $order = $user->order;
        $adminLockedProductIds = $order ? $order->getActiveLockedJourneys() : [];
        
        // Check if user has reached the journey lock point
        $hasReachedLockPoint = false;
        /**
         * Lock triggers when the *next* journey equals the lock number.
         * e.g. journey = 15, lock_at = 16 → user is about to start Journey 16.
         */
        if ($user->journey_lock_at && ($user->journey + 1) >= $user->journey_lock_at) {
            $hasReachedLockPoint = true;
        }
        
        if (!empty($adminLockedProductIds) && $hasReachedLockPoint) {
            $reviewedProductIds = $user->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
            $pendingLockedProducts = \App\Models\Product::whereIn('id', $adminLockedProductIds)
                                   ->whereNotIn('id', $reviewedProductIds)
                                   ->get();
            \Log::info('DEBUG: At lock point in customerWriteReview', [
                'user_id' => $user->id,
                'journey' => $user->journey,
                'journey_lock_at' => $user->journey_lock_at,
                'pending_locked_products' => $pendingLockedProducts->pluck('id')->toArray()
            ]);
            
            if ($pendingLockedProducts->count() > 0) {
                // User has pending locked products - show validation message and redirect to history
                return redirect()->route('user.customer.history')
                    ->with('error', 'You have reached journey lock point. First complete all locked journey for proceeding journey');
            }
        }
        
        // Check if user has any journeys left - if journey count is 0 or negative, auto-reset if they have balance
        $currentJourney = $user->journey ?? 0;
        $userLevel = $user->level ?? 1;
        $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
        $journeyLimit = $levelSetting ? $levelSetting->number_of_journey : 40;
        if ($currentJourney >= $journeyLimit) {
            return redirect()->route('user.rate_trip')->with('error', 'You have reached the maximum number of journeys for your current level. Please upgrade your level to continue.');
        }
        if ($currentJourney <= 0) {
            // If user has balance, they should be able to continue - auto-reset their journeys
            if (($user->balance ?? 0) > 0) {
                $userLevel = $user->level ?? 1;
                $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
                $journeyAllocation = $levelSetting ? $levelSetting->number_of_journey : 40;
                
                // Reset journey count to level allocation
                $user->journey += 1;
                $user->save();
                
                // Continue with normal flow - user can now start journeys
        } else {
                // User has no balance and no journeys - show error
                return redirect()->route('user.customer.history')
                    ->with('error', 'Journey limit reached! You have no more journeys available. Please recharge your account or contact support to continue.');
            }
        }
        $reviewedIds = $user->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();

        $pendingLocked = collect();
        if (!empty($adminLockedProductIds) && $hasReachedLockPoint) {
            $pendingLocked = \App\Models\Product::whereIn('id', $adminLockedProductIds)
                ->whereNotIn('id', $reviewedIds)
                ->get();
        }

        if ($pendingLocked->count() > 0) {
            // Pick the first un-reviewed locked product
            $product = $pendingLocked->first();
        } else {
            // Fallback to normal selection
            $product = $this->lockingService->getNextAvailableProduct($user);
        }
        \Log::info('DEBUG: Product selected for review in customerWriteReview', [
            'user_id' => $user->id,
            'journey' => $user->journey,
            'journey_lock_at' => $user->journey_lock_at,
            'product_id' => $product ? $product->id : null,
            'product_name' => $product ? $product->name : null
        ]);
        
        // If still no product found and user is not at lock point, try to get any product that's not journey_locked (price order)
        if (!$product && !$hasReachedLockPoint) {
            $reviewedProductIds = $user->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
            $product = \App\Models\Product::whereNotIn('id', $reviewedProductIds)
                ->where('journey_locked', false)
                ->orderBy('price', 'asc')
                ->orderBy('id', 'asc')
                ->first();
        }
            
            if (!$product) {
            // Truly no products in database or user has reviewed all products
            return view('customer.write_review')->with('noMoreProducts', true);
        }
        
        // Additional safety check: if somehow we got a product that's already reviewed, redirect back
        $existingReview = $user->reviews()->where('product_id', $product->id)->first();
        if ($existingReview) {
            // This product was already reviewed, redirect to get next one
                            return redirect()->route('user.customer.write_review');
        }

        // Dynamic stats for the page
        $totalJourneys = $user->orders()->where('status', 'completed')->count();
        $totalReviews = $user->reviews()->count();
        $averageRating = $user->reviews()->avg('rating');
        $totalViews = $user->reviews()->sum('views');
        $visitedJourneys = $user->reviews()->where('status', 'approved')->count();
        
        // Check for any pending journeys that need to be completed first
        $pendingReviews = $user->reviews()->whereNotNull('product_id')->where('status', 'pending')->get();
        
        if ($pendingReviews->count() > 0) {
            // User has pending reviews - show the first pending product for completion
            $pendingReview = $pendingReviews->first();
            $pendingProduct = \App\Models\Product::find($pendingReview->product_id);
            
            if ($pendingProduct) {
                // For regular journeys, don't show insufficient balance - just show pending message
                $toastData = [
                    'type' => 'info',
                    'message' => 'Complete your pending journey to continue.',
                    'details' => [
                        'pending_count' => $pendingReviews->count(),
                        'status' => 'has_pending_journeys'
                    ]
                ];
                
                // Show the pending product instead of next available product
                $product = $pendingProduct;
                return view('customer.write_review', compact('trip', 'product', 'totalJourneys', 'totalReviews', 'averageRating', 'totalViews', 'visitedJourneys', 'toastData'));
            }
        }
        
        // **BALANCE DEDUCTION FOR START JOURNEY**: Deduct balance when starting regular journey
        $price = $product->price;
        $currentBalance = $user->balance;
        
        // Check for insufficient balance
        if ($currentBalance < $price) {
            // Insufficient balance - create pending review and show error
            $userLevel = $user->level ?? 1;
            $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
            $commissionPercent = $levelSetting ? $levelSetting->normal_commission : 1;
            $commission = round($product->price * $commissionPercent / 100, 2);

            // Create pending review record (no balance deduction yet)
            $user->reviews()->create([
                'product_id' => $product->id,
                'rating' => 5, // Default rating
                'status' => 'pending',
                'comment' => 'Pending journey - awaiting completion',
                'commission_earned' => $commission,
                'commission_percent' => $commissionPercent,
                'amount_paid' => 0, // No payment yet
                'remaining_amount' => $price, // Full amount remaining
            ]);
            
            // Show insufficient balance error
            // $toastData = [
            //     'type' => 'error',
            //     'message' => 'Insufficient balance! Current: USDT ' . number_format($currentBalance, 2) . ', Required: USDT ' . number_format($price, 2) . '. Please recharge your account first.',
            //     'details' => [
            //         'current_balance' => number_format($currentBalance, 2),
            //         'required_amount' => number_format($price, 2),
            //         'shortage' => number_format($price - $currentBalance, 2),
            //         'status' => 'insufficient_balance'
            //     ]
            // ];
            $toastData=[];
            
            return view('customer.write_review', compact('trip', 'product', 'totalJourneys', 'totalReviews', 'averageRating', 'totalViews', 'visitedJourneys', 'toastData'));
        }

        // Sufficient balance - only deduct if this is a locked product
        $isLockedProduct = $this->lockingService->isProductLocked($user, $product);
        $userLevel = $user->level ?? 1;
        $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
        $commissionPercent = $levelSetting ? ($isLockedProduct ? $levelSetting->stop_commission : $levelSetting->normal_commission) : 1;
        $commission = round($product->price * $commissionPercent / 100, 2);

        // Create review record with payment info (pending submission)
        $user->reviews()->create([
            'product_id' => $product->id,
            'rating' => 5, // Set default rating to 5
            'status' => 'pending',
            'comment' => $isLockedProduct ? 'Payment processed - awaiting review submission' : 'Pending journey - awaiting completion',
            'commission_earned' => $commission,
            'commission_percent' => $commissionPercent,
            'amount_paid' => $isLockedProduct ? $price : 0,
            'remaining_amount' => $isLockedProduct ? 0 : $price,
        ]);

        // Show success message about balance deduction only if locked
        if ($isLockedProduct) {
            $toastData = [
                'type' => 'success',
                'message' => 'Journey payment processed successfully! USDT ' . number_format($price, 2) . ' deducted. Balance: USDT ' . number_format($user->balance, 2) . '. Complete the review to earn USDT ' . number_format($commission, 2) . ' commission.',
                'details' => [
                    'amount_paid' => number_format($price, 2),
                    'new_balance' => number_format($user->balance, 2),
                    'commission_to_earn' => number_format($commission, 2),
                    'status' => 'payment_processed'
                ]
            ];
        } else {
            $toastData = [
                'type' => 'info',
                'message' => 'Journey started. Complete the review to earn USDT ' . number_format($commission, 2) . ' commission.',
                'details' => [
                    'commission_to_earn' => number_format($commission, 2),
                    'status' => 'journey_started'
                ]
            ];
        }
        
        return view('customer.write_review', compact('trip', 'product', 'totalJourneys', 'totalReviews', 'averageRating', 'totalViews', 'visitedJourneys', 'toastData'));
    }

    public function storeReview(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'type' => 'required|in:product,trip',
            'item_id' => 'required|integer',
            'rating' => 'required|integer|between:1,5',
        ]);
        
        if ($data['type'] === 'product') {
            $product = \App\Models\Product::find($data['item_id']);
            if (!$product) {
                return redirect()->route('user.customer.history')->with('error', 'Product not found.');
            }

            $existingReview = $user->reviews()->where('product_id', $product->id)->first();
            if ($existingReview) {
                if ($existingReview->status === 'pending') {
                    $existingReview->update([
                        'rating' => $data['rating'],
                        'status' => 'approved',
                        'comment' => 'Journey completed successfully',
                        'amount_paid' => 0,
                        'remaining_amount' => $product->price,
                        'google_review_link' => $data['google_review_link'] ?? null,
                    ]);

                    $commission = $existingReview->commission_earned;
                    $user->balance += $commission;
                    // Increment journey count after approval and before toast
                    $user->journey += 1;
                    $user->save();

                    $currentJourney = $user->reviews()->where('status', 'approved')->count();

                    $toastData = [
                        'type' => 'success',
                        'message' => 'Journey completed successfully! Commission added to your balance.',
                        'details' => [
                            'commission' => number_format($commission, 2),
                            'journey' => 'Journey ' . $currentJourney,
                            'balance' => number_format($user->balance, 2),
                            'note' => 'Product cost will be deducted when you get a locked product'
                        ]
                    ];

                    return redirect()->route('user.customer.write_review')->with('toast', $toastData);
                }

                $trip = null;
                $totalJourneys = $user->orders()->where('status', 'completed')->count();
                $totalReviews = $user->reviews()->count();
                $averageRating = $user->reviews()->avg('rating');
                $totalViews = $user->reviews()->sum('views');
                $visitedJourneys = $user->reviews()->where('status', 'approved')->count();

                $toastData = [
                    'type' => 'error',
                    'message' => 'You have already reviewed this product.',
                    'details' => ['status' => 'already_reviewed']
                ];
                return view('customer.write_review', compact('trip', 'product', 'totalJourneys', 'totalReviews', 'averageRating', 'totalViews', 'visitedJourneys', 'toastData'));
            }

            $currentBalance = $user->balance ?? 0;
            $originalPrice = $product->price;

            $userLevel = $user->level ?? 1;
            $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
            $journeyLimit = $levelSetting ? $levelSetting->number_of_journey : 40;
            $commissionPercent = $levelSetting ? $levelSetting->normal_commission : 1;
            $commission = round($product->price * $commissionPercent / 100, 2);
            
            // Enforce journey limit
            if (($user->journey ?? 0) >= $journeyLimit) {
                $toastData = [
                    'type' => 'error',
                    'message' => 'You have reached the maximum number of journeys for your current level. Please upgrade your level to continue.',
                    'details' => ['status' => 'journey_limit_reached']
                ];
                return redirect()->route('user.customer.write_review')->with('toast', $toastData);
            }

            $user->balance += $commission;
            // Increment journey count after approval and before toast
            $user->journey += 1;
            $user->save();
            
            $user->reviews()->create([
                'product_id' => $data['item_id'],
                'rating' => $data['rating'],
                'status' => 'approved',
                'comment' => 'Product review submitted',
                'commission_earned' => $commission,
                'commission_percent' => $commissionPercent,
                'amount_paid' => 0,
                'remaining_amount' => $originalPrice,
                'google_review_link' => $data['google_review_link'] ?? null,
            ]);
            // Also update the corresponding user_order with the google_review_link
            $userOrder = \App\Models\UserOrder::where('user_id', $user->id)
                ->where('product_id', $data['item_id'])
                ->latest()
                ->first();
            if ($userOrder) {
                $userOrder->google_review_link = $data['google_review_link'] ?? null;
                $userOrder->save();
            }
            
            $newBalance = $user->balance;
            $currentJourney = $user->reviews()->where('status', 'approved')->count();

            $toastData = [
                'type' => 'success',
                'message' => 'Review submitted successfully! Commission added to your balance.',
                'details' => [
                    'commission' => number_format($commission, 2),
                    'journey' => 'Journey ' . $currentJourney,
                    'balance' => number_format($newBalance, 2),
                    'note' => 'Product cost will be deducted when you get a locked product'
                ]
            ];
            
            return redirect()->route('user.customer.write_review')->with('toast', $toastData);
        } else {
            $exists = $user->reviews()->where('trip_id', $data['item_id'])->exists();
            if ($exists) {
                return back()->withErrors(['error' => 'You have already reviewed this trip.']);
            }
            
            $trip = \App\Models\Trip::find($data['item_id']);
            $commissionPercent = 1;
            $commission = $trip ? round($trip->price * $commissionPercent / 100, 2) : 0;
            $review = $user->reviews()->create([
                'trip_id' => $data['item_id'],
                'rating' => $data['rating'],
                'status' => 'approved',
                'comment' => 'N/A',
                'commission_earned' => $commission,
                'commission_percent' => $commissionPercent,
                'google_review_link' => $data['google_review_link'] ?? null,
            ]);
            // Increment journey count after approval and before toast
            $user->journey += 1;
            $user->save();
            
            return redirect()->route('user.customer.history')
                ->with('success', 'Review submitted successfully! It will be reviewed by admin.');
        }
    }

    // Helper to get commission percent and amount for a trip
    public static function getReviewCommission($tripPrice)
    {
        $percent = config('app.review_commission_percent', 1);
        return round($tripPrice * $percent / 100, 2);
    }

    public function updateReview(Request $request, $reviewId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
        ]);

        $user = Auth::user();
        $review = $user->reviews()->findOrFail($reviewId);
        
        $review->update([
            'rating' => $request->rating,
            'title' => 'tst',
            'content' => 'tst',
            'status' => 'pending',
        ]);

        return back()->with('success', 'Review updated successfully!');
    }

    public function deleteReview($reviewId)
    {
        $user = Auth::user();
        $review = $user->reviews()->findOrFail($reviewId);
        $review->delete();

        return response()->json(['success' => true]);
    }

    public function editReview($reviewId)
    {
        $user = Auth::user();
        $review = $user->reviews()->findOrFail($reviewId);
        return view('user.reviews_edit', compact('review'));
    }

    public function transactions()
    {
        $user = Auth::user();
        
        $deposits = Deposite::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        $withdrawals = Withdraw::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('user.transactions', compact('deposits', 'withdrawals'));
    }

    public function settings()
    {
        $user = Auth::user();
        return view('user.settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'language' => 'required|in:en,es,fr,de',
            'currency' => 'required|in:USD,EUR,GBP,CAD',
            'timezone' => 'required|string',
            'date_format' => 'required|in:MM/DD/YYYY,DD/MM/YYYY,YYYY-MM-DD',
        ]);

        $user = Auth::user();
        $user->update($request->only(['language', 'currency', 'timezone', 'date_format']));

        return back()->with('success', 'Settings updated successfully!');
    }

    public function updateNotifications(Request $request)
    {
        $user = Auth::user();
        
        $user->update([
            'email_notifications' => $request->has('email_notifications'),
            'sms_notifications' => $request->has('sms_notifications'),
            'marketing_emails' => $request->has('marketing_emails'),
            'booking_confirmations' => $request->has('booking_confirmations'),
            'price_alerts' => $request->has('price_alerts'),
        ]);

        return back()->with('success', 'Notification preferences updated successfully!');
    }

    public function updatePrivacy(Request $request)
    {
        $user = Auth::user();
        
        $user->update([
            'profile_visible' => $request->has('profile_visible'),
            'reviews_visible' => $request->has('reviews_visible'),
            'activity_status' => $request->has('activity_status'),
        ]);

        return back()->with('success', 'Privacy settings updated successfully!');
    }

    public function notifications()
    {
        $user = Auth::user();
        // This would be implemented with a notifications table
        $notifications = collect(); // Placeholder for now
        
        return view('user.notifications', compact('notifications'));
    }

    public function support()
    {
        return view('user.support');
    }

    public function contactSupport(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Here you would typically send an email or create a support ticket
        // For now, we'll just return a success message
        
        return back()->with('success', 'Your message has been sent successfully! We will get back to you within 24 hours.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function updatePreferences(Request $request)
    {
        $user = auth()->user();
        $user->email_notifications = $request->has('email_notifications');
        $user->sms_notifications = $request->has('sms_notifications');
        $user->marketing_emails = $request->has('marketing_emails');
        $user->save();

        return back()->with('success', 'Account preferences updated successfully!');
    }

    public function showRecharge()
    {
        $user = auth()->user();
        $totalRecharged = \App\Models\Deposite::where('user_id', $user->id)->where('status', 'complete')->sum('amount');
        $totalDeducted = $user->reviews()->whereNotNull('product_id')->sum('amount_paid');
        $totalCommission = $user->reviews()->whereNotNull('product_id')->sum('commission_earned');
        $totalBalance = $totalRecharged + $totalCommission - $totalDeducted;
        return view('user.recharge', compact('user', 'totalRecharged', 'totalDeducted', 'totalCommission', 'totalBalance'));
    }

    public function submitRecharge(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'chain_type' => 'required|in:ERC20,TRC20,BEP20',
            'payment_screenshot' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);
        $user = auth()->user();
        $totalDeducted = $user->reviews()->whereNotNull('product_id')->sum('amount_paid');
        // Handle file upload
        $screenshotPath = null;
        if ($request->hasFile('payment_screenshot')) {
            $screenshotPath = $request->file('payment_screenshot')->store('recharge_screenshots', 'public');
        }
        // Create a Deposite record with status 'pending'
        \App\Models\Deposite::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'chain_type' => $request->chain_type,
            'payment_screenshot' => $screenshotPath,
        ]);
        $message = 'Recharge request submitted! Awaiting admin approval.';
        return redirect()->route('user.rate_trip')->with('success', $message);
    }

    public function showWithdraw()
    {
        $user = Auth::user();
        // Sidebar commission logic (sum of commission_earned from approved product reviews)
        $sidebarCommission = $user->reviews()->whereNotNull('product_id')->where('status', 'approved')->sum('commission_earned');
        return view('user.withdraw', compact('user', 'sidebarCommission'));
    }

    public function submitWithdraw(Request $request)
    {
        $user = Auth::user();
        // Only allow withdrawal from withdrawable earnings (including product review commissions and referral commission)
        $withdrawableEarnings = $user->orders()->where('status', 'completed')->sum('reward_earned');
        $approvedProductReviews = $user->reviews()->whereNotNull('product_id')->where('status', 'approved')->get();
        $productCommission = $approvedProductReviews->sum(function($review) {
            return self::getReviewCommission(optional($review->product)->price ?? 0);
        });
        $withdrawableEarnings += $productCommission;
        $withdrawableEarnings += $user->commission ?? 0;
        $request->validate([
            'amount' => 'required|numeric|min:1|max:' . $withdrawableEarnings,
            'payment_method' => 'required|string',
        ]);
        // Deduct from journey earnings (set reward_earned to 0 for oldest completed journeys first)
        $remaining = $request->amount;
        $orders = $user->orders()->where('status', 'completed')->where('reward_earned', '>', 0)->orderBy('created_at')->get();
        foreach ($orders as $order) {
            if ($remaining <= 0) break;
            if ($order->reward_earned <= $remaining) {
                $remaining -= $order->reward_earned;
                $order->reward_earned = 0;
            } else {
                $order->reward_earned -= $remaining;
                $remaining = 0;
            }
            $order->save();
        }
        // Optionally, deduct from product commissions (mark as withdrawn, if you want to track)
        // Deduct from referral commission if needed
        if ($remaining > 0 && ($user->commission ?? 0) > 0) {
            if ($user->commission >= $remaining) {
                $user->commission -= $remaining;
                $remaining = 0;
            } else {
                $remaining -= $user->commission;
                $user->commission = 0;
            }
            $user->save();
        }
        // Optionally, create a withdrawal record here
        \App\Models\Withdraw::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
        ]);
        return back()->with('success', 'Withdrawal request submitted!');
    }

    // Show stats and "Start Journey" button
    public function rateTrip()
    {
        $user = Auth::user();
        // Always get the latest order for the user
        $order = $user->orders()->latest()->first();
        $lockedProductIds = $order ? $order->getActiveLockedJourneys() : [];

        // Check if user reached lock point
        $hasReachedLockPoint = $user->journey_lock_at && ($user->journey + 1) >= $user->journey_lock_at;

        // Fetch reviewed product IDs
        $reviewedProductIds = $user->reviews()
            ->whereNotNull('product_id')
            ->pluck('product_id')
            ->toArray();

        // Get pending locked products
        $pendingLockedProducts = collect();
        if (!empty($lockedProductIds)) {
            $pendingLockedProducts = \App\Models\Product::whereIn('id', $lockedProductIds)
                                   ->whereNotIn('id', $reviewedProductIds)
                                   ->get();
        }
        
        // Deduct balance and create pending review for each locked product at lock point
        if ($hasReachedLockPoint && $pendingLockedProducts->count() > 0) {
            foreach ($pendingLockedProducts as $lockedProduct) {
                $existingReview = $user->reviews()->where('product_id', $lockedProduct->id)->first();
                if (!$existingReview) {
                    $user->balance -= $lockedProduct->price;
                    $user->save();
                    $user->reviews()->create([
                        'product_id' => $lockedProduct->id,
                        'status' => 'pending',
                        'amount_paid' => $lockedProduct->price,
                        'commission_earned' => 0,
                        'commission_percent' => 0,
                        'rating' => null,
                        'comment' => 'Pending locked product review',
                        'remaining_amount' => 0,
                    ]);
                }
            }
        }

        // Add debug logging
        \Log::info('DEBUG: rateTrip', [
            'user_id' => $user->id,
            'journey' => $user->journey,
            'journey_lock_at' => $user->journey_lock_at,
            'order_locked_journeys' => $order ? $order->locked_journeys : null,
            'lockedProductIds' => $lockedProductIds,
            'pendingLockedProducts' => $pendingLockedProducts->pluck('id')->toArray(),
            'hasReachedLockPoint' => $hasReachedLockPoint,
        ]);

        // Determine if journey is locked
        $journeyLocked = false;
        $journeyLockMessage = '';
        if (!empty($lockedProductIds) && $hasReachedLockPoint) {
            if ($pendingLockedProducts->count() > 0) {
                $journeyLocked = true;
                $journeyLockMessage = "You have reached journey lock point. First complete all locked journey for proceeding journey.";
            }
        }

        $hasPendingSubmissions = $journeyLocked;

        // Only pass currentJourney if not locked
        $currentJourney = null;
        if (!$journeyLocked) {
            $currentJourney = $this->lockingService->getNextAvailableProduct($user);
        }

        // Total journeys from user level
        $userLevel = $user->level ?? 1;
        $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
        $totalJourney = $levelSetting ? $levelSetting->number_of_journey : 40;
        
        // Journey stats
        $journeyNumber = $user->journey ?? 0; // This is the actual current journey number
        $remainingJourneys = $totalJourney - $journeyNumber;
        $totalProductReviews = $user->reviews()->whereNotNull('product_id')->count();
        $totalProductEarnings = $user->reviews()
            ->whereNotNull('product_id')
            ->where('status', 'approved')
            ->sum('commission_earned');

        $visitedJourneys = $user->journey ?? 0;
        $totalViews = $user->balance;

        // Negative balance check
        $hasNegativeBalance = ($user->balance ?? 0) < 0;
        $negativeBalanceMessage = 'Error! Unable to proceed due to insufficient balance.';

        return view('customer.rate_trip', compact(
            'user',
            'currentJourney',
            'journeyNumber',
            'remainingJourneys',
            'totalJourney',
            'totalProductReviews',
            'totalProductEarnings',
            'visitedJourneys',
            'totalViews',
            'hasPendingSubmissions',
            'pendingLockedProducts',
            'journeyLocked',
            'journeyLockMessage',
            'hasNegativeBalance',
            'negativeBalanceMessage',
        ));
    }

    // Show the review form for a specific product or trip (refactored for new journey logic)
    public function startJourney(Request $request)
    {
        $user = Auth::user();
        // 1. Check if user has a pending journey
        $hasPending = \App\Models\TravelHistory::where('user_id', $user->id)->where('status', 'pending')->exists();
        if ($hasPending) {
            return back()->with('error', 'Please submit the pending record before proceeding to the next journey.');
        }

        // 2. Load journey lock settings
        $journeyLockAt = $user->journey_lock_at;
        $currentJourney = $user->journey ?? 0;
        $levelSettings = \App\Models\LevelSetting::where('level', $user->level)->first();
        $maxJourney = $levelSettings ? $levelSettings->number_of_journey : 40;

        // 3. Decide product and commission
        if ($currentJourney + 1 >= $journeyLockAt) {
            // Locked journey logic
            $product = \App\Models\Product::where('status', 'Available')->inRandomOrder()->first();
            $commissionPercent = $levelSettings ? $levelSettings->stop_commission : 1;
            $allowNegative = true;
        } else {
            // Normal logic
            $product = \App\Models\Product::where('status', 'Available')->inRandomOrder()->first();
            $commissionPercent = $levelSettings ? $levelSetting->normal_commission : 1;
            $allowNegative = false;
        }

        // 4. Validate balance
        if (!$allowNegative && $user->balance < $product->price) {
            return back()->with('error', 'Insufficient Balance to start this journey.');
        }

        // 5. Deduct balance and record journey
        if ($allowNegative) {            // locked journey – allow balance to go negative
            $user->balance -= $product->price;
        }
        // Remove all references to journey_count; use journey property only
        $user->journey = $currentJourney + 1;
        $user->save();

        \App\Models\TravelHistory::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'price' => $allowNegative ? $product->price : 0,
            'commission' => $product->price * $commissionPercent / 100,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Journey started. Please submit your review to complete the journey.');
    }

    public function startLockedProduct($productId)
    {
        $user = Auth::user();
        $product = \App\Models\Product::findOrFail($productId);

        // Check if review already exists
        $existingReview = $user->reviews()->where('product_id', $product->id)->first();
        if (!$existingReview) {
            // Deduct balance
            $user->balance -= $product->price;
            $user->save();

            // Create pending review
            $user->reviews()->create([
                'product_id' => $product->id,
                'status' => 'pending',
                'amount_paid' => $product->price,
                'commission_earned' => 0,
                'commission_percent' => 0,
                'rating' => null,
                'comment' => 'Pending locked product review',
                'remaining_amount' => 0,
            ]);
        }

        // Redirect to the review form for this product
        return redirect()->route('user.customer.write_review');
    }

    public function showChangePasswordForm()
    {
        return view('user.change_password');
    }

    public function submitJourney(Request $request, $order_id)
    {
        $user = Auth::user();
        $order = \App\Models\UserOrder::findOrFail($order_id);
        // Only allow if order is pending and belongs to user
        if ($order->user_id !== $user->id || $order->status !== 'pending') {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Invalid or already submitted journey.'], 400);
            }
            return back()->withErrors(['error' => 'Invalid or already submitted journey.']);
        }
        $price = $order->amount;
        if ($user->balance < $price) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insufficient Balance!',
                    'details' => [
                        'required_amount' => number_format($price, 2),
                        'current_balance' => number_format($user->balance, 2),
                        'shortage' => number_format($price - $user->balance, 2)
                    ]
                ], 400);
            }
            return back()->withErrors(['error' => 'Insufficient Balance..!']);
        }
        // Deduct balance
        $user->balance -= $price;
        $user->save();
        // Mark order as completed
        $order->status = 'completed';
        $order->save();
        
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Journey submitted successfully!']);
        }
        return back()->with('success', 'Journey submitted successfully!');
    }

    // When a product review is submitted and approved, update journey and level correctly
    public function submitProduct(Request $request, $product_id)
    {
        $user = Auth::user();
        $review = $user->reviews()->where('product_id', $product_id)->firstOrFail();

        // Only approve if not already approved
        if ($review->status !== 'approved') {
        $review->update([
            'status' => 'approved',
            'comment' => 'Review submitted successfully',
        ]);

        // Add commission to user (commission was already calculated and stored in review)
        $commission = $review->commission_earned;
            $user->balance += $commission;
        
            // --- Journey/Level Logic ---
            // Always get max journey from level_settings
        $userLevel = $user->level ?? 1;
        $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
            $maxJourney = $levelSetting ? $levelSetting->number_of_journey : 40;

        // Enforce journey limit
        if (($user->journey ?? 0) >= $maxJourney) {
            $errorMessage = 'You have reached the maximum number of journeys for your current level. Please upgrade your level to continue.';
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 400);
            }
            return back()->withErrors(['error' => $errorMessage]);
        }

        // Increment journey (completed journeys)
        $user->journey = ($user->journey ?? 0) + 1;

            // If journey >= max, level up and reset journey
            if ($user->journey >= $maxJourney) {
            $user->level = $userLevel + 1;
            $user->journey = 0;
        }
        
        $user->save();
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true, 
                'message' => 'Review submitted successfully! Commission earned: $' . number_format($review->commission_earned, 2) . '. Current balance: $' . number_format($user->balance, 2)
            ]);
        }
        
        $successMessage = 'Review submitted successfully! Commission earned: $' . number_format($review->commission_earned, 2) . '. ';
        $successMessage .= 'Current balance: $' . number_format($user->balance, 2);
        
        return back()->with('success', $successMessage);
    }

    public function submitLockedProduct(Request $request, $product_id)
    {
        $user = Auth::user();
        $product = \App\Models\Product::findOrFail($product_id);

        $price = $product->price;
        $userLevel = $user->level ?? 1;
        $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
        $commissionPercent = $levelSetting ? $levelSetting->stop_commission : 5.0;
        $commission = round($product->price * $commissionPercent / 100, 2);

        // Check if user already has a review for this product
        $existingReview = $user->reviews()->where('product_id', $product->id)->first();
        if ($existingReview && $existingReview->status === 'approved') {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'This product has already been completed.',
                ], 400);
            }
            return back()->withErrors(['error' => 'This product has already been completed.']);
        }

        // Deduct balance (allow negative)
        $user->balance -= $price;
        // Add commission
        $user->balance += $commission;
        $user->save();

        // Create or update review record for locked product
        if ($existingReview) {
            $existingReview->update([
                'rating' => 5,
                'status' => 'approved',
                'comment' => 'Locked product submitted successfully',
                'commission_earned' => $commission,
                'commission_percent' => $commissionPercent,
                'amount_paid' => $price,
                'remaining_amount' => 0,
            ]);
        } else {
            $user->reviews()->create([
                'product_id' => $product->id,
                'rating' => 5,
                'status' => 'approved',
                'comment' => 'Locked product submitted successfully',
                'commission_earned' => $commission,
                'commission_percent' => $commissionPercent,
                'amount_paid' => $price,
                'remaining_amount' => 0,
            ]);
        }

        // Check if all admin-assigned locked products are completed
        $order = $user->order;
        $adminLockedProductIds = $order ? $order->getActiveLockedJourneys() : [];
        $allLockedCompleted = true;
        $journeyProgressMessage = '';
        
        if (!empty($adminLockedProductIds)) {
            $reviewedProductIds = $user->reviews()->whereNotNull('product_id')->where('status', 'approved')->pluck('product_id')->toArray();
            foreach ($adminLockedProductIds as $lockedProductId) {
                if (!in_array($lockedProductId, $reviewedProductIds)) {
                    $allLockedCompleted = false;
                    break;
                }
            }
        }
        
        // If user was journey locked and all locked products are completed, allow progression
        if ($user->journey_lock_at && $allLockedCompleted) {
            // If user journey is at the lock point, allow them to continue past the lock
            if ($user->journey >= ($user->journey_lock_at)) {
                $journeyProgressMessage = " 🎉 Journey lock cleared! You can now continue with regular journeys.";
                
                // Progress user journey to the lock point if they haven't reached it yet
                if ($user->journey < $user->journey_lock_at) {
                    $user->journey = $user->journey_lock_at;
                }
                
                // Clear the locked journeys for this user since they're completed
                if ($order) {
                    $order->locked_journeys = null;
                    $order->save();
                }
                
                // Check if user should level up after journey progression
                $userLevel = $user->level ?? 1;
                $levelSetting = \App\Models\LevelSetting::where('level', $userLevel)->first();
                $journeyLimit = $levelSetting ? $levelSetting->number_of_journey : 40;
                
                if ($user->journey >= $journeyLimit) {
                    $user->level = $userLevel + 1;
                    $user->journey = 0;
                    $journeyProgressMessage .= " Level up! You are now Level " . $user->level . ".";
                }
                
                // Add debugging before save
                \Log::info('About to save user (journey lock path)', [
                    'balance_before_save' => $user->balance,
                    'journey_lock_at' => $user->journey_lock_at,
                    'all_locked_completed' => $allLockedCompleted
                ]);
                
                                 $user->save();
                
                // Add debugging after save
                \Log::info('User saved (journey lock path)', [
                    'balance_after_save' => $user->fresh()->balance
                ]);
             }
         } else {
            // Save balance changes
            \Log::info('About to save user (else path)', [
                'balance_before_save' => $user->balance,
                'journey_lock_at' => $user->journey_lock_at,
                'all_locked_completed' => $allLockedCompleted
            ]);
            
             $user->save();
            
            // Add debugging after save
            \Log::info('User saved (else path)', [
                'balance_after_save' => $user->fresh()->balance
            ]);
         }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true, 
                'message' => 'Locked product submitted successfully! Amount deducted: USDT ' . number_format($price, 2) . '. New balance: USDT ' . number_format($user->balance, 2) . $journeyProgressMessage
            ]);
        }
        
        $successMessage = 'Locked product submitted successfully! ';
        $successMessage .= 'Amount deducted: USDT ' . number_format($price, 2) . '. ';
        $successMessage .= 'New balance: USDT ' . number_format($user->balance, 2);
        if ($user->balance < 0) {
            $successMessage .= ' (Negative balance - please recharge)';
        }
        $successMessage .= $journeyProgressMessage;
        
        // Redirect to write_review page after successful locked product submission
        return redirect()->route('user.customer.write_review')->with('success', $successMessage);
    }

    public function resumeTrip($productId)
    {
        $user = Auth::user();
        $review = $user->reviews()->where('product_id', $productId)->where('status', 'pending')->first();
        $product = \App\Models\Product::findOrFail($productId);

        if (!$review) {
            return redirect()->route('user.customer.history')->with('error', 'No pending review found for this product.');
        }

        // Pass the product and review to the write_review view
        return view('customer.write_review', [
            'product' => $product,
            'review' => $review,
            // Add any other stats you want to show
        ]);
    }
} 