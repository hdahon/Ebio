<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PanierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paniers',function(Blueprint $table){
            $table->increments('id');
            $table->integer('livraison_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('produit_id')->unsigned();
            //peut-être à enlever plus tard
            $table->timestamp('creationPanier');
            $table->integer('quantite')->unsigned();
            $table->integer('montant')->unsigned();
        });

        Schema::table('paniers', function($table) {
            $table->foreign('livraison_id')->references('id')->on('livraisons')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paniers');
    }
}
