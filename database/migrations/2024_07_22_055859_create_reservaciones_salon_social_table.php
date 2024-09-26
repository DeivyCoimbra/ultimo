<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservaciones_salon_social', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas');
            $table->date('fecha_reservacion');
            $table->integer('cantidad_invitados');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservaciones_salon_social');
    }
};