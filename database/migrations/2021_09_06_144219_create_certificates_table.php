<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('registry_number');
            $table->unsignedBigInteger('pharmaceutist_id');
            $table->string('university');
            $table->date('date_registration');
            $table->timestamps();
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->primary('registry_number');

            $table->foreign('pharmaceutist_id')->nullable()->references('id')->on('pharmaceutists')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {

            $table->dropForeign(['pharmaceutist_id']);
            $table->dropColumn('pharmaceutist_id');

            $table->dropPrimary('registry_number');
            $table->dropColumn('registry_number');
        });

        Schema::dropIfExists('certificates');
    }
}
