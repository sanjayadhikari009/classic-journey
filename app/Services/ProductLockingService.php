<?php

namespace App\Services;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductLockingService
{
    /**
     * Check if a product is locked for a specific user
     */
    public function isProductLocked(User $user, Product $product): bool
    {
        // Check global product lock first
        if ($product->journey_locked) {
            return true;
        }
        
        // Check user-specific locks
        $order = $user->order;
        if (!$order) {
            return false;
        }
        
        $activeLockedJourneys = $order->getActiveLockedJourneys();
        
        // Check if user has reached journey lock point
        $hasReachedLockPoint = false;
        if ($user->journey_lock_at && ($user->journey + 1) >= $user->journey_lock_at) {
            $hasReachedLockPoint = true;
        }
        
        // If user has reached lock point and has locked products, only those products are accessible
        if ($hasReachedLockPoint && !empty($activeLockedJourneys)) {
            return !in_array($product->id, $activeLockedJourneys);
        }
        
        return false;
    }
    
    /**
     * Get products that user can access (not locked)
     */
    public function getAccessibleProducts(User $user): Collection
    {
        $order = $user->order;
        $activeLockedJourneys = $order ? $order->getActiveLockedJourneys() : [];
        
        // Check if user has reached journey lock point
        $hasReachedLockPoint = false;
        if ($user->journey_lock_at && ($user->journey + 1) >= $user->journey_lock_at) {
            $hasReachedLockPoint = true;
        }
        
        // If user has reached lock point and has locked products, return only those
        if ($hasReachedLockPoint && !empty($activeLockedJourneys)) {
            return Product::whereIn('id', $activeLockedJourneys)
                         ->where('journey_locked', false) // Exclude globally locked products
                         ->orderBy('price', 'asc') // Natural progression from cheaper to more expensive
                         ->orderBy('id', 'asc') // Secondary order by ID for consistency
                         ->get();
        }
        
        // Otherwise return all non-globally-locked products in price order
        return Product::where('journey_locked', false)
                      ->orderBy('price', 'asc') // Natural progression from cheaper to more expensive
                      ->orderBy('id', 'asc') // Secondary order by ID for consistency
                      ->get();
    }

    /**
     * Get products that are pending (locked) for user
     */
    public function getPendingLockedProducts(User $user): Collection
    {
        $order = $user->order;
        if (!$order) {
            return collect();
        }
        
        $activeLockedJourneys = $order->getActiveLockedJourneys();
        $reviewedProductIds = $user->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
        
        if (!empty($activeLockedJourneys)) {
            return Product::whereIn('id', $activeLockedJourneys)
                         ->whereNotIn('id', $reviewedProductIds)
                         ->get();
        }
        
        return collect();
    }

    /**
     * Get next available product for user
     */
    public function getNextAvailableProduct(User $user): ?Product
    {
        $reviewedProductIds = $user->reviews()->whereNotNull('product_id')->pluck('product_id')->toArray();
        $order = $user->order;
        $activeLockedJourneys = $order ? $order->getActiveLockedJourneys() : [];
        
        // Check if user has reached journey lock point
        $hasReachedLockPoint = false;
        if ($user->journey_lock_at && ($user->journey + 1) >= $user->journey_lock_at) {
            $hasReachedLockPoint = true;
        }
        
        // If user has reached lock point and has locked products, return only from locked products
        if ($hasReachedLockPoint && !empty($activeLockedJourneys)) {
            $nextProduct = Product::whereIn('id', $activeLockedJourneys)
                ->whereNotIn('id', $reviewedProductIds)
                ->where('journey_locked', false) // Exclude globally locked
                ->orderBy('price', 'asc') // Order by price (cheapest first)
                ->orderBy('id', 'asc') // Secondary order for consistency
                ->first();
                
            if ($nextProduct) {
                return $nextProduct;
            }
            
            // If no more locked products available, return null (user must complete all locked products)
            return null;
        }
        
        // If not at lock point or no locked products, get next available product in price order
        return Product::whereNotIn('id', $reviewedProductIds)
            ->where('journey_locked', false) // Exclude globally locked
            // ->orderBy('price', 'asc') // Order by price (cheapest first)
            // ->orderBy('id', 'asc') // Secondary order for consistency
            ->whereNotIn('id', $activeLockedJourneys) // Exclude admin-locked products

            ->inRandomOrder()

            ->first();
    }
    
    /**
     * Lock products for a user with optional expiration
     */
    public function lockProductsForUser(User $user, array $productIds, ?\DateTime $expiresAt = null): void
    {
        $user->order()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'locked_journeys' => $productIds,
                'locked_until' => $expiresAt
            ]
        );
    }
    
    /**
     * Remove expired locks for all users
     */
    public function cleanupExpiredLocks(): int
    {
        $expiredOrders = \App\Models\UserOrder::whereNotNull('locked_until')
            ->where('locked_until', '<', now())
            ->get();
            
        foreach ($expiredOrders as $order) {
            $order->locked_journeys = [];
            $order->locked_until = null;
            $order->save();
        }
        
        return $expiredOrders->count();
    }
} 