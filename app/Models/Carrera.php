<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrera
 *
 * @property $id
 * @property $nombre_carrera
 * @property $created_at
 * @property $updated_at
 *
 * @property Estudiante $estudiante
 * @property MateriasXCarrera[] $materiasXCarreras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carrera extends Model
{
    
    static $rules = [
        'id' => 'required',
		'nombre_carrera' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id' , 'nombre_carrera'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'carrera', 'id');
    }

    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiasXCarreras()
    {
        return $this->hasMany('App\Models\MateriasXCarrera', 'id_carrera', 'id');
    }
    

}
