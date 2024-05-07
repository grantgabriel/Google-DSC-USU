<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->char('user_id', 36);
            $table->string('event_id', 255);
            $table->foreign('event_id')->references('event_id')->on('events');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('submission');
            $table->char('score', 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
