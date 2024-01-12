<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Carrera; 

/**
 * Class Estudiante
 *
 * @property $id
 * @property $dni
 * @property $apellido
 * @property $nombre
 * @property $nacimiento
 * @property $celular
 * @property $mail
 * @property $tipo
 * @property $carrera
 * @property $created_at
 * @property $updated_at
 *
 * @property Calificacione[] $calificaciones
 * @property Carrera $carrera
 * @property InscripcionesExamene[] $inscripcionesExamenes
 * @property InscripcionesMateria[] $inscripcionesMaterias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estudiante extends Model
{

    
    static $rules = [
		'dni' => 'required',
		'apellido' => 'required',
		'nombre' => 'required',
		'nacimiento' => 'required',
		'celular' => 'required',
		'mail' => 'required',
        'direccion' => 'required',
        'localidad' => 'required',
		'tipo' => 'required',
		'carrera' => 'required',
    ];

    protected $perPage = 150;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni','apellido','nombre','nacimiento','celular','mail','direccion','localidad','tipo','carrera'];


    // En tu modelo Estudiante
public function carrera()
{
    return $this->belongsTo(Carrera::class, 'id_carrera', 'id');
}


}
