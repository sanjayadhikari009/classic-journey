<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // This migration is now redundant since product_id is included in create_reviews_table
        // But we'll keep it for safety in case it's already been run
        if (!Schema::hasColumn('reviews', 'product_id')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->unsignedBigInteger('product_id')->nullable()->after('trip_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only try to drop the column if it exists
        if (Schema::hasColumn('reviews', 'product_id')) {
            // For SQLite, we need to handle foreign key constraints differently
            if (Schema::getConnection()->getDriverName() === 'sqlite') {
                // Drop foreign key constraint first if it exists
                try {
                    DB::statement('PRAGMA foreign_keys=OFF');
                    Schema::table('reviews', function (Blueprint $table) {
                        $table->dropColumn('product_id');
                    });
                    DB::statement('PRAGMA foreign_keys=ON');
                } catch (\Exception $e) {
                    DB::statement('PRAGMA foreign_keys=ON');
                    // If dropping fails, just ignore it
                }
            } else {
                // For other databases, drop foreign key first
                try {
                    Schema::table('reviews', function (Blueprint $table) {
                        $table->dropForeign(['product_id']);
                    });
                } catch (\Exception $e) {
                    // Foreign key might not exist, continue
                }
                
                Schema::table('reviews', function (Blueprint $table) {
                    $table->dropColumn('product_id');
                });
            }
        }
    }
};
