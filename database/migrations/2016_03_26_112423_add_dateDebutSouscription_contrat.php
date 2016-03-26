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
            $table->timestamp('debutSouscription');
            $table->timestamp('finSouscription');
            $table->timestamp('vacance1');
            $table->timestamp('vacance2');
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
             $table->dropColumn('vacance1');
            $table->dropColumn('vacance2');
        });
    }
}
