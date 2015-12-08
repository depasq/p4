<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fromcity');
            $table->string('fromstate');
            $table->string('fromcountry');
            $table->string('arrivedate');
            $table->string('tocity');
            $table->string('tostate');
            $table->string('tocountry');
            $table->string('departdate');
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
        Schema::drop('travels');
    }
}
