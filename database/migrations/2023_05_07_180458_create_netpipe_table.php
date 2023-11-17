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
        Schema::create('netpipe', function (Blueprint $table) {
            $table->id();
            $table->text('type')->nullable();
            $table->tinyInteger('netpipD');
            $table->tinyInteger('pipwaterD');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('netpipe');
    }
};
