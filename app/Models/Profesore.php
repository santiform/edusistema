<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesore
 *
 * @property $id
 * @property $dni
 * @property $apellido
 * @property $nombre
 * @property $nacimiento
 * @property $celular
 * @property $mail
 * @property $ingreso
 * @property $created_at
 * @property $updated_at
 *
 * @property Catedra[] $catedras
 * @property ExamenesFecha[] $examenesFechas
 * @property ExamenesFecha[] $examenesFechas
 * @property ExamenesFecha[] $examenesFechas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Profesore extends Model
{
    
    static $rules = [
		'dni' => 'required',
		'apellido' => 'required',
		'nombre' => 'required',
		'nacimiento' => 'required',
		'celular' => 'required',
		'mail' => 'required',
		'ingreso' => 'required',
        'horas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni','apellido','nombre','nacimiento','celular','mail','ingreso','horas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function catedras()
    {
        return $this->hasMany('App\Models\Catedra', 'dni_profesor', 'dni');
    }
    
}
