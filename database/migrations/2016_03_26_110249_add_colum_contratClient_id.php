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
            $table->double('contratClient_id');
        });
        Schema::table('paniers', function($table) {
            $table->foreign('contratClient_id')
                ->references('id')
                ->on('contratClients')
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
           $table->dropForeign('paniers_contratClient_id_foreign');
           $table->dropColumn('contratClient_id');
           
        });
         
    }
}
