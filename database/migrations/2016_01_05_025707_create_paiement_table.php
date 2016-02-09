<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaiementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->increments('id');
            $table->double('montant');
            $table->string('numeroCheque');
            $table->integer('quantite');
            $table->double('cout');
            $table->string('Banque');
            $table->string('titulaire');    
            $table->integer('nbPanier');
            $table->integer("amapien_id")->unsigned();
            $table->integer("referent_id")->unsigned();
            $table->integer("contratClient_id")->unsigned();
            $table->integer("producteur_id")->unsigned();
            $table->string('mois');
            $table->timestamps();

        });
            Schema::table('paiements', function($table) {
                $table->foreign('amapien_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
            Schema::table('paiements', function($table) {
                $table->foreign('producteur_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
                });
            Schema::table('paiements', function($table) {
                $table->foreign('referent_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
                });
            Schema::table('paiements', function($table) {
                $table->foreign('contratClient_id')
                ->references('id')
                ->on('contratClients')
                ->onDelete('cascade');
            });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paiements');
    }
}
