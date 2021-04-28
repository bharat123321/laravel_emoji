<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();;
            $table->longText('body')->nullable();
            $table->integer('count')->nullable();
            $table->longText('video')->nullable();
             $table->integer('count_video')->nullable();
            $table->longText('image')->nullable() ;
            $table->longText('tag_name')->nullable();
            $table->integer('block')->nullable();
            $table->string('post_option');
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
        Schema::dropIfExists('posts');
    }
}
