<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelSetting;
use App\Models\AppSetting;

class LevelSettingController extends Controller
{
    public function index()
    {
        $levels = LevelSetting::orderBy('level')->get();
        $signupBonus = AppSetting::where('key', 'signup_bonus')->value('value');
        return view('admin.level_setting', compact('levels', 'signupBonus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'levels' => 'required|array',
            'levels.*.level' => 'required|integer',
            'levels.*.normal_commission' => 'required|numeric',
            'levels.*.stop_commission' => 'required|numeric',
            'levels.*.number_of_journey' => 'required|integer',
            'levels.*.entry_fee' => 'required|numeric',
            'signup_bonus' => 'nullable|numeric',
        ]);
        foreach ($data['levels'] as $levelData) {
            LevelSetting::updateOrCreate(
                ['level' => $levelData['level']],
                [
                    'normal_commission' => $levelData['normal_commission'],
                    'stop_commission' => $levelData['stop_commission'],
                    'number_of_journey' => $levelData['number_of_journey'],
                    'signup_bonus' => $levelData['signup_bonus'] ?? 0,
                    'entry_fee' => $levelData['entry_fee'],
                ]
            );
        }
        // Save signup bonus as a global setting
        AppSetting::updateOrCreate(
            ['key' => 'signup_bonus'],
            ['value' => $data['signup_bonus']]
        );
        return redirect()->route('admin.level.setting')->with('success', 'Level settings updated successfully.');
    }
} 