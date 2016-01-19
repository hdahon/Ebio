<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('password');
            $table->string('tel');
            $table->string('nomCAdherant');
            $table->string('prenomCAdherant');
            $table->string('emailCAdherant');
            $table->string('telCAdherant');
            $table->integer('roleamapien_id')->unsigned()->nullable();;
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('roleamapien_id')->references('id')->on('roleamapiens');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
