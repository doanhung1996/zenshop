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
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('product_name',255)->index();
            $table->string('product_name_seal',255)->index();
            $table->longText('description');
            $table->text('image');
            $table->text('images')->nullable();
            $table->text('images_s')->nullable();
            $table->text('link_video');
            $table->bigInteger('price');
            $table->longText('detail');
            $table->integer('product_discount');
            $table->text('product_code');
            $table->integer('product_cat_id');
            $table->integer('user_id');
            $table->enum('status', ['-1','1']);
            $table->text('slug');
            $table->bigInteger('product_purchase');
            $table->integer('category_id');
            $table->integer('viewer')->default(0);
            $table->integer('cart')->default(0);
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
