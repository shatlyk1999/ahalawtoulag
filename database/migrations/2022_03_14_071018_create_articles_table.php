<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug',255)->nullable()->unique();
            $table->string('aboutTitle_tm');
            $table->string('aboutTitle_en');
            $table->string('aboutTitle_ru');
            $table->longText('aboutCompany_tm');
            $table->longText('aboutCompany_en');
            $table->longText('aboutCompany_ru');
            $table->string('instagram');
            $table->string('email');
            $table->string('domain');
            $table->string('phoneNumber');
            $table->string('phoneNumber2');
            $table->string('faxNumber');
            $table->string('address_tm');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('address2_tm');
            $table->string('address2_en');
            $table->string('address2_ru');
            $table->string('image');
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
        Schema::dropIfExists('articles');
    }
}
