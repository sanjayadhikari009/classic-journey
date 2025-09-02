<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = UserOrder::with(['user', 'trip']);

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%")
                         ->orWhere('username', 'like', "%$search%");
                  })
                  ->orWhereHas('trip', function ($tq) use ($search) {
                      $tq->where('title', 'like', "%$search%");
                  });
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by user
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter by product
        if ($request->filled('product_id')) {
            $query->whereHas('user.reviews', function ($q) use ($request) {
                $q->where('product_id', $request->product_id);
            });
        }

        // Filter by Google Review Link
        if ($request->filled('google_review_link')) {
            $googleReviewLink = $request->input('google_review_link');
            $query->whereHas('user.reviews', function ($q) use ($googleReviewLink) {
                $q->where('google_review_link', 'like', "%$googleReviewLink%");
            });
        }

        // Sorting
        $sortable = ['id', 'order_number', 'created_at', 'status'];
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');
        if (!in_array($sort, $sortable)) {
            $sort = 'id';
        }
        $query->orderBy($sort, $direction);

        $orders = $query->paginate(15)->appends($request->query());

        // Get comprehensive order data similar to customer history
        $ordersWithDetails = $orders->getCollection()->map(function ($order) {
            $user = $order->user;
            $adminLockedProductIds = $order ? $order->getActiveLockedJourneys() : [];
            
            // Get user's reviewed products
            $reviewedProductIds = $user->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
            
            // Get all products for this user (reviewed + admin-locked)
            $allProductIds = array_merge($reviewedProductIds, $adminLockedProductIds);
            $products = \App\Models\Product::whereIn('id', $allProductIds)->get();
            
            $orderDetails = collect();
            
            // Add reviewed products
            foreach ($products->whereIn('id', $reviewedProductIds) as $product) {
                // Fetch the latest review for this product and user
                $review = $user->reviews()->where('product_id', $product->id)->orderByDesc('created_at')->first();
                if ($review) {
                    $status = $review->status === 'approved' ? 'completed' : 'pending';
                    $orderDetails->push([
                        'type' => 'product',
                        'product' => $product,
                        'review' => $review, // This will include google_review_link
                        'status' => $status,
                        'is_admin_locked' => in_array($product->id, $adminLockedProductIds),
                        'commission_earned' => $review->commission_earned ?? 0,
                        'amount_paid' => $review->amount_paid ?? 0,
                        'created_at' => $review->created_at,
                        'is_reviewed' => true
                    ]);
                }
            }
            
            // Add admin-locked products (not yet reviewed)
            foreach ($products->whereIn('id', $adminLockedProductIds)->whereNotIn('id', $reviewedProductIds) as $product) {
                $orderDetails->push([
                    'type' => 'product',
                    'product' => $product,
                    'review' => null,
                    'status' => 'pending',
                    'is_admin_locked' => true,
                    'commission_earned' => 0,
                    'amount_paid' => 0,
                    'created_at' => $order->created_at,
                    'is_reviewed' => false
                ]);
            }
            
            return [
                'order' => $order,
                'user' => $user,
                'details' => $orderDetails->sortByDesc('created_at')->values()
            ];
        });

        // Replace the collection with our detailed data
        $orders->setCollection($ordersWithDetails);

        // Fetch all users and products for filter dropdowns
        $users = \App\Models\User::orderBy('name')->get();
        $products = \App\Models\Product::orderBy('name')->get();

        return view('admin.order_list', compact('orders', 'users', 'products'));
    }
} 