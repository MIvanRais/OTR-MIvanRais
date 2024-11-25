<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_materials', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->foreignId('ptw_id')->constrained('ptws');
            $table->foreignId('subject_assessment_material_id')->constrained('subject_assessment_trainings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessment_materials');
    }
}