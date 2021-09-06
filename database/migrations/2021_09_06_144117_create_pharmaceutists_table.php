<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaceutistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmaceutists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employeer_CI');
            $table->unsignedInteger('sanitary_permise_number');
            $table->unsignedInteger('schooling_number');
            $table->timestamps();
        });

        Schema::table('pharmaceutists', function (Blueprint $table) {
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

        Schema::table('employeers', function (Blueprint $table) {
            $table->dropForeign(['employeer_CI']);
            $table->dropColumn('employeer_CI');
        });

        Schema::dropIfExists('pharmaceutists');
    }
}
