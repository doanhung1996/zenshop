<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('type_connect');
            $table->text('slug');
            $table->integer('connect_id');
            $table->integer('parent_id');
            $table->integer('menu_type_id');
            $table->text('menu_type_title');;
            $table->integer('menu_order');;
            $table->enum('status', ['1','-1']);
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
        Schema::dropIfExists('menu_items');
    }
}
