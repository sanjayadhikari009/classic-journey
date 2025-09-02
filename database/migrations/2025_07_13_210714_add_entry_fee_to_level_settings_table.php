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
        Schema::table('level_settings', function (Blueprint $table) {
            $table->decimal('entry_fee', 10, 2)->default(0)->nullable()->after('number_of_journey');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('level_settings', function (Blueprint $table) {
            $table->dropColumn('entry_fee');
        });
    }
};
