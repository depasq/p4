<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('area_user', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             # `user_id` and `area_id` will be foreign keys, so they have to be unsigned
             #  Note how the field names here correspond to the tables they will connect...
             # `user_id` will reference the `reviewers table` and `area_id` will reference the `areas` table.
             $table->integer('user_id')->unsigned();
             $table->integer('area_id')->unsigned();

             # Make foreign keys
             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('area_id')->references('id')->on('areas');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('area_user');
     }
}
