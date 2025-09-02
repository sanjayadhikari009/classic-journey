<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = [
        'user_id', 'trip_id', 'min_price', 'max_price', 'locked_journeys',
        'amount', 'status', 'booking_date', 'travel_date', 'reward_earned', 'locked_until'
    ];

    protected $casts = [
        'locked_journeys' => 'array',
        'locked_until' => 'datetime',
    ];

    public function trip()
    {
        return $this->belongsTo(\App\Models\Trip::class, 'trip_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Check if locks are expired
    public function hasExpiredLocks()
    {
        return $this->locked_until && $this->locked_until->isPast();
    }
    
    // Get active locked journeys (not expired)
    public function getActiveLockedJourneys()
    {
        if ($this->hasExpiredLocks()) {
            return [];
        }
        return $this->locked_journeys ?: [];
    }
} 