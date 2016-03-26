<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMontantAPayerParMois extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratClients', function($table) {
            $table->double('montantParMois');
        });
        Schema::table('panier', function($table) {
            $table->double('contratClient_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratClients', function($table) {
           $table->dropColumn('montantParMois');
        });
        Schema::table('panier', function($table) {
           $table->dropColumn('contratClient_id');
        });
    }
}
