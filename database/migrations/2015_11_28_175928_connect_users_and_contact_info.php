<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectUsersAndContactInfo extends Migration
{
    public function up()
    {
        Schema::table('contact_info', function (Blueprint $table) {

            # Add a new INT field called `user_id` that has to be unsigned (i.e. positive)
            $table->integer('user_id')->unsigned();

            # This field `user_id` is a foreign key that connects to the `id` field in the `users` table
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::table('contact_info', function (Blueprint $table) {

            # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('contact_info_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
