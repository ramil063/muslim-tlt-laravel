<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table){
            $table->increments('id');
            $table->string('title', 500);
            $table->string('code', 500);
        });

        Schema::create('category', function (Blueprint $table){
            $table->increments('id');
            $table->string('title', 500);
            $table->string('code', 500);
        });

        Schema::create('friday_sermon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 500);
            $table->string('slug', 500);
            $table->string('main_image');
            $table->text('description');
            $table->longText('content');
            $table->integer('status_id', false, true)
                ->references('id')->on('status');
            $table->integer('category_id', false, true)
                ->references('id')->on('category');
            $table->boolean('on_main');
            $table->boolean('on_slider');
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 500);
            $table->string('slug', 500);
            $table->string('main_image');
            $table->text('description');
            $table->longText('content');
            $table->integer('status_id', false, true)
                ->references('id')->on('status');
            $table->integer('category_id', false, true)
                ->references('id')->on('category');
            $table->boolean('on_main');
            $table->boolean('on_slider');
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
        Schema::drop('news');
        Schema::drop('friday_sermon');
        Schema::drop('status');
        Schema::drop('category');
    }
}
