<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->longtext('description');
            $table->longtext('rules')->nullable()->default(null);
            $table->date('startdate');
            $table->date('enddate')->nullable()->defualt(null);
            $table->tinyInteger('squadsize')->default('1');

            //FK esport
            $table->unsignedInteger('title');
            $table->unsignedInteger('champion_id')->nullable()->default(null);

            //timestamps
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
        Schema::dropIfExists('tournaments');
    }
}
