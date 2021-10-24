<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsToPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts_to_pays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('subsidiary_id');
            $table->unsignedBigInteger('laboratory_id');
            $table->unsignedDouble('amount_to_pay');
            $table->timestamps();
        });

        Schema::table('debts_to_pays', function (Blueprint $table) {
            $table->foreign('order_id')->nullable()->references('id')->on('orders')
            ->onUpdate('cascade')->onDelete('set null');; 

            $table->foreign('subsidiary_id')->nullable()->references('id')->on('subsidiaries')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('debts_to_pays', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropColumn('order_id');

            $table->dropForeign(['subsidiary_id']);
            $table->dropColumn('subsidiary_id');
        });

        Schema::dropIfExists('debts_to_pays');
    }
}
