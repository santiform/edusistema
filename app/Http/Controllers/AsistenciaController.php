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


    public function edit($id)
    {
        // Obtener la asistencia a editar
        $asistencia = DB::table('asistencia')
        ->join('estudiantes', 'asistencia.dni', '=', 'estudiantes.dni')
        ->join('catedras', 'asistencia.id_catedra', '=', 'catedras.id')
        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
        ->select('asistencia.*', 'estudiantes.nombre as nombre_estudiante', 'estudiantes.apellido as apellido_estudiante', 'materias.nombre_materia as nombre_materia', 'profesores.nombre as nombre_profesor', 'profesores.apellido as apellido_profesor')
        ->where('asistencia.id', $id) // Filtrar por el ID de la asistencia deseada
        ->first();

        
        // Retornar la vista de edición con la asistencia
        return view('adm2023divox.asistencia-general.edit', compact('asistencia'));
    }

    public function update(Request $request, $id)
    {
        // Actualizar la asistencia en la base de datos
        DB::table('asistencia')->where('id', $id)->update([
            // Actualiza los campos según los datos del formulario
            'estado' => $request->estado,
            'fecha' => $request->fecha,
            
            // Otros campos...
        ]);
        
        // Redireccionar a alguna vista después de la actualización
        return redirect()->route('asistenciaAdmGeneral')
            ->with('editar', 'ok');
    }

    public function destroy($id)
    {
        // Eliminar la asistencia de la base de datos
        DB::table('asistencia')->where('id', $id)->delete();
        
        // Redireccionar a alguna vista después de la eliminación
        return redirect()->route('asistenciaAdmGeneral')
            ->with('borrar', 'ok');
    }





}