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
        Schema::create('unit', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('unitID');
            $table->string('electrical_conductivity');
            $table->string('size_hektare');
            $table->string('Soil_acidity');
            $table->string('Number_main_irrigation');
            $table->string('soil_pattern');
            $table->string('Genetic_profile');
            $table->string('Lime');
            $table->string('Number_plants_trees');
            $table->string('organic_matter');
            $table->string('planting_year');
            $table->string('Nitrate');
            $table->string('Year_operation');
            $table->string('nitrogen');
            $table->string('Age_plant_tree');
            $table->string('phosphorus');
            $table->string('Average_plant_tree_height');
            $table->string('potassium');
            $table->string('average_diameter');
            $table->string('Calcium');
            $table->string('Unit_coordinates');
            $table->string('magnesium');
            $table->string('number_of_soil');
            $table->string('sulfur');
            $table->string('Soil_moisture');
            $table->string('iron');
            $table->string('diameter_of_pipes');
            $table->string('zinc');
            $table->string('dropper');
            $table->string('Manganese');
            $table->string('Number_drippers');
            $table->string('copper');
            $table->string('total_number_droppers');
            $table->string('Bor');
            $table->string('Dropper_flow_rate');
            $table->string('sodium');
            $table->string('Sodium_Absorption');
            $table->unsignedBigInteger('FarmID');
            $table->foreign('FarmID')
                    ->references('id')
                    ->on('farm')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit');
    }
};
