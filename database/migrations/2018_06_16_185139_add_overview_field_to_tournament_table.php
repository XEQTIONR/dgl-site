<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOverviewFieldToTournamentTable extends Migration
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
        $table->text('overview')
          ->nullable()
          ->default(null)
          ->after('caption');
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
      Schema::table('tournaments', function(Blueprint $table){
        $table->dropColumn('overview');
      });
    }
}
