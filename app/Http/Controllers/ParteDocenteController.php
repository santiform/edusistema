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
           return view('errores.estudiantes.datosdesaludnorealizado');
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

        return redirect()->route('miPerfilDocente')->with('editarPerfil', 'ok');;

    }   




public function inscripcionMaterias()
{
    $menor = $this->esMenorDeEdad();
        $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
    $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }    


    $dni = auth()->user()->dni;

    

    // Obtener la carrera del docente
    $carreraOld = DB::table('docentes')
        ->where('dni', $dni)
        ->select('carrera')
        ->first();

    $carrera = $carreraOld->carrera;

    // Obtener las materias desde la tabla materias_x_carreras, excluyendo las aprobadas
    $materiasPorCarrera = DB::table('materias_x_carreras')
        ->where('id_carrera', $carrera)
        ->whereNotIn('id_materia', function ($query) use ($dni) {
            $query->from('calificaciones')
                ->where('dni', $dni)
                ->where('estado', 'APROBADO')
                ->select('id_materia'); // Seleccionar solo la columna id_materia
        })
        ->pluck('id_materia')
        ->toArray();

    // Obtener las cátedras que coincidan con las materias y tengan cupo mayor a cero
    $catedrasDisponibles = DB::table('catedras')
        ->whereIn('id_materia', $materiasPorCarrera)
        ->where('cupos', '>', -1)
        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
        ->select(
            'catedras.id',
            'catedras.aula',
            'catedras.aula_dia2',
            'catedras.dia1',
            'catedras.hora_comienzo_dia1',
            'catedras.hora_finalizacion_dia1',
            'catedras.dia2',
            'catedras.hora_comienzo_dia2',
            'catedras.hora_finalizacion_dia2',
            'materias.id as id_materia',
            'materias.nombre_materia as nombremateria',
            'profesores.apellido as apellido',
            'profesores.nombre as nombre'
        )
        ->orderBy('nombremateria')
        ->get();

    return view('docentes.inscripciones.materias.formulario', compact('catedrasDisponibles'));
}




