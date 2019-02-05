<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameplanEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameplan_event', function (Blueprint $table) {
            $table->primary(['gameplan_id', 'event_id']);
            $table->unsignedInteger('gameplan_id');
            $table->unsignedInteger('event_id');
            $table->foreign('gameplan_id')->references('id')->on('gameplans')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
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
        Schema::dropIfExists('gameplan_event');
    }
}
