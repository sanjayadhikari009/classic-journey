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
        Schema::table('deposites', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('amount');
            if (!Schema::hasColumn('deposites', 'chain_type')) {
                $table->string('chain_type')->nullable()->after('payment_method');
            }
            if (!Schema::hasColumn('deposites', 'payment_screenshot')) {
                $table->string('payment_screenshot')->nullable()->after('chain_type');
            }
        });
        Schema::table('withdraws', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deposites', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            if (Schema::hasColumn('deposites', 'chain_type')) {
                $table->dropColumn('chain_type');
            }
            if (Schema::hasColumn('deposites', 'payment_screenshot')) {
                $table->dropColumn('payment_screenshot');
            }
        });
        Schema::table('withdraws', function (Blueprint $table) {
            $table->dropColumn('payment_method');
        });
    }
};
