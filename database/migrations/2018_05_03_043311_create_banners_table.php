<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable()->default(null);
            $table->string('link')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);

            //Interface for nesting/reordering - we only use reordering
            $table->unsignedInteger('lft')->nullable()->default(null);
            $table->unsignedInteger('rgt')->nullable()->default(null);
            $table->integer('depth')->nullable()->default(null);
            $table->integer('parent_id')->nullable()->default(null);


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
        Schema::dropIfExists('banners');
    }
}
