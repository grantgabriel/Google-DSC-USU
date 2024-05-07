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
        Schema::create('partners', function (Blueprint $table) {
            $table->string('event_id', 255);
            $table->foreign('event_id')->references('event_id')->on('agendas');
            $table->string('partner_name', 255);
            $table->string('partner_img', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
};
