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
        Schema::create('diesel_pump', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('Q_debby');
            $table->string('H_Head');
            $table->string('H_min');
            $table->string('H_max');
            $table->string('kw');
            $table->string('HP');
            $table->string('RPM');
            $table->string('SN');
            $table->unsignedBigInteger('stationID');
            $table->foreign('stationID')
                    ->references('id')
                    ->on('station')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');  
            $table->unsignedBigInteger('farmID');
            $table->foreign('farmID')
                    ->references('id')
                    ->on('farm')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');   
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diesel_pump');
    }
};
