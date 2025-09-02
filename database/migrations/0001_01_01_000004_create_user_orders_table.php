<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('min_price', 12, 2)->nullable();
            $table->decimal('max_price', 12, 2)->nullable();
            $table->json('locked_journeys')->nullable();
            $table->timestamp('locked_until')->nullable()->comment('When the locked journeys expire');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_orders');
    }
}; 