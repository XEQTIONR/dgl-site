<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTournamentAndPostSlugFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('tournaments', function (Blueprint $table)
      {
        $table->string('slug')
              ->nullable()
              ->default(null)
              ->unique()
              ->after('caption');
      });

      Schema::table('blog_posts', function (Blueprint $table)
      {
        $table->string('slug')
              ->nullable()
              ->default(null)
              ->unique()
              ->after('subtitle');
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
      if(Schema::hasColumn('tournaments', 'slug'))
        Schema::table('tournaments', function(Blueprint $table)
        {
          $table->dropColumn('slug');
        });
      if(Schema::hasColumn('blog_posts', 'slug'))
        Schema::table('blog_posts', function(Blueprint $table)
        {
          $table->dropColumn('slug');
        });
    }
}
