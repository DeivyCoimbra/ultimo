<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->integer('telefono');
            $table->integer('piso');
            $table->string('departamento', 100);
            $table->foreignId('tipo_id')->constrained('tipos');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}