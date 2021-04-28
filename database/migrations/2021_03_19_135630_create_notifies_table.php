<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commented_user_id')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->text('post_body')->nullable();
            $table->integer('replies_user_id')->nullable();
            $table->integer('post_id')->nullable();
            $table->integer('comment_id')->nullable();
            $table->integer('replies_id')->nullable();
            $table->integer('comment_status')->nullable();
            $table->integer('like_status')->nullable();
            $table->integer('like_id')->nullable();
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
        Schema::dropIfExists('notifies');
    }
}
