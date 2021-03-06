<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameplanVenueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameplan_venue', function (Blueprint $table) {
            $table->primary(['gameplan_id', 'venue_id']);
            $table->unsignedInteger('gameplan_id');
            $table->unsignedInteger('venue_id');
            $table->foreign('gameplan_id')->references('id')->on('gameplans')->onDelete('cascade');
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
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
        Schema::dropIfExists('gameplan_venue');
    }
}
