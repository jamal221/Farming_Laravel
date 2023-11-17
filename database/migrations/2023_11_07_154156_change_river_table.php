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
        Schema::table('river', function (Blueprint $table) {
            $table->unsignedBigInteger('farmID');
            $table->foreign('farmID')
                    ->references('id')
                    ->on('farm')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->tinyInteger('sensor_depth')->change();
            $table->string('pip_size')->change();
            $table->string('height');
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
