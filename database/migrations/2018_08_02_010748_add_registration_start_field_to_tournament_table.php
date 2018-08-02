<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegistrationStartFieldToTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('tournaments', function(Blueprint $table)
      {
        $table->timestamp('registration_start')
              ->after('bracket');

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
        $table->dropColumn('registration_start');

      });
    }
}
