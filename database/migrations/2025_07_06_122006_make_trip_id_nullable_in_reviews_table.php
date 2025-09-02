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
        if (Schema::hasColumn('reviews', 'trip_id')) {
            Schema::table('reviews', function (Blueprint $table) {
                try {
                    $table->unsignedBigInteger('trip_id')->nullable()->change();
                } catch (\Exception $e) {
                    // Column might already be nullable, ignore
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('reviews', 'trip_id')) {
            Schema::table('reviews', function (Blueprint $table) {
                try {
                    $table->unsignedBigInteger('trip_id')->nullable(false)->change();
                } catch (\Exception $e) {
                    // Column might already be not nullable, ignore
                }
            });
        }
    }
};
