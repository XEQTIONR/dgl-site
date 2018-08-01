<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditMatchWinnerForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      DB::statement('
        UPDATE `matches`
          SET won_id = NULL 
          WHERE 1;
      ');

      Schema::table('matches', function (Blueprint $table)
      {
        $table->dropForeign('matches_won_id_foreign');
        $table->foreign('won_id')->references('id')->on('match_contestants');
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
      Schema::table('matches', function (Blueprint $table)
      {
        $table->dropForeign('matches_won_id_foreign');
        $table->foreign('won_id')->references('id')->on('contending_teams');
      });
    }
}
