<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivraisonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('dateLivraison');
            $table->integer('quantite');
            $table->integer("amapien_id")->unsigned();
            $table->integer("produit_id")->unsigned();
            $table->integer("producteur_id")->unsigned();
            $table->date("dateDeLivraison");
            $table->timestamps();
        });
            Schema::table('livraisons', function($table) {
            $table->foreign('producteur_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
            Schema::table('livraisons', function($table) {
            $table->foreign('amapien_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
           
            Schema::table('livraisons', function($table) {
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
        Schema::drop('livraisons');
    }
}
