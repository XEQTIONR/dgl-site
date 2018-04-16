<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('match_id');
            $table->unsignedInteger('contending_team_id');
            $table->unsignedInteger('gamer_id');
            $table->timestamps();

            //$table->foreign(['match_id', 'contending_team_id'])->references(['match_id', 'contending_team_id'])->on('match_contestants');
            $table->foreign(['gamer_id', 'contending_team_id'])->references(['gamer_id', 'contending_team_id'])->on('rosters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkins');
    }
}
