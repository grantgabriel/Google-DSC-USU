<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->string('event_id');
            $table->foreign('event_id')->references('event_id')->on('agendas')->onDelete('restrict');
            $table->text('task_link');
            $table->date('deadline')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
