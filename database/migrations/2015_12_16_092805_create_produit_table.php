<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nomProduit');
            $table->integer("referent_id")->unsigned();

            $table->integer("producteur_id")->unsigned();

            $table->timestamps();




        });
        Schema::table('produits', function($table) {
            $table->foreign('referent_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('produits', function($table) {
            $table->foreign('producteur_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('produits');

    }
}
