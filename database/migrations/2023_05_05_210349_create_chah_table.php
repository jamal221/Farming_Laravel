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
        Schema::create('chah', function (Blueprint $table) {
            $table->id();
            $table->text('type');
            $table->text('bodyType');
            $table->tinyInteger('diameter');
            $table->tinyInteger('waterHeight');
            $table->tinyInteger('chahHeight');
            $table->tinyInteger('wateramount');
            $table->text('year');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chah');
    }
};
