<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasxCarrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_x_carreras', function (Blueprint $table) {
            $table->increments('id_registro');
            $table->integer('id_carrera');
            $table->integer('id_materia');
            $table->timestamps(); // Agregamos los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias_x_carreras');
    }
}