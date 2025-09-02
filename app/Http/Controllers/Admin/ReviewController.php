<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with(['user', 'trip', 'company', 'product']);

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('content', 'like', "%$search%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
                  })
                  ->orWhereHas('trip', function ($tq) use ($search) {
                      $tq->where('title', 'like', "%$search%");
                  })
                  ->orWhereHas('company', function ($cq) use ($search) {
                      $cq->where('name', 'like', "%$search%");
                  })
                  ->orWhereHas('product', function ($pq) use ($search) {
                      $pq->where('name', 'like', "%$search%");
                  });
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by rating
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        // Filter by type
        if ($request->filled('type')) {
            if ($request->type === 'trip') {
                $query->whereNotNull('trip_id');
            } elseif ($request->type === 'company') {
                $query->whereNotNull('company_id');
            } elseif ($request->type === 'product') {
                $query->whereNotNull('product_id');
            }
        }

        // Sort
        $sortable = ['id', 'rating', 'helpful_votes', 'created_at', 'status'];
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');
        
        if (in_array($sort, $sortable)) {
            $query->orderBy($sort, $direction);
        }

        $reviews = $query->paginate(15)->appends($request->query());

        // Add admin-locked status and additional details for product reviews
        $reviewsWithDetails = $reviews->getCollection()->map(function ($review) {
            $user = $review->user;
            $order = $user->order;
            $adminLockedProductIds = $order ? $order->getActiveLockedJourneys() : [];
            
            $isAdminLocked = false;
            if ($review->product_id) {
                $isAdminLocked = in_array($review->product_id, $adminLockedProductIds);
            }
            
            return [
                'review' => $review,
                'user' => $user,
                'is_admin_locked' => $isAdminLocked,
                'commission_earned' => $review->commission_earned ?? 0,
                'amount_paid' => $review->amount_paid ?? 0,
                'review_status' => $review->status === 'approved' ? 'completed' : 'pending'
            ];
        });

        // Replace the collection with our detailed data
        $reviews->setCollection($reviewsWithDetails);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::with(['user', 'trip', 'company'])->findOrFail($id);
        return view('admin.reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::with(['user', 'trip', 'company'])->findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:pending,approved,rejected',
            'verified_purchase' => 'boolean'
        ]);

        $data = $request->all();
        $data['verified_purchase'] = $request->has('verified_purchase');

        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully!');
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        if ($review->status !== 'approved') {
            $review->status = 'approved';
            $review->save();

            // Only add commission if not already added
            $user = $review->user;
            if ($user) {
                $user->balance += $review->commission_earned;
                $user->save();
            }
        }
        return back()->with('success', 'Review approved successfully!');
    }

    public function reject($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'rejected';
        $review->save();

        return back()->with('success', 'Review rejected successfully!');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:approve,reject,delete',
            'reviews' => 'required|array',
            'reviews.*' => 'exists:reviews,id'
        ]);

        $reviews = Review::whereIn('id', $request->reviews);

        switch ($request->action) {
            case 'approve':
                $reviews->update(['status' => 'approved']);
                $message = 'Reviews approved successfully!';
                break;
            case 'reject':
                $reviews->update(['status' => 'rejected']);
                $message = 'Reviews rejected successfully!';
                break;
            case 'delete':
                $reviews->delete();
                $message = 'Reviews deleted successfully!';
                break;
        }

        return back()->with('success', $message);
    }
} 