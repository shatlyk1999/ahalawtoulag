<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normatives', function (Blueprint $table) {
            $table->id();
            $table->string('title_tm');
            $table->string('title_en');
            $table->string('title_ru');
            $table->text('description_tm');
            $table->text('description_en');
            $table->text('description_ru');
            $table->date('date')->nullable()->default(now()->format('Y-m-d'));
            $table->string('pdf');
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
        Schema::dropIfExists('normatives');
    }
}
