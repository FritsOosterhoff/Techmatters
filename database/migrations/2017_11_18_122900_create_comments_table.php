<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('text');
            $table->integer('user_id');
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->timestamps();
        });
    }

    /*
    comments
        id - integer
        body - text
        commentable_id - integer
        commentable_type - string
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
}
