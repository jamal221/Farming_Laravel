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
        Schema::create('river_analyze_water', function (Blueprint $table) {
            $table->id();
            $table->string('EC');
            $table->string('PH');
            $table->string('SAR');
            $table->string('Hardness');
            $table->string('TD5');
            $table->string('aluminum');
            $table->string('Arsenic');
            $table->string('beryllium');
            $table->string('cadmium');
            $table->string('Cobalt');
            $table->string('chromium');
            $table->string('copper');
            $table->string('Fe');
            $table->string('lithium');
            $table->string('Manganese');
            $table->string('molybdenum');
            $table->string('nickel');
            $table->string('palladium');
            $table->string('Selenium');
            $table->string('vanadium');
            $table->string('Zinc');
            $table->string('Fluorine');
            $table->string('Br');
            $table->string('Nitrate');
            $table->string('microbial');
            $table->string('salinity');
            $table->string('animosity');
            $table->unsignedBigInteger('farmID');
            $table->foreign('farmID')
                    ->references('id')
                    ->on('farm')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('riverID');
            $table->foreign('riverID')
                            ->references('id')
                            ->on('river')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->softDeletes();       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('river_analyze_water');
    }
};
