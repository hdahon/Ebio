<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

         User::create(array(
            'nom'     => 'Referent',
            'prenom' => 'Referent prenom',
            'email'    => 'referent@gmail.com',
            'password' => Hash::make('mypass'),
            'tel' =>'0700000000',
            'roleamapien_id' => 3,
        ));
         User::create(array(
            'nom'     => 'Referent Plus',
            'prenom' => 'Referent Plus prenom',
            'email'    => 'referentplus@gmail.com',
            'password' => Hash::make('mypass'),
            'tel' =>'0700000000',
            'roleamapien_id' => 3,
        ));
         User::create(array(
            'nom'     => 'Rou',
            'prenom' => 'Hassatou',
            'email'    => 'nadhelhasso@gmail.com',
            'password' => Hash::make('mypass'),
            'tel' =>'0700000000',
            'roleamapien_id' => 3,
        ));
        User::create(array(
            'nom'     => 'BAUZAC',
            'prenom' => 'Amaury',
            'email'    => 'amaury.bauzac@gmail.com',
            'password' => Hash::make('bauzac'),
            'tel' =>'0674539268',
            'roleamapien_id' => 1,
        )); 
         User::create(array(
            'nom'     => 'BENATO',
            'prenom' => 'Cécile',
            'email'    => 'cecile.benato@gmail.com',
            'password' => Hash::make('benato'),
            'tel' =>'0609831145',
            'roleamapien_id' => 1,
        )); 
        User::create(array(
            'nom'     => 'BORIES',
            'prenom' => 'Camille',
            'email'    => 'camille.bories@gmail.com',
            'password' => Hash::make('bories'),
            'tel' =>'0781645336',
            'roleamapien_id' => 1,
        )); 
         User::create(array(
            'nom'     => 'FAYE',
            'prenom' => 'Mélina',
            'email'    => 'meli_faye@yahoo.fr',
            'password' => Hash::make('faye'),
            'tel' =>'0670301442',
            'roleamapien_id' => 1,
        )); 
          User::create(array(
            'nom'     => 'MIQUEL',
            'prenom' => 'Corinne',
            'email'    => 'corinnemiquel@free.fr',
            'password' => Hash::make('miquel'),
            'tel' =>'0612633300',
            'roleamapien_id' => 1,
        )); 

         User::create(array(
            'nom'     => 'GARINO',
            'prenom' => 'Marylou',
            'email'    => 'marylou.garino@gmail.com',
            'password' => Hash::make('garino'),
            'tel' =>'06 35 20 38 89',
            'roleamapien_id' => 1,
        ));   

        User::create(array(
            'nom'     => 'LEFEBVRE',
            'prenom' => 'Denis',
            'email'    => 'dle@crhea.cnrs.fr',
            'password' => Hash::make('lefebvre'),
            'tel' =>'0672773158',
            'roleamapien_id' => 1,
            'coadherant_id' =>7,
        )); 
        User::create(array(
            'nom'     => 'BERMOND',
            'prenom' => 'Christian',
            'email'    => 'bermondchristian@hotmail.com',
            'password' => Hash::make('bermond'),
            'tel' =>'06 35 39 78 45',
            'roleamapien_id' => 2,
            'numSiret' => '49117099900032',
            'adresse'=>'768 chemin du plan des clèdes - 83830 CALLAS',
        )); 
        User::create(array(
            'nom'     => 'FRANCA',
            'prenom' => 'Karine',
            'email'    => 'fermedesaurin@gmail.com',
            'password' => Hash::make('franca'),
            'tel' =>'06 21 41 20 46',
            'roleamapien_id' => 2,
            'numSiret' => '45026595400039',
            'adresse'=>'Ferme de Saurin - Route de Bargemon - 83131 MONTFERRAT',
        )); 
         User::create(array(
            'nom'     => 'HERROU',
            'prenom' => 'Cédric',
            'email'    => 'cedric.herrou@gmail.com',
            'password' => Hash::make('herrou'),
            'tel' =>'04 93 60 39 73',
            'roleamapien_id' => 2,
            'numSiret' => '48965039000011',
            'adresse'=>'Camp Saorgin - 06 540 BREUIL­SUR­ROYA',
        )); 
         User::create(array(
            'nom'     => 'MONI',
            'prenom' => 'Honoré',
            'email'    => 'lostal.france@gmail.com',
            'password' => Hash::make('moni'),
            'tel' =>'06 05 02 19 59',
            'roleamapien_id' => 2,
            'numSiret' => '',
            'adresse'=>'Fr. Cavaliggi 6/A - 12020 VALGRANA (CUNEO)',
        )); 
         User::create(array(
            'nom'     => 'MAILLARD',
            'prenom' => 'Stéphane',
            'email'    => 'ferme.m@live.fr',
            'password' => Hash::make('maillard'),
            'tel' =>'04 93 60 39 73',
            'roleamapien_id' => 2,
            'numSiret' => '43242979300016',
            'adresse'=>'LA FERRIERE - 97 RUE DES BAS SAOUVES - 06750 VALDEROURE',
        ));
        User::create(array(
            'nom'     => 'PACIFICO',
            'prenom' => 'Antoine',
            'email'    => 'exploitation.pacifico@yahoo.fr',
            'password' => Hash::make('pacifico'),
            'tel' =>'06 11 08 24 30',
            'roleamapien_id' => 2,
            'numSiret' => '45011409500018',
            'adresse'=>'Valescure - 83600 Fréjus',
        )); 
        User::create(array(
            'nom'     => 'PAPONE',
            'prenom' => 'Renaud',
            'email'    => 'renaudpapone@gmail.com',
            'password' => Hash::make('papone'),
            'tel' =>'06 12 23 11 99',
            'roleamapien_id' => 2,
            'numSiret' => '51950486400017',
            'adresse'=>'Lavancia - Les hauts des Blanquieries - 06260 PUGET-THENIERS',
        ));
         User::create(array(
            'nom'     => 'VEDRINES',
            'prenom' => 'Jérôme',
            'email'    => 'jerome@badab.fr',
            'password' => Hash::make('vedrines'),
            'tel' =>'06 71 48 72 54',
            'roleamapien_id' => 2,
            'numSiret' => '',
            'adresse'=>'268 route de saint Mathieu - 06130 GRASSE',
        ));       
      

    }
}
