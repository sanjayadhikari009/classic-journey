<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposite extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'contact_number', 'status', 'chain_type', 'payment_screenshot'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 