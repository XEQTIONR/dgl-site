<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogoVisibilityFieldInTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tournaments', function (Blueprint $table)
        {
          $table->enum('logo_visibility', ['visible', 'invisible'])
                ->default('visible')
                ->after('logo');
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
      Schema::table('tournaments', function(Blueprint $table)
      {
        $table->dropColumn('logo_visibility');
      });
    }
}
