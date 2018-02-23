<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCaptainBoolFieldToRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('rosters', function (Blueprint $table){
        $table->enum('captain',[
          'true',
          'false',
        ])->default('false')->after('gamer_id');
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
      Schema::table('rosters', function (Blueprint $table){
        $table->dropColumn('captain');
      });
    }
}
