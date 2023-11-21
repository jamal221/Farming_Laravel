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
        Schema::table('station', function (Blueprint $table) {
            $table->foreign('farmID')
                    ->references('id')
                    ->on('farm')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');   
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
