<?php
// app/database/seeds/UserTableSeeder.php
/**
 * Created by PhpStorm.
 * User: hasso
 * Date: 08/12/2015
 * Time: 22:34
 */
use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
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