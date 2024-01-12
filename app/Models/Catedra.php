<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Catedra
 *
 * @property $id
 * @property $id_materia
 * @property $dni_profesor
 * @property $aula
 * @property $cupos
 * @property $dia1
 * @property $hora_comienzo_dia1
 * @property $hora_finalizacion_dia1
 * @property $dia2
 * @property $hora_comienzo_dia2
 * @property $hora_finalizacion_dia2
 * @property $created_at
 * @property $updated_at
 *
 * @property InscripcionesMateria[] $inscripcionesMaterias
 * @property Profesore $profesore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Catedra extends Model
{
    
    static $rules = [
		'id_materia' => 'required',
		'dni_profesor' => 'required',
		'aula' => 'required',
        'aula_dia2' => 'required',
		'cupos' => 'required',
		'dia1' => 'required',
		'hora_comienzo_dia1' => 'required',
		'hora_finalizacion_dia1' => 'required',
		'dia2' => 'required',
		'hora_comienzo_dia2' => 'required',
		'hora_finalizacion_dia2' => 'required',
    ];

    protected $perPage = 400;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_materia','dni_profesor','aula', 'aula_dia2','cupos','dia1','hora_comienzo_dia1','hora_finalizacion_dia1','dia2','hora_comienzo_dia2','hora_finalizacion_dia2'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionesMaterias()
    {
        return $this->hasMany('App\Models\InscripcionesMateria', 'id_catedra', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profesore()
    {
        return $this->hasOne('App\Models\Profesore', 'dni', 'dni_profesor');
    }
    

}
