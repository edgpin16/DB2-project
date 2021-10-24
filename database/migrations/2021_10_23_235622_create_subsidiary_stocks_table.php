<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidiaryStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidiary_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subsidiary_id');
            $table->unsignedBigInteger('serial_number');
            $table->string('name_laboratory');
            $table->string('name_medicine');
            $table->string('presentation');
            $table->string('main_component');
            $table->string('therapeutic_action');
            $table->double('price_by_unit');
            $table->unsignedBigInteger('quantity');
            $table->timestamps();
        });

        Schema::table('subsidiary_stocks', function (Blueprint $table) {

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

        Schema::table('subsidiary_stocks', function (Blueprint $table) {

            $table->dropForeign(['subsidiary_id']);
            $table->dropColumn('subsidiary_id');

        });

        Schema::dropIfExists('subsidiary_stocks');
    }
}
