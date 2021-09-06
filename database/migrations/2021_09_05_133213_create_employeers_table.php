<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeers', function (Blueprint $table) {
            $table->unsignedBigInteger('CI');
            $table->unsignedBigInteger('subsidiary_id');
            $table->string('name');
            $table->string('surname');
            $table->date('date_birth');
            $table->double('salary');
            $table->string('category');
            $table->timestamps();
        });

        Schema::table('employeers', function (Blueprint $table) {
            $table->primary('CI');

            $table->foreign('subsidiary_id')->nullable()->references('id')->on('subsidiaries')
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
            $table->dropForeign(['subsidiary_id']);
            $table->dropColumn('subsidiary_id');

            $table->dropPrimary('CI');
            $table->dropColumn('CI');
        });

        Schema::dropIfExists('employeers');
    }
}
