<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeStandingsJsonFieldInTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tournaments', function (Blueprint $table) {
        $table->text('standings_json')
              ->nullable()
              ->default(null)
              ->change();
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
        $table->string('standings_json')
              ->nullable()
              ->default(null)
              ->change();
      });
    }
}
