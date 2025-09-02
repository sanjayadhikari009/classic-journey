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
        // For SQLite, we need to recreate the table to make rating nullable
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            // Create a temporary table with the correct structure
            Schema::create('reviews_temp', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('trip_id')->nullable();
                $table->unsignedBigInteger('product_id')->nullable();
                $table->text('comment')->nullable();
                $table->integer('rating')->nullable(); // This is the key fix
                $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
                $table->decimal('commission_earned', 10, 2)->default(0);
                $table->decimal('commission_percent', 5, 2)->default(1.00);
                $table->decimal('amount_paid', 10, 2)->default(0);
                $table->decimal('remaining_amount', 10, 2)->default(0);
                $table->integer('views')->default(0);
                $table->timestamps();

                // Foreign key constraints
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('trip_id')->references('id')->on('trips')->onDelete('set null');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            });

            // Copy data from old table to new table
            \DB::statement('INSERT INTO reviews_temp SELECT * FROM reviews');

            // Drop the old table
            Schema::dropIfExists('reviews');

            // Rename the temp table to the original name
            Schema::rename('reviews_temp', 'reviews');
        } else {
            // For other databases, use the standard approach
            Schema::table('reviews', function (Blueprint $table) {
                $table->integer('rating')->nullable()->change();
                $table->text('comment')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This is not easily reversible for SQLite, so we'll skip it
        if (Schema::getConnection()->getDriverName() !== 'sqlite') {
            Schema::table('reviews', function (Blueprint $table) {
                $table->integer('rating')->nullable(false)->change();
                $table->text('comment')->nullable(false)->change();
            });
        }
    }
};
