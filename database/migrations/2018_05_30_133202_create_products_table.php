<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->text('product_name');
            $table->longText('description');
            $table->text('image');
            $table->float('price');
            $table->longText('detail');
            $table->float('product_discount');
            $table->integer('product_code');
            $table->integer('product_cat_id');
            $table->integer('user_id');
            $table->enum('status', ['-1','1']);
            $table->timestamps();
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
