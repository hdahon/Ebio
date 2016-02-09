<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\UserTableSeeder;
use Illuminate\Database\RoleAmapienTableSeeder;
use Illuminate\Database\PeriodiciteTableSeeder;

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
        $this->call('RoleAmapienTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('PeriodiciteTableSeeder');

    }
}
