<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnQuantiteLivraison extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livraisons', function($table) {
            $table->dropForeign('livraisons_amapien_id_foreign');
            $table->dropForeign('livraisons_produit_id_foreign');
        });
        Schema::table('livraisons', function ($table) {
            $table->dropColumn(['amapien_id','produit_id']);
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
