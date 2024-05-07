<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->string('survey_id', 255)->primary();
            $table->enum('rating', ['1', '2', '3', '4', '5']);
            $table->string('review', 255);
            $table->enum('speaker-rating', ['1', '2', '3', '4', '5']);
            $table->string('suggestion', 255);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
