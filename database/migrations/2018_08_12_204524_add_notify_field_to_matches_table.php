<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotifyFieldToMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('matches', function(Blueprint $table)
      {
        $table->tinyInteger('notified')
              ->default(0)
              ->after('notes');
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
      Schema::table('matches', function(Blueprint $table)
      {
        $table->dropColumn('notified');
      });
    }
}
