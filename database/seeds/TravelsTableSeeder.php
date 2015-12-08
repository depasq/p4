<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i<=10; $i++) {
            DB::table('travels')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'fromcity' => $faker->city,
                'fromstate' => $faker->stateAbbr,
                'fromcountry' => $faker->country,
                'tocity' => $faker->city,
                'tostate' => $faker->stateAbbr,
                'tocountry' => $faker->country,
                'arrivedate' => '06/01/2016',
                'departdate' => '06/09/2016',
                'user_id' => $i+1,
            ]);
        };
        DB::table('travels')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'user_id' => 12,
        ]);
        DB::table('travels')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'user_id' => 13,
        ]);
    }
}
