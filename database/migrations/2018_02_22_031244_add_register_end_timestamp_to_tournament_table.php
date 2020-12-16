<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegisterEndTimestampToTournamentTable extends Migration
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
        $table->timestamp('registration_end')
          ->nullable()
          ->default(null)
          ->after('rules');
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
        $table->dropColumn('registration_end');
      });
    }
}
