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
        Schema::table('users', function (Blueprint $table) {
            // Only add the missing columns
            $table->string('avatar')->nullable()->after('balance');
            $table->text('bio')->nullable()->after('avatar');
            $table->string('location')->nullable()->after('bio');
            $table->date('date_of_birth')->nullable()->after('location');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('date_of_birth');
            // $table->booleasn('is_admin')->default(false)->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'avatar', 'bio', 'location', 'date_of_birth', 'gender'
            ]);
        });
    }
};
