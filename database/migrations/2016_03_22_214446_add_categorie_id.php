<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategorieId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('livraisons', function($table) {
            $table->integer('categorie_id')->unsigned()->nullable();
        });
        Schema::table('livraisons', function($table) {
            $table->foreign('categorie_id')
            ->references('id')
            ->on('categories')
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
        //
        Schema::table('livraisons', function($table) {
            $table->dropColumn('categorie_id');
        });
    }
}
