<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MakeTournamentStartDateNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      DB::statement('ALTER TABLE tournaments CHANGE registration_start registration_start TIMESTAMP NULL');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // NO down function

    }
}
