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
            // User preferences
            $table->string('language')->default('en')->after('is_admin');
            $table->string('currency')->default('USD')->after('language');
            $table->string('timezone')->default('UTC')->after('currency');
            $table->string('date_format')->default('MM/DD/YYYY')->after('timezone');
            
            // Notification preferences
            $table->boolean('email_notifications')->default(true)->after('date_format');
            $table->boolean('sms_notifications')->default(false)->after('email_notifications');
            $table->boolean('marketing_emails')->default(true)->after('sms_notifications');
            $table->boolean('booking_confirmations')->default(true)->after('marketing_emails');
            $table->boolean('price_alerts')->default(true)->after('booking_confirmations');
            
            // Privacy settings
            $table->boolean('profile_visible')->default(true)->after('price_alerts');
            $table->boolean('reviews_visible')->default(true)->after('profile_visible');
            $table->boolean('activity_status')->default(true)->after('reviews_visible');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'language', 'currency', 'timezone', 'date_format',
                'email_notifications', 'sms_notifications', 'marketing_emails',
                'booking_confirmations', 'price_alerts', 'profile_visible',
                'reviews_visible', 'activity_status'
            ]);
        });
    }
};
