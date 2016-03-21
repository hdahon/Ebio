<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPeriodicite23TableCategorie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('periodicite2_id')->unsigned()->nullable();
            $table->integer('periodicite3_id')->unsigned()->nullable();
           
        });

        Schema::table('categories', function($table) {
            $table->foreign('periodicite2_id')
                ->references('id')
                ->on('periodicites')
                ->onDelete('cascade');
        });
         Schema::table('categories', function($table) {
            $table->foreign('periodicite3_id')
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
        Schema::table('categories', function($table) {
            $table->dropColumn('periodicite2_id');
            $table->dropColumn('periodicite_id');

        });
    }
}
