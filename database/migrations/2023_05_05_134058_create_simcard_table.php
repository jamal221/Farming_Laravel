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
        Schema::create('simcard', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->text('sim_number');
            $table->text('contact_name');
            $table->text('contact_family');
            $table->text('contact_number');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simcard');
    }
};
