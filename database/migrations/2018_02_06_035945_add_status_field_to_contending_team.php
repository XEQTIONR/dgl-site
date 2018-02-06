<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusFieldToContendingTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contending_team', function (Blueprint $table){
            $table->enum('status',[
                                            'registration_incomplete', // a member has not registered on our site yet
                                            'ineligible',  // for whatever reason
                                            'unverified', // some kind of confirmation needed
                                            'ok' // good to go
                                          ])->after('tournament_id');
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
        Schema::table('contending_team', function (Blueprint $table){
            $table->dropColumn('status');
        });
    }
}
