<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscripcionExamen extends Model
{
    protected $table = 'inscripciones_examenes';
    protected $fillable = [
        'dni',
        'id_catedra',
        'condicion',
        // Agrega aquí las columnas que deseas modificar
    ];

    public $timestamps = true;
    
    // Resto de las definiciones del modelo
}
