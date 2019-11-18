<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
           
            $table->dropColumn('region');

            $table->unsignedBigInteger('event_scope_id');
            $table->unsignedBigInteger('event_type_id');

            $table->foreign('event_scope_id')->references('event_scope_id')->on('event_scopes');
            $table->foreign('event_type_id')->references('event_type_id')->on('event_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
           $table->string('region');

           $table->dropColumn('event_scope_id');
           $table->dropColumn('event_type_id');
        });
    }
}
