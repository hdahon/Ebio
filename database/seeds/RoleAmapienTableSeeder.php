<?php

use Illuminate\Database\Seeder;
use App\RoleAmapien;
class RoleAmapienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roleamapiens')->delete();

         RoleAmapien::create(array(
            'nomRole'     => 'Role_AMAPIEN',
            'niveau' => '1',
        ));
        RoleAmapien::create(array(
            'nomRole'     => 'Role_PRODUCTEUR',
            'niveau' => '2',
        ));
         RoleAmapien::create(array(
            'nomRole'     => 'Role_REFERENT',
            'niveau' => '3',
        ));
          RoleAmapien::create(array(
            'nomRole'     => 'Role_REFERENTPL',
            'niveau' => '4',
        ));
           RoleAmapien::create(array(
            'nomRole'     => 'Role_ADMIN',
            'niveau' => '5',
        ));
    }
}