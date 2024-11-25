<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandatoryTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandatory_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('last_performed_year');
            $table->foreignId('ptw_id')->constrained('ptws');
            $table->foreignId('subject_mandatory_training_id')->constrained('subjet_mandatory_trainings');
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
        Schema::dropIfExists('mandatory_trainings');
    }
}