<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('typePanier');
            $table->integer('referent_id')->unsigned();
            $table->integer('producteur_id')->unsigned();
            $table->integer('periodicite_id')->unsigned();
            $table->timestamps();
        });

         Schema::table('categories', function($table) {
            $table->foreign('referent_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('categories', function($table) {
            $table->foreign('producteur_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('categories', function($table) {
            $table->foreign('periodicite_id')
                ->references('id')
                ->on('periodicites')
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
        Schema::drop('categories');
    }
}
