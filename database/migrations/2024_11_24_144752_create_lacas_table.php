<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lacas', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('no');
            $table->string('validy');
            $table->string('scope');
            $table->foreignId('ptw_id')->constrained('ptws');
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
        Schema::dropIfExists('lacas');
    }
}