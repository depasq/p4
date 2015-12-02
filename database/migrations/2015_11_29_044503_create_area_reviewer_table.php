<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaReviewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('area_reviewer', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             # `reviewer_id` and `area_id` will be foreign keys, so they have to be unsigned
             #  Note how the field names here correspond to the tables they will connect...
             # `reviewer_id` will reference the `reviewers table` and `area_id` will reference the `areas` table.
             $table->integer('reviewer_id')->unsigned();
             $table->integer('area_id')->unsigned();

             # Make foreign keys
             $table->foreign('reviewer_id')->references('id')->on('reviewers');
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
         Schema::drop('area_reviewer');
     }
}
