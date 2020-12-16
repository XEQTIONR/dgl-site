<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogoColumnsToContendingTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('contending_teams', function (Blueprint $table) {
        $table->string('logo_size1', 50)->after('tournament_id')->nullable()->default(null);
        $table->string('logo_size2', 50)->after('logo_size1')->nullable()->default(null);
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
      Schema::table('contending_teams', function (Blueprint $table) {

        $table->dropColumn(array('logo_size1','logo_size2'));

      });





    }
}
