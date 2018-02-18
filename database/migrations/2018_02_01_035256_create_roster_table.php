<?php

/*
 * Copyright 2018 DAGAMELEAGUE
_____     ____  ___
 ||  \\  //  \\ ||
 ||   || || ___ ||  __
_||__//  \\__// ||__||core.com

@author XEQTIONR
*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rosters', function (Blueprint $table) {

            $table->unsignedInteger('contending_team_id');
            $table->unsignedInteger('gamer_id');
            $table->enum('status',['ineligible','confirmation_required','platform_id_required','email_verification_required','ok']);
            $table->foreign('contending_team_id')->references('id')->on('contending_teams');
            $table->foreign('gamer_id')->references('id')->on('gamers');
            $table->timestamps();

            $table->primary(['contending_team_id','gamer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rosters');
    }
}
