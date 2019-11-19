<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrizeToCompetition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            
            $table->unsignedBigInteger('prize_id');

            $table->foreign('prize_id')->references('prize_id')->on('prizes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competition', function (Blueprint $table) {
            //
        });
    }
}
