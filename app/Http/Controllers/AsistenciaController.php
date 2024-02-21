<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
    
    public function index()
    {
       
       $asistencias = DB::table('asistencia')
        ->join('estudiantes', 'asistencia.dni', '=', 'estudiantes.dni')
        ->join('catedras', 'asistencia.id_catedra', '=', 'catedras.id')
        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
        ->select('asistencia.*', 'estudiantes.nombre as nombre_estudiante', 'estudiantes.apellido as apellido_estudiante', 'materias.nombre_materia as nombre_materia', 'profesores.nombre as nombre_profesor', 'profesores.apellido as apellido_profesor')
        ->get();

         return view('adm2023divox.asistencia-general.index', compact('asistencias'));
        
    }

}