<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('checkinstart')->nullable()->default(null);
            $table->timestamp('checkinend')->nullable()->default(null);
            $table->timestamp('matchstart')->nullable()->default(null);;
            $table->enum('stage',['group',
                                  'knockout',
                                  'quarterfinal',
                                  'semifinal',
                                  'final',
                                  'losersbracket',
                                  'winnersbracket'])->nullable()->default(null);
            $table->string('notes')->nullable()->default(null);

            $table->unsignedInteger('tournament_id')->nullable()->default(null);
            $table->unsignedInteger('won_id')->nullable()->default(null);

            $table->foreign('tournament_id')->references('id')->on('tournaments');
            $table->foreign('won_id')->references('id')->on('contending_teams');


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
        Schema::dropIfExists('matches');
    }
}
