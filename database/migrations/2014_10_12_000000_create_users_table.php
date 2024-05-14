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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_id')->primary();
            $table->string('password', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->enum('role', ['Member', 'Core Team Technical', 'Core Team Community & Relations', 'Core Team Media & Creative', 'Core Team Event Organizers']);
            $table->text('address', 255);
            $table->string('email', 50)->unique();
            $table->enum('pronoun', ['He/Him', 'She/Her'])->nullable();
            $table->string('profile_photo', 255)->nullable();
            $table->text('bio')->nullable();
            $table->string('certificate', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
