<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodDeliverysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_deliverys', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->string('date_info');
            $table->integer('date');
            $table->integer('price');
            $table->integer('user_id');
            $table->enum('status',['-1','1']);
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
        Schema::dropIfExists('method_deliverys');
    }
}