public function inscripcionMaterias2()
{
        $menor = $this->esMenorDeEdad();
        $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
        $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }


        $dniviejo = auth()->user()->dni;    

        $dni = intval($dniviejo);

        // Esto obtendrá el valor seleccionado del formulario, que será "idCatedra|idMateria"
        $datos = request('catedra'); 

        if(empty($datos)){
            return redirect()->route('materiasForm')->with('noCatedra', 'ok');
        }

        // Divide el valor en dos partes utilizando el carácter "|"
        list($idCatedra, $idMateria) = explode('|', $datos);

        // Consulta para verificar si el docente ya está inscrito en la misma materia
        $inscripcionExistente = DB::table('inscripciones_materias')
            ->join('catedras', 'inscripciones_materias.id_catedra', '=', 'catedras.id')
            ->where('inscripciones_materias.dni', $dni)
            ->where('catedras.id_materia', $idMateria)
            ->exists();

        if ($inscripcionExistente) {
            // El docente ya está inscrito en esa catedra
            return redirect()->route('materiasForm')->with('yaInscripto', 'ok');
        } 


        $materia = DB::table('materias')
                ->select('nombre_materia')
                ->where('id', '=', $idMateria)
                ->first();     
                

                // Verificar examenes rendidos y correlativas

                if (!is_null($materia) && ($materia->nombre_materia === "PIANO COMPLEMENTARIO 1" or $materia->nombre_materia === "GUITARRA COMPLEMENTARIA 1")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['dni', $dni], 
                            ['estado', '=', 'APROBADO'], 
                        ])
                        ->whereIn('id_materia', ['1'])
                        ->get();

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['dni', $dni], 
                            ['estado', '=', 'APROBADO'], 
                        ])
                        ->whereIn('id_materia', ['3', '4', '5', '6', '7', '8', '103', '54'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($lenguaje) >= 1) {

                    $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesMaterias')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('materiasForm')->with('noCorrelativas', 'ok');
                    }
                }





                if (!is_null($materia) && ($materia->nombre_materia === "PRACTICA DE CONJUNTO 1")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['10'])
                        ->get();

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['12', '13', '14', '15', '16', '17', '104', '55'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesMaterias')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('materiasForm')->with('noCorrelativas', 'ok');
                    }
                }






                if (!is_null($materia) && ($materia->nombre_materia === "PIANO COMPLEMENTARIO 2" or $materia->nombre_materia === "GUITARRA COMPLEMENTARIA 2")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['10'])
                        ->get();

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['12', '13', '14', '15', '16', '17', '104', '55'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesMaterias')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('materiasForm')->with('noCorrelativas', 'ok');
                    }
                }
                    





                if (!is_null($materia) && ($materia->nombre_materia === "PIANO COMPLEMENTARIO 3" or $materia->nombre_materia === "GUITARRA COMPLEMENTARIA 3")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['20'])
                        ->get();

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['22', '23', '24', '25', '26', '27', '105', '56'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesMaterias')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('materiasForm')->with('noCorrelativas', 'ok');
                    }
                }



                



                if (!is_null($materia) && ($materia->nombre_materia === "LENGUAJE MUSICAL - MODULO 3" or $materia->nombre_materia === "CORO MODULO 3"
                or $materia->nombre_materia === "PIANO - MODULO 3" or $materia->nombre_materia === "VIOLIN - MODULO 3"
                or $materia->nombre_materia === "VIOLONCELLO - MODULO 3" or $materia->nombre_materia === "FLAUTA TRAVERSA - MODULO 3"
                or $materia->nombre_materia === "SAXO - MODULO 3" or $materia->nombre_materia === "CLARINETE - MODULO 3"
                or $materia->nombre_materia === "GUITARRA - MODULO 3")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['75'])
                        ->get();

                    $coro = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['76'])
                        ->get();    

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['77', '78', '79', '80', '81', '82', '100'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($coro) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesMaterias')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('materiasForm')->with('noCorrelativas', 'ok');
                    }
                }




                if (!is_null($materia) && ($materia->nombre_materia === "LENGUAJE MUSICAL - MODULO 4" or $materia->nombre_materia === "CORO MODULO 4"
                or $materia->nombre_materia === "PIANO - MODULO 4" or $materia->nombre_materia === "VIOLIN - MODULO 4"
                or $materia->nombre_materia === "VIOLONCELLO - MODULO 4" or $materia->nombre_materia === "FLAUTA TRAVERSA - MODULO 4"
                or $materia->nombre_materia === "SAXO - MODULO 4" or $materia->nombre_materia === "CLARINETE - MODULO 4"
                or $materia->nombre_materia === "GUITARRA - MODULO 4")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['83'])
                        ->get();

                    $coro = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['84'])
                        ->get();    

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['85', '86', '87', '88', '89', '90', '101'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($coro) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                    ]);

                        return redirect()->route('misInscripcionesMaterias')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('materiasForm')->with('noCorrelativas', 'ok');
                    }
                }


                $ComprobarCorrelativas = DB::table('correlativas')->where('id_materia', "=", $idMateria)->doesntExist();

                if ($ComprobarCorrelativas) {
                    $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                    return redirect()->route('misInscripcionesMaterias')->with('inscValidada', 'ok');
                }

                $materiasAprobadas = DB::table('calificaciones')
                    ->where('dni', '=', $dni)
                    ->where('estado', '=', 'APROBADO')
                    ->pluck('id_materia')
                    ->toArray();

                $correlativas = DB::table('correlativas')
                    ->where('id_materia', '=', $idMateria)
                    ->pluck('id_correlativa')
                    ->toArray();

                $diff = array_diff($correlativas, $materiasAprobadas);



                if (empty($diff)) {
                    $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                   return redirect()->route('misInscripcionesMaterias')->with('inscValidada', 'ok');
                } else {
                    // El docente no cumple con las correlativas, mostrar el error
                   return redirect()->route('materiasForm')->with('noCorrelativas', 'ok');
                }

            }












