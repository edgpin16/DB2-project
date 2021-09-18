<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->unsignedBigInteger('serial_number');
            $table->string('name_medicine');
            $table->string('presentation');
            $table->string('main_component');
            $table->string('therapeutic_action');
            $table->timestamps();
        });

        Schema::table('medicines', function (Blueprint $table) {
            $table->primary('serial_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropPrimary('serial_number');
            $table->dropColumn('serial_number');
        });

        Schema::dropIfExists('medicines');
    }
}
