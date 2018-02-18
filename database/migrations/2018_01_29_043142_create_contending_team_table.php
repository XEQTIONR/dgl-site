<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContendingTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contending_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clan_id')->nullable()->default(null);
            $table->unsignedInteger('tournament_id');
            $table->timestamps();

            $table->foreign('clan_id')->references('id')->on('clans');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contending_teams');
    }
}
