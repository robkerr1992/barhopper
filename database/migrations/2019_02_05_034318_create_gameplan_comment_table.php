<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameplanCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameplan_comment', function (Blueprint $table) {
            $table->primary(['gameplan_id', 'comment_id']);
            $table->unsignedInteger('gameplan_id');
            $table->unsignedInteger('comment_id');
            $table->foreign('gameplan_id')->references('id')->on('gameplans')->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
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
        Schema::dropIfExists('gameplan_comment');
    }
}