public function inscripcionExamenes()
{
    $menor = $this->esMenorDeEdad();
        $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
    $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }    

    $dni = auth()->user()->dni;

    // Obtener la carrera del docente
    $carreraOld = DB::table('docentes')
        ->where('dni', $dni)
        ->select('carrera')
        ->first();

    $carrera = $carreraOld->carrera;

    // Obtener las materias desde la tabla materias_x_carreras, excluyendo las aprobadas
    $materiasPorCarrera = DB::table('materias_x_carreras')
        ->where('id_carrera', $carrera)
        ->whereNotIn('id_materia', function ($query) use ($dni) {
            $query->from('calificaciones')
                ->where('dni', $dni)
                ->where('estado', 'APROBADO')
                ->select('id_materia'); // Seleccionar solo la columna id_materia
        })
        ->pluck('id_materia')
        ->toArray();

    // Obtener las cátedras que coincidan con las materias y tengan cupo mayor a cero
    $examenesDisponibles = DB::table('examenes_fechas')
    ->whereIn('id_catedra', function ($query) use ($materiasPorCarrera) {
        $query->select('id')
            ->from('catedras')
            ->whereIn('id_materia', $materiasPorCarrera);
    })
    ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
    ->join('materias', 'catedras.id_materia', '=', 'materias.id')
    ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
    ->select(
        'examenes_fechas.id',
        'examenes_fechas.fecha',
        'catedras.id as catedra_id',
        'catedras.aula',
        'catedras.dia1',
        'catedras.hora_comienzo_dia1',
        'catedras.hora_finalizacion_dia1',
        'catedras.dia2',
        'catedras.hora_comienzo_dia2',
        'catedras.hora_finalizacion_dia2',
        'materias.id as id_materia',
        'materias.nombre_materia as nombremateria',
        'profesores.apellido as apellido',
        'profesores.nombre as nombre'
    )
    ->orderBy('nombremateria')
    ->get();


    return view('docentes.inscripciones.examenes.formulario', compact('examenesDisponibles'));
}




