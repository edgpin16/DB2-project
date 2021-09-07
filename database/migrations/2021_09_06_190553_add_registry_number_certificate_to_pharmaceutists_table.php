<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegistryNumberCertificateToPharmaceutistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pharmaceutists', function (Blueprint $table) {
            $table->unsignedBigInteger('certificate_registry_number')->after('employeer_CI');
            $table->foreign('certificate_registry_number')->nullable()->references('registry_number')->on('certificates')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pharmaceutists', function (Blueprint $table) {
            $table->dropForeign(['certificate_registry_number']);
            $table->dropColumn('certificate_registry_number');
        });
    }
}
