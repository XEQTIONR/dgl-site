<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->enum('status',['unverified','normal','suspended','banned','other']);

            $table->string('alias', 25);
            $table->string('fname', 25);
            $table->string('lname', 25);
            $table->string('steamid', 100)->nullable()->default(null);
            $table->string('battlenetid', 50)->nullable()->default(null);
            $table->string('discordid',50)->nullable()->default(null);
            $table->date('dob');

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
        Schema::dropIfExists('gamers');
    }
}
