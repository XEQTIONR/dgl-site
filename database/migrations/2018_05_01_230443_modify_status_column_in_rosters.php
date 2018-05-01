<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ModifyStatusColumnInRosters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("ALTER TABLE rosters 
                    CHANGE COLUMN status 
                    status ENUM('ineligible',
                                'confirmation_required',
                                'rejected',
                                'ok') 
                    NOT NULL 
                    DEFAULT 'confirmation_required'") ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::statement("ALTER TABLE rosters 
                    CHANGE COLUMN status 
                    status ENUM('ineligible',
                                'confirmation_required',
                                'platform_id_required',
                                'email_verification_required',
                                'ok') 
                    NOT NULL 
                    DEFAULT 'confirmation_required'") ;
    }
}
