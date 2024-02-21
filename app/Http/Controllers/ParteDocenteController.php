<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\ConversionNotas;
use PDF;
use App\Models\Profesore;
use Illuminate\Database\Eloquent\Model;
use League\Csv\Writer;
use League\Csv\Reader;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;


use App\Models\Asistencia;
use App\Models\Estudiante;
use App\Models\InscripcionMateria;

class ParteDocenteController extends Controller
{


    public function formSalud()
    {       
        $dni = auth()->user()->dni;
        $ruta = storage_path('app/formularios/datos-de-salud/' . $dni . '.csv');
        if (File::exists($ruta)) {
            $csv = Reader::createFromPath($ruta, 'r');        
            return true;
        } else {
            return false;
        }
    }   



     public function inicio()
    {
        $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }

        return view('docentes.index');
    }




    public function miPerfil(){

        $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }

        $dni = auth()->user()->dni;

        $datos = Profesore::where('dni', $dni)->first();

        return view('docentes.miperfil', compact('datos'));

    }


    public function miPerfilEditar(Request $request){

        $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }


        $dni = auth()->user()->dni;


        $apellido = $request->input('apellido');
        $nombre = $request->input('nombre');
        $nacimiento = $request->input('nacimiento');
        $celular = $request->input('celular');
        $mail = $request->input('mail');
        $ingreso = $request->input('ingreso');
        $horas = $request->input('horas');

        DB::table('profesores')->updateOrInsert(
            ['dni' => $dni], // Columna y valor a comparar para encontrar la fila
            [
                'apellido' => $apellido,
                'nombre' => $nombre,
                'nacimiento' => $nacimiento,
                'celular' => $celular,
                'mail' => $mail,
                'ingreso' => $ingreso,
                'horas' => $horas,
            ]
        );    

        DB::table('users')->updateOrInsert(
            ['dni' => $dni], // Columna y valor a comparar para encontrar la fila
            [
                'name' => $request->input('apellido')." ".$request->input('nombre'),
                'email' => $mail,
            ]
        );    

        $datos = Profesore::where('DNI', $dni)->first();

        $nacimiento = $datos->nacimiento;

        $fechaNacimiento = Carbon::parse($nacimiento);
        $fechaActual = Carbon::now();
        $edad = $fechaNacimiento->diffInYears($fechaActual);

        return redirect()->route('miPerfilDocente')->with('editarPerfil', 'ok');

    }   




    public function misCatedras(){

        $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }

        $dni = auth()->user()->dni;

        $datos = Profesore::where('dni', $dni)->first();

        // Realizar la consulta SQL para obtener las cátedras del profesor con el DNI dado
        $catedras = DB::table('catedras')
                        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
                        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
                        ->where('profesores.dni', $dni)
                        ->select('catedras.*', 'materias.nombre_materia as nombre_materia')
                        ->get();

        return view('docentes.catedras.index', compact('catedras'));

    }



    public function asistenciaCargar1(){

        $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }

        $dni = auth()->user()->dni;

        $datos = Profesore::where('dni', $dni)->first();

        // Realizar la consulta SQL para obtener las cátedras del profesor con el DNI dado
        $catedras = DB::table('catedras')
                        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
                        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
                        ->where('profesores.dni', $dni)
                        ->select('catedras.*', 'materias.nombre_materia as nombre_materia')
                        ->get();

        return view('docentes.asistencia.asistenciaCargar1', compact('catedras'));

    }


    public function asistenciaCargar2(Request $request){

    $salud = $this->formSalud();
    if ($salud === false) {
        return view('errores.docentes.datosdesaludnorealizado');
    }

    $idCatedra = $request->input('catedra_id');

    $catedra = DB::table('catedras')
        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
        ->select('catedras.*', 'materias.nombre_materia as nombre_materia', 'materias.tipo as tipo_cursada')
        ->where('catedras.id', $idCatedra)
        ->first();

    // Verificar si se encontró la catedra y la materia asociada
    if (!$catedra) {
        // Manejar el caso donde no se encuentra la catedra
        return view('errores.docentes.catedra_no_encontrada');
    }

    // Obtener todos los estudiantes inscritos en la catedra
    $estudiantesInscritos = DB::table('inscripciones_materias')
        ->where('id_catedra', $idCatedra)
        ->pluck('dni');

    // Obtener todos los estudiantes de la catedra
    $estudiantes = Estudiante::whereIn('dni', $estudiantesInscritos)->get();

    $estudiantesLibres = [];
    $estudiantesNormales = [];

    // Obtener la fecha de inicio y fin del año actual
    $fechaInicioAno = now()->startOfYear(); // 1 de enero del año actual
    $fechaFinAno = now()->endOfYear(); // 31 de diciembre del año actual

    // Obtener la fecha de inicio y fin del primer cuatrimestre (marzo a julio del año actual)
    $fechaInicioPrimerCuatrimestre = $fechaInicioAno->copy()->addMonths(2); // Marzo
    $fechaFinPrimerCuatrimestre = $fechaInicioAno->copy()->addMonths(6)->endOfMonth(); // Julio

    // Obtener la fecha de inicio y fin del segundo cuatrimestre (agosto a diciembre del año actual)
    $fechaInicioSegundoCuatrimestre = $fechaInicioAno->copy()->addMonths(7); // Agosto
    $fechaFinSegundoCuatrimestre = $fechaFinAno->copy(); // Diciembre

    // Iterar sobre cada estudiante
    foreach ($estudiantes as $estudiante) {
        // Obtener todas las asistencias del estudiante en la catedra actual
        $asistencias = DB::table('asistencia')
            ->where('dni', $estudiante->dni)
            ->where('id_catedra', $idCatedra)
            ->orderBy('fecha')
            ->get();

        // Verificar si hay tres ausencias consecutivas marcadas como "A"
        $ausenciasConsecutivas = 0;
        foreach ($asistencias as $asistencia) {
            if ($asistencia->estado === 'A') {
                $ausenciasConsecutivas++;
                if ($ausenciasConsecutivas >= 3) {
                    // Si hay tres ausencias consecutivas marcadas como "A", marcar al estudiante como libre y salir del bucle
                    $estudiantesLibres[] = $estudiante;
                    break;
                }
            } else {
                // Si la asistencia no está marcada como "A", reiniciar el contador de ausencias consecutivas
                $ausenciasConsecutivas = 0;
            }
        }

        // Si el estudiante no fue marcado como libre por tener tres ausencias consecutivas, verificar el límite de ausencias por cuatrimestre y el límite anual según el tipo de cursada
        if (!in_array($estudiante, $estudiantesLibres)) {
            // Definir el límite de ausencias según el tipo de cursada
            if ($catedra->tipo_cursada == 'semanal') {
                $limiteAusenciasCuatrimestre = 4; // Límite de ausencias por cuatrimestre para materias semanales
                $limiteAusenciasAnual = 6; // Límite de ausencias anual para materias semanales
            } elseif ($catedra->tipo_cursada == 'bisemanal') {
                $limiteAusenciasCuatrimestre = 6; // Límite de ausencias por cuatrimestre para materias bisemanales
                $limiteAusenciasAnual = 12; // Límite de ausencias anual para materias bisemanales
            }

            // Contar las ausencias en el año actual
            $totalAusenciasAno = DB::table('asistencia')
                ->where('dni', $estudiante->dni)
                ->where('id_catedra', $idCatedra)
                ->where('estado', 'A')
                ->whereYear('fecha', Carbon::now()->year)
                ->count();

            // Contar las ausencias en el primer cuatrimestre
            $totalAusenciasPrimerCuatrimestre = DB::table('asistencia')
                ->where('dni', $estudiante->dni)
                ->where('id_catedra', $idCatedra)
                ->where('estado', 'A')
                ->whereBetween('fecha', [$fechaInicioPrimerCuatrimestre, $fechaFinPrimerCuatrimestre])
                ->count();

            // Contar las ausencias en el segundo cuatrimestre
            $totalAusenciasSegundoCuatrimestre = DB::table('asistencia')
                ->where('dni', $estudiante->dni)
                ->where('id_catedra', $idCatedra)
                ->where('estado', 'A')
                ->whereBetween('fecha', [$fechaInicioSegundoCuatrimestre, $fechaFinSegundoCuatrimestre])
                ->count();

            // Si el estudiante alcanza el límite de ausencias permitido por cuatrimestre o el límite anual, marcarlo como 'libre'
            if ($totalAusenciasAno >= $limiteAusenciasAnual ||
                $totalAusenciasPrimerCuatrimestre >= $limiteAusenciasCuatrimestre ||
                $totalAusenciasSegundoCuatrimestre >= $limiteAusenciasCuatrimestre
            ) {
                $estudiantesLibres[] = $estudiante;
            } else {
                $estudiantesNormales[] = $estudiante;
            }
        }
    }
        return view('docentes.asistencia.asistenciaCargar2', compact('estudiantesLibres', 'estudiantesNormales', 'catedra'));

    }






    public function asistenciaCargarGuardar(Request $request){

        $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }

        // Validación de los campos
        $validator = Validator::make($request->all(), [
            'catedra_id' => 'required',
            'estado' => 'required',
            'fecha' => 'required',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return "Error: Uno o más campos no han sido completados";
        }

        $catedra_id = $request->input('catedra_id');
        $estadoEstudiantes = $request->input('estado');
        $fecha = $request->input('fecha');

        // Iterar sobre el estado de cada estudiante y guardar la asistencia en la tabla de asistencias
        foreach ($estadoEstudiantes as $dni => $estado) {
            DB::table('asistencia')->insert([
                'dni' => $dni,
                'id_catedra' => $catedra_id,
                'estado' => $estado,
                'fecha' => $fecha,
                'ingreso' => Now(),
            ]);
        }

        return redirect()->route('asistencia')->with('asistenciaCargada', 'ok');

    }







}
