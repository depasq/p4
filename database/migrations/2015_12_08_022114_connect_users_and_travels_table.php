<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectUsersAndTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travels', function (Blueprint $table) {

            # Add a new INT field called `user_id` that has to be unsigned (i.e. positive)
            $table->integer('user_id')->unsigned();

            # This field `user_id` is a foreign key that connects to the `id` field in the `users` table
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('travel_user_id_foreign');

        $table->dropColumn('user_id');
    }
}
