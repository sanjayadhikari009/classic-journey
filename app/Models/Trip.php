<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'destination',
        'duration',
        'price',
        'discount_price',
        'image',
        'gallery',
        'included',
        'excluded',
        'itinerary',
        'highlights',
        'status',
        'featured',
        'company_id',
        'category',
        'difficulty',
        'group_size',
        'start_date',
        'end_date',
        'seats_available',
        'total_seats',
        'journey_locked',
        'journey_price'
    ];

    protected $casts = [
        'gallery' => 'array',
        'included' => 'array',
        'excluded' => 'array',
        'itinerary' => 'array',
        'highlights' => 'array',
        'featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'journey_locked' => 'boolean',
        'journey_price' => 'decimal:2'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function bookings()
    {
        return $this->hasMany(UserOrder::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeJourneyLocked($query)
    {
        return $query->where('journey_locked', true);
    }

    public function scopeJourneyUnlocked($query)
    {
        return $query->where('journey_locked', false);
    }
} 