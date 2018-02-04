<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TournamentEsportForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tournaments', function (Blueprint $table) {

          $table->foreign('title')->references('id')->on('esports');
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

          $table->dropForeign('tournaments_title_foreign');
        });
    }
}
