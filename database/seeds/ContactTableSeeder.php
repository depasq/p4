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
        $faker = Faker::create();
        for ($i=0; $i<=10; $i++) {
            DB::table('contact_info')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'reviewer_id' => $i,
                'institution' => 'Smithsonian Astrophysical Observatory',
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'country' => $faker->country,
                'primary_email' => $faker->email,
                'secondary_email' => $faker->email,
                'primary_phone' => $faker->phoneNumber,
                'secondary_phone' => $faker->phoneNumber,
                'reviewer_id' => $i+1,
            ]);
        };
    }
}
