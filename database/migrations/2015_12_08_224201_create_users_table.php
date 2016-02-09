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
            $table->string('adresse');
            $table->string('numSiret');
            $table->integer('roleamapien_id')->unsigned()->nullable();
            //Id du coadherant
            $table->integer('coadherant_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('roleamapien_id')->references('id')->on('roleamapiens');
        });
        Schema::table('users', function($table) {
            $table->foreign('coadherant_id')->references('id')->on('users');
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
