<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lista_invitados_churrasquera', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservaciones_churrasquera_id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->timestamps();

            $table->foreign('reservaciones_churrasquera_id', 'fk_lista_invitados_churrasquera_reservacion')
                  ->references('id')
                  ->on('reservaciones_churrasquera')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lista_invitados_churrasquera');
    }
};