public function inscripcionExamenes2()
{
        $menor = $this->esMenorDeEdad();
        $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
        $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }

        $dniviejo = auth()->user()->dni;    

        $dni = intval($dniviejo);

        // Esto obtendrá el valor seleccionado del formulario, que será "idCatedra|idMateria"
        $datos = request('examen'); 

        if(empty($datos)){
            return redirect()->route('examenesForm')->with('noExamen', 'ok');
        }

        // Divide el valor en dos partes utilizando el carácter "|"
        list($idFecha, $idCatedra) = explode('|', $datos);

        $idMateriaOld = DB::table('catedras')
                ->select('id_materia')
                ->where('id', '=', $idCatedra)
                ->first();

        $idMateria = $idMateriaOld->id_materia;


        // Consulta para verificar si el docente ya está inscrito en la misma materia
        $inscripcionExistente = DB::table('inscripciones_examenes')
            ->join('examenes_fechas', 'inscripciones_examenes.id_fecha_examen', '=', 'examenes_fechas.id')
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->where('inscripciones_examenes.dni', $dni)
            ->where('catedras.id_materia', $idMateria)
            ->exists();

        if ($inscripcionExistente) {
            // El docente ya está inscrito en ese examen
            return redirect()->route('examenesForm')->with('yaInscripto', 'ok');
        } 
 

        $materiaOld = DB::table('materias')
                ->where('id', '=', $idMateria)
                ->select('nombre_materia')
                ->first();

        $materia = $materiaOld->nombre_materia; // Corrección en esta línea
            // Verificar examenes rendidos y correlativas

                if (!is_null($materia) && ($materiaOld->nombre_materia === "PIANO COMPLEMENTARIO 1" or $materiaOld->nombre_materia === "GUITARRA COMPLEMENTARIA 1")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['dni', $dni], 
                            ['estado', '=', 'APROBADO'], 
                        ])
                        ->whereIn('id_materia', ['1'])
                        ->get();

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['dni', $dni], 
                            ['estado', '=', 'APROBADO'], 
                        ])
                        ->whereIn('id_materia', ['3', '4', '5', '6', '7', '8', '103', '54'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($lenguaje) >= 1) {

                    $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesExamenes')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('examenesForm')->with('noCorrelativas', 'ok');
                    }
                }





                if (!is_null($materia) && ($materiaOld->nombre_materia === "PRACTICA DE CONJUNTO 1")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['10'])
                        ->get();

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['12', '13', '14', '15', '16', '17', '104', '55'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesExamenes')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('examenesForm')->with('noCorrelativas', 'ok');
                    }
                }






                if (!is_null($materia) && ($materiaOld->nombre_materia === "PIANO COMPLEMENTARIO 2" or $materiaOld->nombre_materia === "GUITARRA COMPLEMENTARIA 2")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['10'])
                        ->get();

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['12', '13', '14', '15', '16', '17', '104', '55'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesExamenes')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('examenesForm')->with('noCorrelativas', 'ok');
                    }
                }
                    





                if (!is_null($materia) && ($materiaOld->nombre_materia === "PIANO COMPLEMENTARIO 3" or $materiaOld->nombre_materia === "GUITARRA COMPLEMENTARIA 3")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['20'])
                        ->get();

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['22', '23', '24', '25', '26', '27', '105', '56'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesExamenes')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('examenesForm')->with('noCorrelativas', 'ok');
                    }
                }



                



                if (!is_null($materia) && ($materiaOld->nombre_materia === "LENGUAJE MUSICAL - MODULO 3" or $materiaOld->nombre_materia === "CORO MODULO 3"
                or $materiaOld->nombre_materia === "PIANO - MODULO 3" or $materiaOld->nombre_materia === "VIOLIN - MODULO 3"
                or $materiaOld->nombre_materia === "VIOLONCELLO - MODULO 3" or $materiaOld->nombre_materia === "FLAUTA TRAVERSA - MODULO 3"
                or $materiaOld->nombre_materia === "SAXO - MODULO 3" or $materiaOld->nombre_materia === "CLARINETE - MODULO 3"
                or $materiaOld->nombre_materia === "GUITARRA - MODULO 3")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['75'])
                        ->get();

                    $coro = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['76'])
                        ->get();    

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['77', '78', '79', '80', '81', '82', '100'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($coro) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesExamenes')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('examenesForm')->with('noCorrelativas', 'ok');
                    }
                }




                if (!is_null($materia) && ($materiaOld->nombre_materia === "LENGUAJE MUSICAL - MODULO 4" or $materiaOld->nombre_materia === "CORO MODULO 4"
                or $materiaOld->nombre_materia === "PIANO - MODULO 4" or $materiaOld->nombre_materia === "VIOLIN - MODULO 4"
                or $materiaOld->nombre_materia === "VIOLONCELLO - MODULO 4" or $materiaOld->nombre_materia === "FLAUTA TRAVERSA - MODULO 4"
                or $materiaOld->nombre_materia === "SAXO - MODULO 4" or $materiaOld->nombre_materia === "CLARINETE - MODULO 4"
                or $materiaOld->nombre_materia === "GUITARRA - MODULO 4")) {
                    $lenguaje = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['83'])
                        ->get();

                    $coro = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['84'])
                        ->get();    

                    $instrumento = DB::table('calificaciones')
                        ->where([
                            ['DNI', $dni], 
                            ['ESTADO', '=', 'APROBADO'], 
                        ])
                        ->whereIn('ID_MATERIA', ['85', '86', '87', '88', '89', '90', '101'])
                        ->get();

                    if (sizeof($instrumento) >= 1 && sizeof($coro) >= 1 && sizeof($lenguaje) >= 1) {
                        $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                        return redirect()->route('misInscripcionesExamenes')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('examenesForm')->with('noCorrelativas', 'ok');
                    }
                }


                $ComprobarCorrelativas = DB::table('correlativas')->where('id_materia', "=", $idMateria)->doesntExist();

                if ($ComprobarCorrelativas) {
                    $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                    return redirect()->route('misInscripcionesExamenes')->with('inscValidada', 'ok');
                }

                $materiasAprobadas = DB::table('calificaciones')
                    ->where('dni', '=', $dni)
                    ->where('estado', '=', 'APROBADO')
                    ->pluck('id_materia')
                    ->toArray();

                $correlativas = DB::table('correlativas')
                    ->where('id_materia', '=', $idMateria)
                    ->pluck('id_correlativa')
                    ->toArray();

                $diff = array_diff($correlativas, $materiasAprobadas);



                if (empty($diff)) {
                    $condicion = "regular";

                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);

                    return redirect()->route('misInscripcionesExamenes')->with('inscValidada', 'ok');
                } else {
                    // El docente no cumple con las correlativas, mostrar el error
                    return redirect()->route('examenesForm')->with('noCorrelativas', 'ok');
                }

            }








