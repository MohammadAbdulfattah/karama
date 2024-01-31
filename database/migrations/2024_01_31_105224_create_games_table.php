<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->dateTime('when');
            $table->enum('status', ['not_started', 'finished']);
            $table->string('plan');
            $table->string('channel');
            $table->string('round');
            $table->string('play_ground');
            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
            $table->unsignedBigInteger('club1_id');
            $table->foreign('club1_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->unsignedBigInteger('club2_id');
            $table->foreign('club2_id')->references('id')->on('clubs')->onDelete('cascade');
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
        Schema::dropIfExists('games');
    }
};
