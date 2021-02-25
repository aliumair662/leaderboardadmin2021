<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaderboardmentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaderboardmentions', function (Blueprint $table) {
            $table->id();
            $table->integer('leaderboard_id')->unsigned();
            $table->text('ownerId')->nullable();
            $table->text('ownername')->nullable();
            $table->text('ownername_profile_pic_url')->nullable();
            $table->integer('totalMentiones')->unsigned();
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
        Schema::dropIfExists('leaderboardmentions');
    }
}
