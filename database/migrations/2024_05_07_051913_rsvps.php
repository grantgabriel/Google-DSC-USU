<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rsvps', function (Blueprint $table) {
            $table->string('event_id', 255);
            $table->foreign('event_id')->references('event_id')->on('events');
            $table->char('user_id', 36);
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->enum('attendance_detail', ['Attend', 'Could Not Attend']);
            $table->enum('rating', ['1', '2', '3', '4', '5'])->nullable();
            $table->string('review', 255)->nullable();
            $table->enum('speaker_rating', ['1', '2', '3', '4', '5'])->nullable();
            $table->string('suggestion', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rsvps');
    }
};
