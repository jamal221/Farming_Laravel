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
        Schema::table('pool', function (Blueprint $table) {
            $table->unsignedBigInteger('farmID');
            $table->foreign('farmID')
                    ->references('id')
                    ->on('farm')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->tinyInteger('type_pool')->change();
            $table->string('lenght')->change();
            $table->string('width')->change();
            $table->string('depth')->change();
            $table->string('buildTime')->change();
            $table->string('applyTime')->change();
            $table->string('water_height');
            $table->string('inside_water');
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
