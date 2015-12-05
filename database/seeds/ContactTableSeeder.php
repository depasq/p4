<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactTableSeeder extends Seeder
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
            DB::table('contact_info')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'institution' => $inst[rand(0,8)],
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'country' => $faker->country,
                'primary_email' => $faker->email,
                'secondary_email' => $faker->email,
                'primary_phone' => $faker->phoneNumber,
                'secondary_phone' => $faker->phoneNumber,
                'user_id' => $i+1,
            ]);
        };
        DB::table('contact_info')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'institution' => 'Harvard',
            'primary_email' => 'jill@harvard.edu',
            'user_id' => 12,
        ]);
        DB::table('contact_info')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'institution' => 'Harvard',
            'primary_email' => 'jamal@harvard.edu',
            'user_id' => 13,
        ]);
    }
}
