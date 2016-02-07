<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\UserTableSeeder;
use Illuminate\Database\RoleTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
//
//      $this->call(UserTableSeeder::class);
//
//        Model::reguard();
        Eloquent::unguard();
        $this->call('RoleTableSeeder');
        $this->call('UserTableSeeder');
    }
}
