<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the user panel seeder for dynamic user/admin/project data
        $this->call([
            UserPanelSeeder::class,
            ProductSeeder::class,
            LevelSettingSeeder::class,
            AdminSeeder::class, // Call the dedicated admin seeder
        ]);
    }
}