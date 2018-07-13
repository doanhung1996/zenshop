<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('fullname');
            $table->string('email');
            $table->text('phone');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('pay');
            $table->string('delivery');
            $table->text('order_code');
            $table->integer('total_qty');
            $table->integer('total_sale');
            $table->string('order_date');
            $table->string('date_transport');
            $table->integer('customer_id');
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
        Schema::dropIfExists('orders');
    }
}
