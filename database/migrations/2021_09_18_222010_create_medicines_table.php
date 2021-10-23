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
            $table->unsignedBigInteger('laboratory_id');
            $table->string('name_medicine');
            $table->string('presentation');
            $table->string('main_component');
            $table->string('therapeutic_action');
            $table->double('price');
            $table->timestamps();
        });

        Schema::table('medicines', function (Blueprint $table) {
            $table->primary('serial_number');

            $table->foreign('laboratory_id')->nullable()->references('id')->on('laboratories')
            ->onDelete('cascade')->onUpdate('cascade');
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

            $table->dropForeign(['laboratory_id']);
            $table->dropColumn('laboratory_id');

            $table->dropPrimary('serial_number');
            $table->dropColumn('serial_number');
        });

        Schema::dropIfExists('medicines');
    }
}
