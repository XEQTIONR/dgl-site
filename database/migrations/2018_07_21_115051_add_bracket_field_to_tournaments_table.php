<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBracketFieldToTournamentsTable extends Migration
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
        $table->string('bracket')
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
      Schema::table('tournaments', function(Blueprint $table)
      {
        $table->dropColumn('bracket');
      });
    }
}
