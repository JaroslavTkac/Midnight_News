<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_comments', function($table){
           $table->increments('id');
           $table->text('comment');
           $table->boolean('is_review')->default(false);
           $table->boolean('is_news')->default(false);
           $table->boolean('is_trailer')->default(false);
           $table->integer('content_id');
           $table->integer('user_id');
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
        Schema::drop('users_comments');
    }
}
