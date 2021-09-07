<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorMinorIntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_minor_inters', function (Blueprint $table) {
            $table->unsignedBigInteger('CI');
            $table->unsignedBigInteger('minor_intern_id');
            $table->string('name');
            $table->string('surname');
            $table->date('date_birth');
            $table->timestamps();
        });

        Schema::table('tutor_minor_inters', function (Blueprint $table) {
            $table->primary('CI');

            $table->foreign('minor_intern_id')->nullable()->references('id')->on('minor_inters')
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

        Schema::table('tutor_minor_inters', function (Blueprint $table) {
            $table->dropForeign(['minor_intern_id']);
            $table->dropColumn('minor_intern_id');

            $table->dropPrimary('CI');
            $table->dropColumn('CI');
        });

        Schema::dropIfExists('tutor_minor_inters');
    }
}
