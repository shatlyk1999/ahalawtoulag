<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_trucks', function (Blueprint $table) {
            $table->id();
            $table->string('roly');
            $table->string('name');
            $table->string('edaraady');
            $table->string('email');
            $table->string('orderphone');
            $table->string('from');
            $table->string('to');
            $table->string('datetime');
            $table->string('yuk_gornush');
            $table->string('yuk_agram');
            $table->string('note');
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
        Schema::dropIfExists('order_trucks');
    }
}
