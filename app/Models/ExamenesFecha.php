<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExamenesFecha
 *
 * @property $id
 * @property $id_catedra
 * @property $fecha
 * @property $hora_comienzo
 * @property $hora_finalizacion
 * @property $presidente
 * @property $vocal1
 * @property $vocal2
 * @property $created_at
 * @property $updated_at
 *
 * @property InscripcionesExamene[] $inscripcionesExamenes
 * @property Profesore $profesore
 * @property Profesore $profesore
 * @property Profesore $profesore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ExamenesFecha extends Model
{
    
    static $rules = [
		'id_catedra' => 'required',
		'fecha' => 'required',
		'hora_comienzo' => 'required',
		'hora_finalizacion' => 'required',
		'presidente' => 'required',
		'vocal1' => 'required',
		'vocal2' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_catedra','fecha','hora_comienzo','hora_finalizacion','presidente','vocal1','vocal2'];


    public function profesorPresidente()
    {
        return $this->belongsTo(Profesore::class, 'presidente', 'dni');
    }

    public function profesorVocal1()
    {
        return $this->belongsTo(Profesore::class, 'vocal1', 'dni');
    }

    public function profesorVocal2()
    {
        return $this->belongsTo(Profesore::class, 'vocal2', 'dni');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }

    

}
