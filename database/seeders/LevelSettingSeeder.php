<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LevelSetting;

class LevelSettingSeeder extends Seeder
{
    public function run()
    {
        $levels = [
            [
                'level' => 1,
                'normal_commission' => 1.00,
                'stop_commission' => 5.00,
                'number_of_journey' => 40,
                'signup_bonus' => 10,
                'entry_fee' => 0,
            ],
            [
                'level' => 2,
                'normal_commission' => 1.50,
                'stop_commission' => 7.00,
                'number_of_journey' => 45,
                'signup_bonus' => 20,
                'entry_fee' => 249,
            ],
            [
                'level' => 3,
                'normal_commission' => 2.50,
                'stop_commission' => 10.00,
                'number_of_journey' => 50,
                'signup_bonus' => 30,
                'entry_fee' => 299,
            ],
            [
                'level' => 4,
                'normal_commission' => 3.00,
                'stop_commission' => 12.00,
                'number_of_journey' => 55,
                'signup_bonus' => 40,
                'entry_fee' => 349,
            ],
            [
                'level' => 5,
                'normal_commission' => 5.00,
                'stop_commission' => 15.00,
                'number_of_journey' => 70,
                'signup_bonus' => 50,
                'entry_fee' => 499,
            ],
        ];

        foreach ($levels as $data) {
            LevelSetting::updateOrCreate(['level' => $data['level']], $data);
        }
    }
} 