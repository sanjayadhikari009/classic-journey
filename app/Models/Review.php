<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_id',
        'product_id',
        'company_id',
        'rating',
        'title',
        'content',
        'status',
        'helpful_votes',
        'images',
        'verified_purchase',
        'comment',
        'commission_earned',
        'commission_percent',
        'amount_paid',
        'remaining_amount',
        'views',
        'google_review_link',
    ];

    protected $casts = [
        'rating' => 'integer',
        'helpful_votes' => 'integer',
        'images' => 'array',
        'verified_purchase' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
} 