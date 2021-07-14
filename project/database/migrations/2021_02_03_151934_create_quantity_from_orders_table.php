<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantityFromOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_from_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('value');
            $table->unsignedBigInteger('order_id');

            $table->softDeletes();

//            index
            $table->index('order_id', 'quantity_from_orders_order_idx');

//            fk
            $table->foreign('order_id', 'quantity_from_orders_order_fk')->on('orders')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_from_orders');
    }
}
