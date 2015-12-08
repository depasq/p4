<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inst = ['SAO', 'MIT', 'PSU', 'CalTech', 'LSU', 'Univ of Michigan', 'MPE', 'ESA', 'JPL'];
        $faker = Faker::create();
        for ($i=0; $i<=10; $i++) {
            DB::table('profiles')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'institution' => $inst[rand(0,8)],
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'country' => $faker->country,
                'zip' => $faker->postcode,
                // 'primary_email' => $faker->email,
                // 'secondary_email' => $faker->email,
                // 'primary_phone' => $faker->phoneNumber,
                // 'secondary_phone' => $faker->phoneNumber,
                'user_id' => $i+1,
            ]);
        };
        DB::table('profiles')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'institution' => 'Harvard CfA',
            'street' => '60 Garden Street',
            'city' => 'Cambridge',
            'state' => 'MA',
            'country' => 'USA',
            'zip' => '02138',
            // 'primary_email' => 'jill@harvard.edu',
            // 'secondary_email' => $faker->email,
            // 'primary_phone' => $faker->phoneNumber,
            // 'secondary_phone' => $faker->phoneNumber,
            'user_id' => 12,
        ]);
        DB::table('profiles')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'institution' => 'Harvard CfA',
            'street' => '60 Garden Street',
            'city' => 'Cambridge',
            'state' => 'MA',
            'country' => 'USA',
            'zip' => '02138',
            // 'primary_email' => 'jamal@harvard.edu',
            // 'secondary_email' => $faker->email,
            // 'primary_phone' => $faker->phoneNumber,
            // 'secondary_phone' => $faker->phoneNumber,
            'user_id' => 13,
        ]);
    }
}
