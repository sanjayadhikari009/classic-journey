<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Http\Controllers\UserController;

class UpgradeUserLevels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:upgrade-levels {--user-id= : Specific user ID to upgrade} {--all : Upgrade all users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and upgrade user levels based on their journey count';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->option('user-id');
        $upgradeAll = $this->option('all');

        if ($userId) {
            $user = User::find($userId);
            if (!$user) {
                $this->error("User with ID {$userId} not found.");
                return 1;
            }
            $this->upgradeUser($user);
        } elseif ($upgradeAll) {
            $users = User::all();
            $this->info("Checking {$users->count()} users for level upgrades...");
            
            $upgradedCount = 0;
            foreach ($users as $user) {
                if ($this->upgradeUser($user)) {
                    $upgradedCount++;
                }
            }
            
            $this->info("Upgraded {$upgradedCount} users.");
        } else {
            $this->error("Please specify either --user-id or --all option.");
            return 1;
        }

        return 0;
    }

    private function upgradeUser(User $user): bool
    {
        $oldLevel = $user->level;
        $levelUpgrade = UserController::checkAndUpgradeLevel($user);
        
        if ($levelUpgrade['upgraded']) {
            $this->info("User {$user->username} (ID: {$user->id}) upgraded from Level {$oldLevel} to Level {$user->level}");
            return true;
        }
        
        return false;
    }
}
