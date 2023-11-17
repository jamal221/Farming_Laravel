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
        //
        Schema::table('chah', function (Blueprint $table) {
            $table->string('diameter')->change();
            $table->string('waterHeight')->change();
            $table->string('chahHeight')->change();
            $table->string('wateramount')->change();
            $table->tinyInteger('type')->change();
            $table->tinyInteger('bodyType')->change();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
