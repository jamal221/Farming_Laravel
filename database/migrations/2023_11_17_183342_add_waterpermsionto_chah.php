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
        Schema::table('chah', function (Blueprint $table) {
            $table->string('water_permission_amount');
        });
        Schema::table('channel', function (Blueprint $table) {
            $table->string('water_permission_amount');
        });
        Schema::table('makhzan', function (Blueprint $table) {
            $table->string('water_permission_amount');
        });
        Schema::table('netpipe', function (Blueprint $table) {
            $table->string('water_permission_amount');
        });
        Schema::table('pool', function (Blueprint $table) {
            $table->string('water_permission_amount');
        });
        Schema::table('river', function (Blueprint $table) {
            $table->string('water_permission_amount');
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
