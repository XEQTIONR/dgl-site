<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTournamentLogoFieldInTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tournaments', function(Blueprint $table){

          $table->string('logo')
                ->nullable()
                ->default(null)
                ->after('title');
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
      Schema::table('tournaments', function (Blueprint $table) {
        $table->dropColumn('logo');
      });
    }
}
