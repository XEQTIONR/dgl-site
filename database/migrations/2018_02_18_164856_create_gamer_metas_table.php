<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamerMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamer_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gamer_id');
            $table->string('meta_key');
            $table->string('meta_value');
            $table->timestamps();

            $table->foreign('gamer_id')->references('id')->on('gamers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gamer_metas');
    }
}
