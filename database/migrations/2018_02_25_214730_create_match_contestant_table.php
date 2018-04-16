<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchContestantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_contestants', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('match_id');
            $table->unsignedInteger('contending_team_id');
            $table->timestamps();

            //$table->primary(['match_id', 'contending_team_id']);
            $table->foreign('match_id')->references('id')->on('matches');
            $table->foreign('contending_team_id')->references('id')->on('contending_teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_contestants');
    }
}
