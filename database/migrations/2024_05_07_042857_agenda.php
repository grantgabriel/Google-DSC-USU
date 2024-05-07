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
        Schema::create('events', function (Blueprint $table) {
            $table->string('event_id', 255)->primary();
            $table->string('event_name', 255);
            $table->text('description');
            $table->string('event_banner', 255);
            $table->string('event_profile', 255);
            $table->text('event_location');
            $table->date('time');
            $table->enum('type', ['In Person', 'Online', 'Hybrid']);
            $table->text('address');
            $table->string('resource', 255)->nullable();
            $table->string('speaker_name', 255);
            $table->string('speaker_img', 255);
            $table->string('documentation', 255);
            $table->enum('publication_status', ['Draft', 'Published', 'Hidden']);
            $table->enum('categories', ['Android' , 'Machine Learning' , 'UI/UX' , 'Web Development']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
