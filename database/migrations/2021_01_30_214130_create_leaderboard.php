<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaderboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaderboard', function (Blueprint $table) {
            $table->id();
            $table->string('post_url')->nullable();
            $table->string('post_id')->nullable();
            $table->string('post_image')->nullable();
            $table->integer('leaderboard_run_period')->nullable();
            $table->timestamp('leaderboard_start_date')->nullable();
            $table->timestamp('leaderboard_end_date')->nullable();
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
        Schema::table('leaderboard', function (Blueprint $table) {
            Schema::dropIfExists('leaderboard');
        });
    }
}
