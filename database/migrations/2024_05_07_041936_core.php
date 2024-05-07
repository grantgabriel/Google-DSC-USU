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
        Schema::create('cores', function (Blueprint $table) {
            $table->char('user_id', 36);
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->enum('division', ['Lead', 'Technical', 'Community & Relations', 'Media & Creative', 'Event Organizers']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cores');
    }
};
