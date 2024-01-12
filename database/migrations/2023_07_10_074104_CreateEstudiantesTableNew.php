<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTableNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->integer('dni')->primary();
            $table->string('apellido');
            $table->string('nombre');
            $table->date('nacimiento');
            $table->string('celular');
            $table->string('mail');
            $table->string('tipo');
            $table->integer('carrera');
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
        Schema::dropIfExists('estudiantes');
    }
}