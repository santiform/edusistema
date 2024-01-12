<?php

namespace App\Http\Controllers;

use App\Models\ExamenesFecha;
use App\Models\Catedra;
use App\Models\Profesore;
use App\Models\Materia;
use Illuminate\Http\Request;

/**
 * Class ExamenesFechaController
 * @package App\Http\Controllers
 */
class ExamenesFechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenesFechas = ExamenesFecha::select('examenes_fechas.*', 'profesores.apellido as apellido_profesor', 'profesores.nombre as nombre_profesor', 'materias.nombre_materia as nombre_materia', 'catedras.dia1 as dia1',
            'catedras.hora_comienzo_dia1 as hora_comienzo_dia1', 'catedras.hora_finalizacion_dia1 as hora_finalizacion_dia1',
            'catedras.dia2 as dia2', 'catedras.hora_comienzo_dia2 as hora_comienzo_dia2 ',
            'catedras.hora_finalizacion_dia2 as hora_finalizacion_dia2')
        ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
        ->get();


        $presidente = ExamenesFecha::select('examenes_fechas.presidente', 'profesores.apellido as presidentea', 'profesores.nombre as presidentenombre')
        ->join('profesores', 'examenes_fechas.presidente', '=', 'profesores.dni')
        ->get();

    return view('adm2023divox.examenes-fecha.index', compact('examenesFechas', 'presidente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examenesFecha = new ExamenesFecha();
        return view('adm2023divox.examenes-fecha.create', compact('examenesFecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ExamenesFecha::$rules);

        $examenesFecha = ExamenesFecha::create($request->all());

        return redirect()->route('examenes-fechas.index')
            ->with('success', 'ExamenesFecha created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examenesFecha = ExamenesFecha::find($id);

        return view('adm2023divox.examenes-fecha.show', compact('examenesFecha'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $examenesFecha = ExamenesFecha::select('examenes_fechas.*', 'profesores.dni as dni_profesor','profesores.apellido as apellido_profesor', 'profesores.nombre as nombre_profesor', 'materias.nombre_materia as nombre_materia', 'materias.id as id_materia', 'catedras.id as id_catedra', 'catedras.dia1 as dia1',
            'catedras.hora_comienzo_dia1 as hora_comienzo_dia1', 'catedras.hora_finalizacion_dia1 as hora_finalizacion_dia1',
            'catedras.dia2 as dia2', 'catedras.hora_comienzo_dia2 as hora_comienzo_dia2 ',
            'catedras.hora_finalizacion_dia2 as hora_finalizacion_dia2')
        ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
        ->join('materias', 'catedras.id_materia', '=', 'materias.id')

        ->find($id);

        $materia = Materia::select('nombre_materia')->where('id', '=', $id)->first();



        $profesores = Profesore::all()->mapWithKeys(function ($profesor) {
            return [$profesor->dni => "{$profesor->apellido}, {$profesor->nombre}"];
        })->toArray();          

        return view('adm2023divox.examenes-fecha.edit', compact('examenesFecha', 'profesores', 'materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ExamenesFecha $examenesFecha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamenesFecha $examenesFecha)
    {
        request()->validate(ExamenesFecha::$rules);

        $examenesFecha->update($request->all());

        return redirect()->route('examenes-fechas.index')
            ->with('success', 'ExamenesFecha updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $examenesFecha = ExamenesFecha::find($id)->delete();

        return redirect()->route('examenes-fechas.index')
            ->with('borrar', 'ok');
    }
}
