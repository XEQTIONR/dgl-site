<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class ChangeStatusFieldInRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      DB::statement("
      ALTER TABLE `rosters` CHANGE `status` `status`
        ENUM('ineligible','confirmation_required','rejected','ok','discord_required')  NOT NULL
        DEFAULT 'confirmation_required' 
      ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
      DB::statement("
      
      ALTER TABLE `rosters` CHANGE `status` `status`
        ENUM('ineligible','confirmation_required','rejected','ok')  NOT NULL
        DEFAULT 'confirmation_required'
       ");
    }
}
