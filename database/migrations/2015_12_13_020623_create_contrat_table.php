categorie<?php

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
            $table->string('titre');
            $table->timestamp('debutLivraison');
            $table->timestamp('dateDeFinLivraison');
            $table->integer('categorie_id')->unsigned();
            $table->timestamp('vacance');
            $table->timestamps();
        });


            
            Schema::table('contrats', function($table) {
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories')
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
