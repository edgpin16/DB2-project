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
            $table->string('university');
            $table->date('date_registration');
            $table->timestamps();
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->primary('registry_number');
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
            $table->dropPrimary('registry_number');
            $table->dropColumn('registry_number');
        });

        Schema::dropIfExists('certificates');
    }
}
