<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_invites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contending_team_id');
            $table->string('email', 50);
            $table->enum('status',['available','used','invalid']);
            $table->foreign('contending_team_id')->references('id')->on('contending_teams');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournament_invites');
    }
}
