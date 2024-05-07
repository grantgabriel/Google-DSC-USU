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
            Schema::create('qnas', function (Blueprint $table) {
                $table->string('event_id', 255);
                $table->foreign('event_id')->references('event_id')->on('events');
                $table->string('question');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('qnas');
        }
};
