<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmeLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ame_licenses', function (Blueprint $table) {
            $table->id();
            $table->string('ame_license_no')->unique();
            $table->string('vut')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('ptw_id')->nullable();
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
        Schema::dropIfExists('ame_licenses');
    }
}