<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateDebutSouscriptionContrat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('contrats', function (Blueprint $table) {
            $table->date('debutSouscription');
            $table->date('finSouscription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('contrats', function (Blueprint $table) {
            $table->dropColumn('debutSouscription');
            $table->dropColumn('finSouscription');
        });
    }
}
