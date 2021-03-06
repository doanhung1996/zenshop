<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_cats', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('slug');
            $table->integer('parent_id');
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
        Schema::dropIfExists('product_cats');
    }
}
