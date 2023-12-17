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
        Schema::create('fertilize_tank', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('InjectionSystem');
            $table->tinyInteger('type');
            $table->string('fertilizers');
            $table->string('tank_amount');
            $table->string('input_pip_num');
            $table->string('out_pip_num');
            $table->string('control_debby_pip_num');
            $table->string('check_tank_num');
            $table->unsignedBigInteger('farmID');
            $table->foreign('farmID')
                    ->references('id')
                    ->on('farm')
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
        Schema::dropIfExists('fertilize_tank');
    }
};
