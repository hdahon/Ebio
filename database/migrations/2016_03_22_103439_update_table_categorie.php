<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableCategorie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('typePanier_id')->unsigned()->nullable();
        });
        Schema::table('categories', function ($table) {
           // $table->dropColumn(['typePanier']);
        });
        Schema::table('categories', function($table) {
            $table->foreign('typePanier_id')
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
    }
}
