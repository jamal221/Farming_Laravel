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
        Schema::create('water_source', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('channelID');
            $table->unsignedBigInteger('netpipeID');
            $table->unsignedBigInteger('riverID');
            $table->unsignedBigInteger('chahID');
            $table->unsignedBigInteger('poolID');
            $table->unsignedBigInteger('makhzanID');
            $table->text('AuthLetterCode');
            $table->unsignedBigInteger('mountwater');
            $table->unsignedBigInteger('pipe');
            $table->unsignedBigInteger('elctroPipID');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_source');
    }
};
