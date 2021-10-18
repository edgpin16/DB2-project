<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subsidiary_id');
            $table->unsignedBigInteger('laboratory_id');
            $table->string('analist');
            $table->string('payment_type');
            $table->string('payment_date');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('subsidiary_id')->nullable()->references('id')->on('subsidiaries')
            ->onUpdate('cascade'); //->onDelete('cascade')

            $table->foreign('laboratory_id')->nullable()->references('id')->on('laboratories')
            ->onUpdate('cascade'); //->onDelete('cascade')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['subsidiary_id']);
            $table->dropColumn('subsidiary_id');

            $table->dropForeign(['laboratory_id']);
            $table->dropColumn('laboratory_id');
        });

        Schema::dropIfExists('orders');
    }
}
