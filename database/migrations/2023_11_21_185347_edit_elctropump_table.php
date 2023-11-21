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
        Schema::table('electro_pomp', function (Blueprint $table) {
            $table->string('Voltage');
            $table->string('Frequency');
            $table->string('Phase');
            $table->string('Current');
            $table->string('Power_factor');
            $table->string('kw');
            $table->string('HP');
            $table->string('Duty');
            $table->string('SN');
            $table->dropColumn('location');
            $table->dropColumn('status');

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
