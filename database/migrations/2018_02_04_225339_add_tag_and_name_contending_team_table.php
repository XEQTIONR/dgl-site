<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagAndNameContendingTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contending_team', function (Blueprint $table) {

            $table->string('name', 50)->after('id')->nullable()->default(null);
            $table->string('tag', 10)->after('name')->nullable()->default(null);
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
        Schema::table('contending_team', function (Blueprint $table) {

            $table->dropColumn('name');
            $table->dropColumn('tag');
        });
    }
}
