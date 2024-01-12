<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\InscripcionMateria;
use App\Models\Calificacion;
use Carbon\Carbon;
use PDF;

use Dompdf\Dompdf;
use Dompdf\Options;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;


/**
 * Class MateriaController
 * @package App\Http\Controllers
 */
class InscripcionesController extends Controller
{
      

public function conteoInscripcionesCarreras()
{
    $todos = Estudiante::count();


    $carreras = Carrera::withCount('estudiante')
        ->orderBy('nombre_carrera')
        ->get();

     // Calcular la fecha hace 18 años desde la fecha actual
    $fechaMayorEdad = Carbon::now()->subYears(18);

    // Contar estudiantes mayores de edad
    $mayores = Estudiante::where('nacimiento', '<=', $fechaMayorEdad)->count();

    $menores = Estudiante::where('nacimiento', '>', $fechaMayorEdad)->count();

    $taller = Estudiante::join('carreras', 'estudiantes.carrera', '=', 'carreras.id')
        ->where('carreras.nombre_carrera', 'like', '%taller%')
        ->count();


    return view('adm2023divox.inscripciones-seccion.estadisticasgenerales', compact('todos','carreras','mayores', 'menores', 'taller'));
}






public function conteoInscripcionesExamenes()
{
    // Contar total de inscripciones
    $totalInscripciones = DB::table('inscripciones_examenes')->count();

    // Obtener el conteo de estudiantes inscritos por cada examen_fecha con nombre de materia y nombre del profesor
    $conteoPorFecha = DB::table('examenes_fechas')
    ->leftJoin('inscripciones_examenes', 'examenes_fechas.id', '=', 'inscripciones_examenes.id_fecha_examen')
    ->leftJoin('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
    ->leftJoin('materias', 'catedras.id_materia', '=', 'materias.id')
    ->leftJoin('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
    ->select(
        'examenes_fechas.id as id_examen',
        'examenes_fechas.fecha',
        'materias.nombre_materia',
        'profesores.apellido as apellido_profesor',
        'profesores.nombre as nombre_profesor',
        DB::raw('count(inscripciones_examenes.id) as total_estudiantes')
    )
    ->groupBy('examenes_fechas.id', 'examenes_fechas.fecha', 'materias.nombre_materia', 'profesores.apellido', 'profesores.nombre')
    ->orderBy('examenes_fechas.fecha')  // Cambiado a ordenar por fecha
    ->get();


    $listadoDeInscriptos = DB::table('inscripciones_examenes')
    ->join('examenes_fechas', 'inscripciones_examenes.id_fecha_examen', '=', 'examenes_fechas.id')
    ->join('estudiantes', 'inscripciones_examenes.dni', '=', 'estudiantes.dni')
    ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
    ->join('materias', 'catedras.id_materia', '=', 'materias.id')
    ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
    ->select(
        'inscripciones_examenes.id as id_inscripcion',
        'examenes_fechas.fecha as fecha_examen',
        'estudiantes.apellido as apellido_estudiante',
        'estudiantes.nombre as nombre_estudiante',
        'materias.nombre_materia',
        'profesores.apellido as apellido_profesor',
        'profesores.nombre as nombre_profesor'
    )
    ->orderBy('examenes_fechas.fecha')  // Ordenar por la fecha del examen
    ->get();



    return view('adm2023divox.inscripciones-seccion.estadisticasexamenes', compact('totalInscripciones', 'conteoPorFecha', 'listadoDeInscriptos'));
}


public function admEliminarInscripcionExamen($id)

{
        DB::table('inscripciones_examenes')->where('id', $id)->delete();

        return redirect()->back()->with('borrar', 'ok');
    }




public function actasVolante()

{
    $listadoExamenes = DB::table('examenes_fechas')
            ->select(
                'examenes_fechas.*',
                'materias.nombre_materia as nombre_materia',
                'presidente.apellido as apellido_presidente',
                'presidente.nombre as nombre_presidente',
                'vocal1.apellido as apellido_vocal1',
                'vocal1.nombre as nombre_vocal1',
                'vocal2.apellido as apellido_vocal2',
                'vocal2.nombre as nombre_vocal2'
            )
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->join('materias', 'catedras.id_materia', '=', 'materias.id')
            ->join('profesores as presidente', 'examenes_fechas.presidente', '=', 'presidente.dni')
            ->join('profesores as vocal1', 'examenes_fechas.vocal1', '=', 'vocal1.dni')
            ->join('profesores as vocal2', 'examenes_fechas.vocal2', '=', 'vocal2.dni')
            ->orderBy("examenes_fechas.fecha")
            ->get();

    return view('adm2023divox.inscripciones-seccion.actasvolante', ['examenes' => $listadoExamenes]);
}






public function actasVolanteVer($id)

{
        $datos = DB::table('examenes_fechas')
            ->select(
                'examenes_fechas.*',
                'materias.nombre_materia as nombre_materia',
                'presidente.apellido as apellido_presidente',
                'presidente.nombre as nombre_presidente',
                'vocal1.apellido as apellido_vocal1',
                'vocal1.nombre as nombre_vocal1',
                'vocal2.apellido as apellido_vocal2',
                'vocal2.nombre as nombre_vocal2',
                'estudiantes.dni as dni_estudiante',
                'estudiantes.apellido as apellido_estudiante',
                'estudiantes.nombre as nombre_estudiante'
            )
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->join('materias', 'catedras.id_materia', '=', 'materias.id')
            ->join('profesores as presidente', 'examenes_fechas.presidente', '=', 'presidente.dni')
            ->join('profesores as vocal1', 'examenes_fechas.vocal1', '=', 'vocal1.dni')
            ->join('profesores as vocal2', 'examenes_fechas.vocal2', '=', 'vocal2.dni')
            ->join('inscripciones_examenes', 'examenes_fechas.id', '=', 'inscripciones_examenes.id_fecha_examen')
            ->join('estudiantes', 'inscripciones_examenes.dni', '=', 'estudiantes.dni')
            ->where('examenes_fechas.id', '=', $id)
            ->get();

        if (empty($datos[0])) {
            return redirect()->route('actasVolante')->with(['vacio' => 'ok', 'datos' => $datos]);
        }     
            
        return view('adm2023divox.inscripciones-seccion.actasvolantever', ['datos' => $datos]);

    }





public function actasVolanteDescargar($id)
{
    $datosOld = DB::table('examenes_fechas')
            ->select(
                'examenes_fechas.*',
                'materias.nombre_materia as nombre_materia',
                'presidente.apellido as apellido_presidente',
                'presidente.nombre as nombre_presidente',
                'vocal1.apellido as apellido_vocal1',
                'vocal1.nombre as nombre_vocal1',
                'vocal2.apellido as apellido_vocal2',
                'vocal2.nombre as nombre_vocal2',
                'estudiantes.dni as dni_estudiante',
                'estudiantes.apellido as apellido_estudiante',
                'estudiantes.nombre as nombre_estudiante'
            )
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->join('materias', 'catedras.id_materia', '=', 'materias.id')
            ->join('profesores as presidente', 'examenes_fechas.presidente', '=', 'presidente.dni')
            ->join('profesores as vocal1', 'examenes_fechas.vocal1', '=', 'vocal1.dni')
            ->join('profesores as vocal2', 'examenes_fechas.vocal2', '=', 'vocal2.dni')
            ->join('inscripciones_examenes', 'examenes_fechas.id', '=', 'inscripciones_examenes.id_fecha_examen')
            ->join('estudiantes', 'inscripciones_examenes.dni', '=', 'estudiantes.dni')
            ->where('examenes_fechas.id', '=', $id)
            ->get();


        if (empty($datosOld[0])) {
            return redirect()->route('actasVolante')->with(['vacio' => 'ok', 'datos' => $datosOld]);
        }      

        $datos = $datosOld->toArray();

        // Configuración de Dompdf
        $pdf = PDF::loadView('adm2023divox.inscripciones-seccion.actasvolantever', ['datos' => $datos]);

        $nombreArchivo = 'ACTA VOLANTE, ' . $datos[0]->nombre_materia . ' (' . $datos[0]->fecha . ')' . '.pdf';

        // Descargar el PDF directamente
        return $pdf->download($nombreArchivo);


}





public function calificacionesActasVolante()

{
        $listadoExamenes = DB::table('examenes_fechas')
            ->select(
                'examenes_fechas.*',
                'materias.nombre_materia as nombre_materia',
                'presidente.apellido as apellido_presidente',
                'presidente.nombre as nombre_presidente',
                'vocal1.apellido as apellido_vocal1',
                'vocal1.nombre as nombre_vocal1',
                'vocal2.apellido as apellido_vocal2',
                'vocal2.nombre as nombre_vocal2'
            )
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->join('materias', 'catedras.id_materia', '=', 'materias.id')
            ->join('profesores as presidente', 'examenes_fechas.presidente', '=', 'presidente.dni')
            ->join('profesores as vocal1', 'examenes_fechas.vocal1', '=', 'vocal1.dni')
            ->join('profesores as vocal2', 'examenes_fechas.vocal2', '=', 'vocal2.dni')
            ->orderBy("examenes_fechas.fecha")
            ->get();

        return view('adm2023divox.calificaciones-seccion.a-acta-volante.index', ['examenes' => $listadoExamenes]);

    }




public function calificacionesActasVolante1($id)

{          
        $datos = DB::table('examenes_fechas')
            ->select(
                'examenes_fechas.*',
                'materias.nombre_materia as nombre_materia',
                'materias.id as materia_id',
                'presidente.apellido as apellido_presidente',
                'presidente.nombre as nombre_presidente',
                'vocal1.apellido as apellido_vocal1',
                'vocal1.nombre as nombre_vocal1',
                'vocal2.apellido as apellido_vocal2',
                'vocal2.nombre as nombre_vocal2',
                'estudiantes.dni as dni_estudiante',
                'estudiantes.apellido as apellido_estudiante',
                'estudiantes.nombre as nombre_estudiante'
            )
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->join('materias', 'catedras.id_materia', '=', 'materias.id')
            ->join('profesores as presidente', 'examenes_fechas.presidente', '=', 'presidente.dni')
            ->join('profesores as vocal1', 'examenes_fechas.vocal1', '=', 'vocal1.dni')
            ->join('profesores as vocal2', 'examenes_fechas.vocal2', '=', 'vocal2.dni')
            ->join('inscripciones_examenes', 'examenes_fechas.id', '=', 'inscripciones_examenes.id_fecha_examen')
            ->join('estudiantes', 'inscripciones_examenes.dni', '=', 'estudiantes.dni')
            ->where('examenes_fechas.id', '=', $id)
            ->get();


        $listadoExamenes = DB::table('examenes_fechas')
            ->select(
                'examenes_fechas.*',
                'materias.nombre_materia as nombre_materia',
                'presidente.apellido as apellido_presidente',
                'presidente.nombre as nombre_presidente',
                'vocal1.apellido as apellido_vocal1',
                'vocal1.nombre as nombre_vocal1',
                'vocal2.apellido as apellido_vocal2',
                'vocal2.nombre as nombre_vocal2'
            )
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->join('materias', 'catedras.id_materia', '=', 'materias.id')
            ->join('profesores as presidente', 'examenes_fechas.presidente', '=', 'presidente.dni')
            ->join('profesores as vocal1', 'examenes_fechas.vocal1', '=', 'vocal1.dni')
            ->join('profesores as vocal2', 'examenes_fechas.vocal2', '=', 'vocal2.dni')
            ->orderBy("examenes_fechas.fecha")
            ->get();      


        if (empty($datos[0])) {
            return redirect()->route('calificacionesActasVolante')->with(['vacio' => 'ok', 'examenes' => $listadoExamenes]);
        }    
            
        return view('adm2023divox.calificaciones-seccion.a-acta-volante.1', ['datos' => $datos]);

    }


public function calificacionesActasVolante2(Request $request)
{
    // Obtener campos adicionales del formulario
    $modalidad = $request->input('modalidad');
    $tomo = $request->input('tomo');
    $pagina = $request->input('pagina');
    $fecha = $request->input('fecha_final');
    
    $response = '';  // Variable para almacenar el resultado

    // Iterar sobre los datos del formulario
    foreach ($request->input('dni_estudiantes') as $index => $dni) {
        // Verificar si la nota_final y estado no están vacíos
        if ($request->filled('nota_final.' . $index) && $request->filled('estado.' . $index)) {
            // Aquí puedes realizar acciones con los datos no vacíos
            $notaFinal = $request->input('nota_final.' . $index);
            $estado = $request->input('estado.' . $index);

            // Obtener el valor de id_materia desde el formulario
            $idMateria = $request->input('id_materia');

            // Array de datos para la calificación
            $calificacionData = [
                'dni' => $dni,
                'id_materia' => $idMateria,
                'fecha_final' => $fecha,
                'nota_final' => $notaFinal,
                'estado' => $estado,
                'modalidad' => $modalidad,
                'tomo' => $tomo,
                'pagina' => $pagina,
                'created_at' => now(),
                'updated_at' => now(),
                // Agregar otros campos si es necesario
            ];

            // Buscar la calificación en la base de datos
            $calificacion = DB::table('calificaciones')
                ->where('dni', $dni)
                ->where('id_materia', $idMateria)
                ->first();

            if ($calificacion) {
                // Si la calificación ya existe, actualiza solo los campos necesarios
                DB::table('calificaciones')
                    ->where('dni', $dni)
                    ->where('id_materia', $idMateria)
                    ->update($calificacionData);
                $response .= "Calificación editada para el estudiante con DNI: $dni (Agregada nota final)\n";
            } else {
                // Si no existe la calificación, crea un nuevo registro
                DB::table('calificaciones')->insert($calificacionData);
                $response .= "No existen calificaciones para el estudiante con DNI: $dni, se ha creado una nueva calificación\n";
            }
        }
    }

    // Redirigir a una vista con los resultados (fuera del bucle)
    return view('correctos.adm.calificacionesRecibidas', ['resultados' => $response]);
}

    


}
