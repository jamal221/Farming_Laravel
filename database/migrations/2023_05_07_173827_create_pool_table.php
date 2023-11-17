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
        Schema::create('pool', function (Blueprint $table) {
            $table->id();
            $table->text('type_pool')->nullable();
            $table->tinyInteger('lenght');
            $table->tinyInteger('width');
            $table->tinyInteger('depth');
            $table->dateTime('buildTime')->nullable();
            $table->dateTime('applyTime')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pool');
    }
};
