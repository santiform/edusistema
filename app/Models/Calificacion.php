<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model

{
    protected $table = 'calificaciones';

    protected $fillable = [
                'dni',
                'id_materia',
                'final',
                'modalidad',  // Agregar campo adicional
                'tomo',            // Agregar campo adicional
                'pagina',   
        // Agrega otros campos que necesites
    ];




}
