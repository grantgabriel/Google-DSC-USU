<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rsvps', function (Blueprint $table) {
            $table->string('rsvp_id')->primary();
            $table->string('event_id', 255);
            $table->foreign('event_id')->references('event_id')->on('events');
            $table->char('user_id', 36);
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->enum('attendance_detail', ['Attend', 'Could Not Attend']);
            $table->string('survey_id', 255)->nullable();
            $table->foreign('survey_id')->references('survey_id')->on('surveys');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rsvps');
    }
};
