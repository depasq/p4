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
                'username' => $faker->username,
                'first' => $faker->firstName,
                'last' => $faker->lastName,
                'prefix' => 'Dr.',
                'suffix' => $faker->suffix,
                'password' => $faker->password,
            ]);
        };
        $user = \PeerReview\User::firstOrCreate(['first' => 'Jill']);
        $user->first = 'Jill';
        $user->username = 'jill';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \PeerReview\User::firstOrCreate(['first' => 'Jamal']);
        $user->first = 'Jamal';
        $user->username = 'jamal';
        $user->password = \Hash::make('helloworld');
        $user->save();
    }
}
