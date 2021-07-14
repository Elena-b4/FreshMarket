<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');

            $table->softDeletes();

//            index
            $table->index('order_id', 'order_products_order_idx');
            $table->index('product_id', 'order_products_product_idx');

//            fk
            $table->foreign('order_id', 'order_products_order_fk')->on('orders')->references('id')->onDelete('cascade');
            $table->foreign('product_id', 'order_products_product_fk')->on('products')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
