<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueConstraintOnCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //
      Schema::table('checkins', function (Blueprint $table) {
        $table->unique(['match_id', 'roster_id'], 'alternate_key');
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
      Schema::table('checkins', function (Blueprint $table) {
        $table->dropUnique('alternate_key');
      });
    }
}
