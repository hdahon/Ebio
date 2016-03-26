<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumContratClientId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
     {
        Schema::table('paniers', function($table) {
            $table->integer('contratclient_id')->unsigned();
        });
        Schema::table('paniers', function($table) {
            $table->foreign('contratclient_id')
                ->references('id')
                ->on('contratclients')
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
        Schema::table('paniers', function($table) {
            $table->dropColumn('contratclient_id');
           $table->dropForeign('paniers_contratclient_id_foreign');
           
           
        });
         
    }
}
