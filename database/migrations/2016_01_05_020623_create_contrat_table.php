<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titre");
            $table->string('description');
            $table->timestamp('debutLivraison');
            $table->timestamp('dateDeModif');
            $table->timestamp('dateDeFinLivraison');
            $table->timestamp('dateDeFinInscription');
            $table->integer("amapien_id")->unsigned();
            $table->integer("produit_id")->unsigned();
            $table->timestamps();
        });


            Schema::table('contrats', function($table) {
                $table->foreign('amapien_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
            Schema::table('contrats', function($table) {
            $table->foreign('produit_id')
                ->references('id')
                ->on('produits')
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
        Schema::drop('contrats');
    }
}
