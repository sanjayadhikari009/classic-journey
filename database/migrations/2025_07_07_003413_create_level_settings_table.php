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
        Schema::create('level_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('level')->unique();
            $table->decimal('normal_commission', 5, 2)->default(1); // percent
            $table->decimal('stop_commission', 5, 2)->default(0); // percent
            $table->unsignedInteger('number_of_journey')->default(0);
            $table->timestamps();
        });
        // Create app_settings table for global settings like signup_bonus
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_settings');
        Schema::dropIfExists('app_settings');
    }
};
