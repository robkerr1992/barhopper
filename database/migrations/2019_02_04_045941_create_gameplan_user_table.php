<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameplanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameplan_user', function (Blueprint $table) {
            $table->primary(['gameplan_id', 'user_id']);
            $table->unsignedInteger('gameplan_id');
            $table->unsignedInteger('user_id');
            $table->foreign('gameplan_id')->references('id')->on('gameplans')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('gameplan_user');
    }
}
