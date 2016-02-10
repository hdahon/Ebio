<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\UserTableSeeder;
<<<<<<< HEAD
use Illuminate\Database\RoleTableSeeder;
=======
use Illuminate\Database\RoleAmapienTableSeeder;
use Illuminate\Database\PeriodiciteTableSeeder;
>>>>>>> 40f047dc2175be9afc5d3bc704ba4511a9adbc4f

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
<<<<<<< HEAD
        $this->call('RoleTableSeeder');
=======
        $this->call('RoleAmapienTableSeeder');
>>>>>>> 40f047dc2175be9afc5d3bc704ba4511a9adbc4f
        $this->call('UserTableSeeder');
        $this->call('PeriodiciteTableSeeder');

    }
}