public function misInscripcionesMaterias()
{
    $menor = $this->esMenorDeEdad();
    $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
    $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }    

    $dni = auth()->user()->dni;  

    
    $inscripciones = DB::table('inscripciones_materias')
    ->join('catedras', 'inscripciones_materias.id_catedra', '=', 'catedras.id')
    ->join('materias', 'catedras.id_materia', '=', 'materias.id')
    ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
    ->select('inscripciones_materias.*', 'materias.nombre_materia as nombre_materia', 'profesores.nombre as nombre_profesor', 'profesores.apellido as apellido_profesor', 'catedras.aula as aula_dia1', 'catedras.aula_dia2 as aula_dia2',
        'catedras.dia1 as dia1', 'catedras.dia2 as dia2', 'catedras.hora_comienzo_dia1 as hora_comienzo_dia1',
        'catedras.hora_finalizacion_dia1 as hora_finalizacion_dia1', 
        'catedras.dia2 as dia2', 'catedras.hora_comienzo_dia2 as hora_comienzo_dia2',
        'catedras.hora_finalizacion_dia2 as hora_finalizacion_dia2', 
        )
    ->where('inscripciones_materias.dni', '=', $dni)
    ->get();

    return view('docentes.inscripciones.materias.misinscripciones', compact('inscripciones'));

}

   


public function eliminarInscripcionMateria(Request $request, $id)
{
    $inscripcion = DB::table('inscripciones_materias')->where('id', $id)->first();

        // Elimina la inscripción
    DB::table('inscripciones_materias')->where('id', $id)->delete();

    
    return redirect()->route('misInscripcionesMaterias')->with('borrar', 'ok');
}






public function misInscripcionesExamenes()
{
    $menor = $this->esMenorDeEdad();
        $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
    $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }    

    $dni = auth()->user()->dni;  


    $inscripciones = DB::table('inscripciones_examenes')
    ->join('examenes_fechas', 'inscripciones_examenes.id_fecha_examen', '=', 'examenes_fechas.id')
    ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
    ->join('materias', 'catedras.id_materia', '=', 'materias.id')
    ->join('profesores as presidente', 'examenes_fechas.presidente', '=', 'presidente.dni')
    ->join('profesores as vocal1', 'examenes_fechas.vocal1', '=', 'vocal1.dni')
    ->join('profesores as vocal2', 'examenes_fechas.vocal2', '=', 'vocal2.dni')
    ->select(
        'inscripciones_examenes.id',
        'examenes_fechas.fecha as fecha',
        'examenes_fechas.aula as aula',
        'examenes_fechas.hora_comienzo as hora_comienzo',
        'examenes_fechas.hora_finalizacion as hora_finalizacion',
        'materias.nombre_materia as nombre_materia',
        'presidente.apellido as apellido_presidente',
        'presidente.nombre as nombre_presidente',
        'vocal1.apellido as apellido_vocal1',
        'vocal1.nombre as nombre_vocal1',
        'vocal2.apellido as apellido_vocal2',
        'vocal2.nombre as nombre_vocal2'
    )
    ->where('inscripciones_examenes.dni', $dni)
    ->get();


    return view('docentes.inscripciones.examenes.misinscripciones', compact('inscripciones'));

}

   


public function eliminarInscripcionExamen(Request $request, $id)
{
    $inscripcion = DB::table('inscripciones_examenes')->where('id', $id)->first();

    // Elimina la inscripción
    DB::table('inscripciones_examenes')->where('id', $id)->delete();

    // Redirige de nuevo a la página anterior (historial del navegador)
    return redirect()->back()->with('borrar', 'ok');
}




public function misCalificaciones() {
    $menor = $this->esMenorDeEdad();
        $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
    $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }    

    $dni = auth()->user()->dni;

    // Obtener el DNI del docente autenticado
    $dnidocente = auth()->user()->dni;

    // Obtener la carrera del docente
    $carrera = DB::table('docentes')
        ->where('dni', $dnidocente)
        ->value('carrera');

    $nombreCarrera = DB::table('carreras')
        ->where('id', $carrera)
        ->value('nombre_carrera');

    // Obtener las materias de la carrera
    $materiasCarrera = DB::table('materias_x_carreras')
        ->where('id_carrera', $carrera)
        ->pluck('id_materia');

    // Obtener las calificaciones del docente en las materias de la carrera
    $calificaciones = DB::table('calificaciones')
    ->join('materias', 'calificaciones.id_materia', '=', 'materias.id')
    ->whereIn('calificaciones.id_materia', $materiasCarrera)
    ->where('calificaciones.dni', $dnidocente)
    ->select('calificaciones.*', 'materias.nombre_materia as nombre_materia')
    ->get();

    foreach ($calificaciones as $calificacion) {
    if (is_numeric($calificacion->nota_cuatri1)) {
        $calificacion->nota_cuatri1_letras = ConversionNotas::notaEnLetras($calificacion->nota_cuatri1);
    } else {
        $calificacion->nota_cuatri1_letras = 'Nota no válida';
    }
    }


    foreach ($calificaciones as $calificacion) {
    if (is_numeric($calificacion->nota_cuatri2)) {
        $calificacion->nota_cuatri2_letras = ConversionNotas::notaEnLetras($calificacion->nota_cuatri2);
    } else {
        $calificacion->nota_cuatri2_letras = 'Nota no válida';
    }
    }


    foreach ($calificaciones as $calificacion) {
    if (is_numeric($calificacion->nota_final)) {
        $calificacion->nota_final_letras = ConversionNotas::notaEnLetras($calificacion->nota_final);
    } else {
        $calificacion->nota_final_letras = 'Nota no válida';
        }
    }

    foreach ($calificaciones as $calificacion) {
        if ($calificacion->nota_final !== null) {
            $calificacion->fechaFinalFormateada = Carbon::parse($calificacion->fecha_final)->format('d/m/Y');
        }
    }

        return view('docentes.historialacademico.miscalificaciones', compact('calificaciones', 'nombreCarrera'));

}



