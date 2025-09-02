<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'website',
        'email',
        'phone',
        'address',
        'country',
        'rating',
        'total_reviews',
        'status',
        'featured',
        'established_year',
        'specialties',
        'certifications'
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'featured' => 'boolean',
        'specialties' => 'array',
        'certifications' => 'array'
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
} 