<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFullRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('full_comment_id');
            $table->integer('post_id');
            $table->integer('full_reply_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->text('reply');
            $table->text('reply_fname');
            $table->text('reply_lname');
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
        Schema::dropIfExists('full_replies');
    }
}
