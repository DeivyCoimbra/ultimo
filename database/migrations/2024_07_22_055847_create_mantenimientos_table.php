<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->string('sector');
            $table->text('descripcion');
            $table->integer('costo_aproximado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mantenimientos');
    }
}
