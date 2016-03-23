<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableProduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->integer('unite_id')->unsigned()->nullable();
        });
        Schema::table('produits', function ($table) {
            $table->dropColumn(['unite']);
        });
        Schema::table('produits', function($table) {
            $table->foreign('unite_id')
                ->references('id')
                ->on('unite')
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
        Schema::table('produits', function($table) {
            $table->dropForeign('livraisons_unite_id_foreign');
            $table->dropColumn('unite_id');

        });
    }
}
