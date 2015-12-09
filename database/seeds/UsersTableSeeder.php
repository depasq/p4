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

        $admin = new PeerReview\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $standard = new PeerReview\Role();
        $standard->name         = 'standard';
        $standard->display_name = 'Standard User'; // optional
        $standard->description  = 'User is allowed to manage their own data'; // optional
        $standard->save();

        $editUser = new PeerReview\Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        $admin->attachPermission($editUser);

        for ($i=0; $i<=10; $i++) {
            $user = \PeerReview\User::create();
            $user->prefix = 'Dr.';
            $user->suffix = $faker->suffix;
            $user->first = $faker->firstName;
            $user->last = $faker->lastName;
            $user->email = $faker->email;
            $user->password = $faker->password;
            $user->attachRole($standard);
            $user->save();
        };

        //Make Jill an admin of the site who can manage users
        $user = \PeerReview\User::firstOrCreate(['first' => 'Jill']);
        $user->prefix = 'Dr.';
        $user->first = 'Jill';
        $user->last = 'Harvard';
        $user->email = 'jill@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->attachRole($admin);
        $user->save();

        //Jamal is a regular user with no admin permissions
        $user = \PeerReview\User::firstOrCreate(['first' => 'Jamal']);
        $user->prefix = 'Dr.';
        $user->first = 'Jamal';
        $user->last = 'Harvard';
        $user->email = 'jamal@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->attachRole($standard);
        $user->save();
    }
}
