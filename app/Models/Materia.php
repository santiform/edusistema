<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia
 *
 * @property $id
 * @property $nombre_materia
 * @property $modalidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Calificacione[] $calificaciones
 * @property Catedra[] $catedras
 * @property Correlativa[] $correlativas
 * @property Correlativa[] $correlativas
 * @property MateriasXCarrera[] $materiasXCarreras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materia extends Model
{
    
    static $rules = [
        'id' => 'required',
		'nombre_materia' => 'required',
		'modalidad' => 'required',
        'link_programa' => 'required',
    ];

    protected $perPage = 120;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre_materia','modalidad','link_programa'];
    

}
