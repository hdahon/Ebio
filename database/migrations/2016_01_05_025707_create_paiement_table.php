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
            $table->double('Montant');
            $table->integer('quantite');
            $table->string('numeroCheque');
            $table->string('typePrix');
            $table->integer("amapien_id")->unsigned();
            $table->integer("contrat_id")->unsigned();
            $table->timestamps();

        });
            Schema::table('paiements', function($table) {
                $table->foreign('amapien_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');


                $table->foreign('contrat_id')
                ->references('id')
                ->on('contrats')
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
