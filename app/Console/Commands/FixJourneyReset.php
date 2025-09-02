<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\LevelSetting;

class FixJourneyReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'journey:fix-reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix users who have 0 journeys but have balance and should be able to continue';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔧 Journey Reset Fix');
        $this->info('===================');
        $this->newLine();

        // Find users with 0 journeys but have balance
        $usersWithZeroJourneys = User::where('journey', '<=', 0)
            ->where('balance', '>', 0)
            ->get();

        $this->info("Found {$usersWithZeroJourneys->count()} users with 0 journeys but have balance");
        $this->newLine();

        $fixed = 0;

        foreach ($usersWithZeroJourneys as $user) {
            $this->line("User ID: {$user->id}, Username: {$user->username}");
            $this->line("- Current: Level {$user->level}, Journey {$user->journey}, Balance: USDT {$user->balance}");
            
            // Get level settings for this user's level
            $levelSetting = LevelSetting::where('level', $user->level)->first();
            
            if ($levelSetting) {
                // Reset journey to level's allocation
                $user->journey = $levelSetting->number_of_journey;
                $user->save();
                
                $this->line("- FIXED: Reset journey to {$levelSetting->number_of_journey} for Level {$user->level}");
                $fixed++;
            } else {
                // Default to 40 journeys for Level 1
                $user->journey = 40;
                $user->save();
                
                $this->line("- FIXED: Reset journey to 40 (default)");
                $fixed++;
            }
            
            $this->newLine();
        }

        $this->info("✅ Fixed {$fixed} users");
        $this->info("📋 These users can now start journeys again!");
        
        return Command::SUCCESS;
    }
}