public function avanceEnLaCarrera() {
    $menor = $this->esMenorDeEdad();
        $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
    $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }    

    $dni = auth()->user()->dni;


    $idCarrera = DB::table('docentes')
        ->where('dni', $dni)
        ->value('carrera');

    $nombreCarrera = DB::table('carreras')
        ->where('id', $idCarrera)
        ->value('nombre_carrera');

    $conteoMateriasCarrera = DB::table('materias_x_carreras')
        ->where('id_carrera', $idCarrera)
        ->count(); 

    $conteoMateriasAprobadas = DB::table('calificaciones')
        ->join('materias_x_carreras', 'calificaciones.id_materia', '=', 'materias_x_carreras.id_materia')
        ->join('docentes', 'calificaciones.dni', '=', 'docentes.dni')
        ->where('calificaciones.dni', $dni)
        ->where('calificaciones.estado', 'APROBADO') // Filtrar por estado aprobado (ajusta esto según tu estructura de datos)
        ->where('materias_x_carreras.id_carrera', $idCarrera)
        ->count();

    $totalMateriasMenosAprobadas = $conteoMateriasCarrera - $conteoMateriasAprobadas;


    $porcentajeMateriasAprobadasOld = ($conteoMateriasAprobadas / $conteoMateriasCarrera) * 100;

    
    $porcentajeMateriasAprobadas = number_format($porcentajeMateriasAprobadasOld, 2);    


      

    return view('docentes.historialacademico.avanceenlacarrera', compact('nombreCarrera', 
        'conteoMateriasCarrera', 'conteoMateriasAprobadas', 'totalMateriasMenosAprobadas', 'porcentajeMateriasAprobadas'));  


}


public function planDeEstudio() {
    $menor = $this->esMenorDeEdad();
        $retiromenores = $this->formRetiro();
        if ($menor === true && $retiromenores === false) {
           return view('errores.docentes.retirodemenoresnorealizado');
        }
    $salud = $this->formSalud();
        if ($salud === false) {
           return view('errores.docentes.datosdesaludnorealizado');
        }    

    $dni = auth()->user()->dni;

    $idCarrera = DB::table('docentes')
        ->where('dni', $dni)
        ->value('carrera');

    $nombreCarrera = DB::table('carreras')
        ->where('id', $idCarrera)
        ->value('nombre_carrera');    

    $conteoMateriasCarrera = DB::table('materias_x_carreras')
        ->where('id_carrera', $idCarrera)
        ->pluck('id_materia');

    $materias = DB::table('materias')
    ->whereIn('id', $conteoMateriasCarrera) // $conteoMateriasCarrera contiene los IDs de materias_x_carreras
    ->select('nombre_materia', 'modalidad', 'link_programa')
    ->orderBy('id')
    ->get();

    return view('docentes.informacionacademica.plandeestudio', compact('materias', 'nombreCarrera')); 

}





/* Esta es una funcion muy sencilla para generar un PDF
la dejo aca como ejemplo, puede ser usada para cualquier tipo de certificado*/
public function certificadodocenteRegular() {

    $data = [
        'nombre' => 'Formichelli Santiago',
        'curso' => 'Piano',
        'fecha' => '01/01/2023',
    ];

    $pdf = PDF::loadView('docentes.informacionacademica.certificadodocenteregular', $data);

    return $pdf->stream('certificado.pdf');


}









}
