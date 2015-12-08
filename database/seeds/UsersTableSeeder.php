<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'first' => $faker->firstName,
                'last' => $faker->lastName,
                'prefix' => 'Dr.',
                'suffix' => $faker->suffix,
                'email' => $faker->email,
                'password' => $faker->password,
            ]);
        };
        $user = \PeerReview\User::firstOrCreate(['first' => 'Jill']);
        $user->prefix = 'Dr.';
        $user->first = 'Jill';
        $user->last = 'Harvard';
        $user->email = 'jill@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \PeerReview\User::firstOrCreate(['first' => 'Jamal']);
        $user->prefix = 'Dr.';
        $user->first = 'Jamal';
        $user->last = 'Harvard';
        $user->email = 'jamal@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();
    }
}
