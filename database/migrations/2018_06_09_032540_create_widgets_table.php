<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body_text')->nullable()->default(null);
            $table->string('button_text')->default('Click for more.');
            $table->string('link');
            $table->string('image')->nullable()->default(null);
            $table->unsignedInteger('table')->nullable()->default(null);
            $table->enum('status', ['active','disabled'])->default('disabled');
            $table->enum('type', ['none','icon','image','table']);


            $table->timestamps();


            $table->foreign('table')
              ->references('id')->on('tournaments')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
