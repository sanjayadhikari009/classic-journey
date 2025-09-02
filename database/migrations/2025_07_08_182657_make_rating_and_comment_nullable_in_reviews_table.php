<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // For SQLite, we need to handle this differently
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            // SQLite doesn't support modifying columns directly, so we'll work around it
            // Just add the draft status support if possible
            try {
                \DB::statement("UPDATE reviews SET comment = NULL WHERE comment = ''");
                \DB::statement("UPDATE reviews SET rating = NULL WHERE rating = 0");
            } catch (\Exception $e) {
                // Ignore if there are issues
            }
        } else {
        Schema::table('reviews', function (Blueprint $table) {
                $table->text('comment')->nullable()->change();
                $table->integer('rating')->nullable()->change();
        });
            
            // Update the status enum to include 'draft'
            \DB::statement("ALTER TABLE reviews MODIFY status ENUM('pending', 'approved', 'rejected', 'draft') DEFAULT 'pending'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'sqlite') {
        Schema::table('reviews', function (Blueprint $table) {
                $table->text('comment')->nullable(false)->change();
                $table->integer('rating')->nullable(false)->change();
        });
            
            // Revert status enum
            \DB::statement("ALTER TABLE reviews MODIFY status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending'");
        }
    }
};
