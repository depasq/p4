<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectReviewersAndContactInfo extends Migration
{
    public function up()
    {
        Schema::table('contact_info', function (Blueprint $table) {

            # Add a new INT field called `reviewer_id` that has to be unsigned (i.e. positive)
            $table->integer('reviewer_id')->unsigned();

            # This field `reviewer_id` is a foreign key that connects to the `id` field in the `reviewers` table
            $table->foreign('reviewer_id')->references('id')->on('reviewers');

        });
    }

    public function down()
    {
        Schema::table('contact_info', function (Blueprint $table) {

            # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('contact_info_reviewer_id_foreign');

            $table->dropColumn('reviewer_id');
        });
    }
}
