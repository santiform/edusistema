<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MateriasXCarrera
 *
 * @property $id
 * @property $id_carrera
 * @property $id_materia
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrera $carrera
 * @property Materia $materia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MateriasXCarrera extends Model
{
    
    static $rules = [
		'id_carrera' => 'required',
		'id_materia' => 'required',
    ];

    protected $perPage = 400;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_carrera','id_materia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrera()
    {
        return $this->hasOne('App\Models\Carrera', 'id', 'id_carrera');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'id_materia');
    }
    

}
