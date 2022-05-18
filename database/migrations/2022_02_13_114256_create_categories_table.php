<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->string('title_tm');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('slug_tm')->nullable();
            $table->string('slug_ru')->nullable();
            $table->string('slug_en')->nullable();
            $table->integer('sort')->default(0);
            $table->timestamps();    
            
            // $table->id();
            // $table->string('title');
            // $table->string('slug')->nullable();
            // $table->integer('parent_id')->default(0);
            // $table->integer('sort_order')->default(0);
            // $table->boolean('top');
            // $table->boolean('status');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
