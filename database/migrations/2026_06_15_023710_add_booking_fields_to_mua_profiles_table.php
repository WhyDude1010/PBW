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
        Schema::table('mua_profiles', function (Blueprint $table) {
            $table->json('packages')->nullable();
            $table->json('add_ons')->nullable();
            $table->json('available_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mua_profiles', function (Blueprint $table) {
            $table->dropColumn(['packages', 'add_ons', 'available_hours']);
        });
    }
};
