<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBannerFieldToTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('tournaments', function (Blueprint $table){
        $table->string('banner')
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
      Schema::table('tournaments', function(Blueprint $table){
        $table->dropColumn('banner');
      });

    }
}
