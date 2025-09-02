<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'price',
        'description',
        'quantity',
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(storage_path('app/public/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        return 'https://static.travelstride.com/store/main_image/3446042/attachment/a627ed27bbc846efc65eb50052367735.jpg';
    }

    public function getTotalAmountAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function getFormattedTotalAttribute()
    {
        return '$' . number_format($this->total_amount, 2);
    }
} 