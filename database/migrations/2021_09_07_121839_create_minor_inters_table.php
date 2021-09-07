<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinorIntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minor_inters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intern_id');
            $table->unsignedBigInteger('licence_number');
            $table->timestamps();
        });

        Schema::table('minor_inters', function (Blueprint $table) {
            $table->foreign('intern_id')->nullable()->references('id')->on('interns')
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

        Schema::table('minor_inters', function (Blueprint $table) {
            $table->dropForeign(['intern_id']);
            $table->dropColumn('intern_id');
        });

        Schema::dropIfExists('minor_inters');
    }
}
