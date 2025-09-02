<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'admin@travelslide.com',
        ], [
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('Admin@2025travelslide'),
            'is_admin' => true,
            'balance' => 0,
            'journey' => 0,
            'maximum_journey' => 40,
            'level' => 1,
            'commission' => 0,
        ]);
    }
} 