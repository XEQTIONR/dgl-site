<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugFieldToEsportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('esports', function(Blueprint $table)
      {
        $table->string('slug')
              ->nullable()
              ->default(null)
              ->after('name');
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
      Schema::table('esports', function(Blueprint $table)
      {
        $table->dropColumn('slug');
      });
    }
}
