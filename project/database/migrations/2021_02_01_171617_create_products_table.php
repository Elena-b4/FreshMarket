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
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->string('main_image_path');
            $table->integer('sale_price');
            $table->integer('base_price');
            $table->boolean('in_stock');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('manufacture_id');

            $table->softDeletes();

//            index
            $table->index('category_id', 'product_category_idx');
            $table->index('manufacture_id', 'product_manufacture_idx');

//            fk
            $table->foreign('category_id', 'product_category_fk')->on('categories')->references('id')->onDelete('cascade');
            $table->foreign('manufacture_id', 'product_manufacture_fk')->on('manufactures')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
