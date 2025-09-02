<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'actual_arrival', 'chain_type', 'bank_card_number', 'contact_number', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 