<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    public $timestamps = false;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

         User::create(array(
            'nom'     => 'Admin',
            'prenom' => 'Admin',
            'email'    => 'nadhelhasso@gmail.com',
            'password' => Hash::make('mypass'),

        ));
    }
}
