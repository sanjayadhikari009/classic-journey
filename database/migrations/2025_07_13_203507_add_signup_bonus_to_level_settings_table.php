<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('level_settings', function (Blueprint $table) {
            $table->decimal('signup_bonus', 8, 2)->nullable()->after('number_of_journey');
        });
    }

    public function down()
    {
        Schema::table('level_settings', function (Blueprint $table) {
            $table->dropColumn('signup_bonus');
        });
    }
};
