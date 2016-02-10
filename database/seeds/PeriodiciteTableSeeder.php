<?php

use Illuminate\Database\Seeder;
use App\Periodicite;
class PeriodiciteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodicites')->delete();

         Periodicite::create(array(
            'libelle'     => 'Bi-mensuel semaine paire',
        ));
        Periodicite::create(array(
            'libelle'     => 'Bi-mensuel semaine impaire',
        ));
         Periodicite::create(array(
            'libelle'     => 'Hebdomadaire',
        ));
        Periodicite::create(array(
            'libelle'     => 'Ponctuel',
        ));
        Periodicite::create(array(
            'libelle'     => 'Mensuel semaine paire',
        ));
        Periodicite::create(array(
            'libelle'     => 'Mensuel semaine impaire',
        ));
        Periodicite::create(array(
            'libelle'     => 'Hebdomadaire ou Bi-mensuel',
        ));
        

    }
}