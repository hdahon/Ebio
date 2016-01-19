<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
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
            'nomRole'     => 'ROLE_ADMIN',
            'niveau' => 5,
        ));
        RoleAmapien::create(array(
            'nomRole'     => 'ROLE_REFPLUS',
            'niveau' => 4,
        ));
        RoleAmapien::create(array(
            'nomRole'     => 'ROLE_REF',
            'niveau' => 3,
        ));

        RoleAmapien::create(array(
            'nomRole'     => 'ROLE_PRODUCTEUR',
            'niveau' => 2,
        ));

        RoleAmapien::create(array(
            'nomRole'     => 'ROLE_AMAPIEN',
            'niveau' => 1,
        ));
    }


}
