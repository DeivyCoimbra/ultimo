<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lista_invitados_salon_social', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->unsignedBigInteger('reservaciones_salon_social_id');
            $table->timestamps();

            $table->foreign('reservaciones_salon_social_id', 'fk_lista_invitados_salon')
                  ->references('id')
                  ->on('reservaciones_salon_social')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lista_invitados_salon_social');
    }
};