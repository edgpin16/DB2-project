<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employeer_CI');
            $table->string('university');
            $table->string('specialty');
            $table->date('start_internship');
            $table->date('end_internship');
            $table->boolean('continue_working');
            $table->timestamps();
        });

        Schema::table('interns', function (Blueprint $table) {
            $table->foreign('employeer_CI')->nullable()->references('CI')->on('employeers')
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

        Schema::table('interns', function (Blueprint $table) {
            $table->dropForeign(['employeer_CI']);
            $table->dropColumn('employeer_CI');
        });

        Schema::dropIfExists('interns');
    }
}
