<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTextPositionToBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('banners', function (Blueprint $table){
          $table->enum('text_position',['left','right','center','hidden','other'])
                ->default('left')
                ->after('image');
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
      Schema::table('banners', function(Blueprint $table){
        $table->dropColumn('text_position');
      });
    }
}
