<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    protected $fillable = ['user_id', 'chain_type', 'address'];
} 