<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('serial_number_medicine')->nullable();
            $table->unsignedBigInteger('quantity');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('order_id')->nullable()->references('id')->on('orders')
            ->onUpdate('cascade')->onDelete('cascade'); //->onDelete('cascade')

            $table->foreign('serial_number_medicine')->nullable()->references('serial_number')->on('medicines')->onUpdate('cascade')->onDelete('set null'); //->onDelete('cascade')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropColumn('order_id');

            $table->dropForeign(['serial_number_medicine']);
            $table->dropColumn('serial_number_medicine');
        });

        Schema::dropIfExists('products');
    }
}
