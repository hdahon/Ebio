<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCategorieProducteurLivraison extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('livraisons', function($table) {
            $table->dropForeign('livraisons_categorie_id_foreign');
            $table->dropForeign('livraisons_producteur_id_foreign');
         });
        
        Schema::table('livraison', function ($table) {
           $table->dropColumn(['categorie_id','producteur_id']);
        });
       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
