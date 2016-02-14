<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratClients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id")->unsigned();
            $table->integer("contrat_id")->unsigned();
            $table->integer('periodicite_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('contratClients', function($table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('contratClients', function($table) {
            $table->foreign('contrat_id')
                ->references('id')
                ->on('contrats')
                ->onDelete('cascade');
        });
        Schema::table('contratClients', function($table) {
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
        Schema::drop('contratClients');
    }
}
