<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleamapienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roleamapiens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomRole');
            $table->integer('niveau');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     *
     *
     */
    public function down()
    {
        Schema::drop('roleamapiens');
    }
}
