<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('icon');

            $table->timestamps();
        });


        Schema::table('esports', function(Blueprint $table)
        {
          $table->unsignedInteger('platform_id')
                ->nullable()
                ->default(null)
                ->after('teamsize');

          $table->foreign('platform_id')->references('id')->on('platforms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('esports', function(Blueprint $table)
        {
          $table->dropForeign('esports_platform_id');
          $table->dropColumn('platform_id');
        });

        Schema::dropIfExists('platforms');
    }
}
