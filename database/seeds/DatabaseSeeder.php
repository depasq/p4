<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(AreaUserTableSeeder::class);

        Model::reguard();
    }
}
