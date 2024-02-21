<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\ConversionNotas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;

/**
 * Class EstudianteController
 * @package App\Http\Controllers
 */
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $estudiantes = DB::table('estudiantes')
    ->join('carreras', 'estudiantes.carrera', '=', 'carreras.id')
    ->select('estudiantes.*', 'carreras.nombre_carrera as carreranombre')
    ->get();

    return view('adm2023divox.estudiante.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiante = new Estudiante();
        $carreras = Carrera::pluck('nombre_carrera', 'id');

        return view('adm2023divox.estudiante.create', compact('estudiante','carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estudiante::$rules);

        $estudiante = Estudiante::create($request->all());

        DB::table('users')->insert([
        'dni' => $request->input('dni'),
        'tipo' => "estudiante",
        'name' => $request->input('apellido')." ".$request->input('nombre'),
        'email' => $request->input('mail'),
        'password' => bcrypt($request->input('celular')),

        ]);

        return redirect()->route('estudiantes.index')
            ->with('crear', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);

        $carreraId = $estudiante->carrera;

        $carrera = DB::table('carreras')
            ->select('nombre_carrera')
            ->where('id', "=", $carreraId)
            ->first();

        $nombreCarrera = $carrera ? $carrera->nombre_carrera : null;

        return view('adm2023divox.estudiante.show', compact('estudiante', 'nombreCarrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        $carreras = Carrera::pluck('nombre_carrera', 'id');

        return view('adm2023divox.estudiante.edit', compact('estudiante', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        request()->validate(Estudiante::$rules);

        $estudiante->update($request->all());

        DB::table('users')->updateOrInsert(
            ['dni' => $request->input('dni')],
            [
                'tipo' => "estudiante",
                'name' => $request->input('apellido')." ".$request->input('nombre'),
                'email' => $request->input('mail'),
            ]
        );


        return redirect()->route('estudiantes.index')
            ->with('editar', 'ok');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id)->delete();

        return redirect()->route('estudiantes.index')
            ->with('borrar', 'ok');
    }





    public function DatosDeSalud($dni)
    {
       
        
    $nombreArchivo = $dni . '.csv'; // Por ejemplo, "314526592.csv"

    $estudiante = DB::table('estudiantes')
    ->where('dni', '=', $dni)
    ->select('id', 'apellido', 'nombre')
    ->first();



    $ruta = 'formularios/datos-de-salud/' . $nombreArchivo;

    // Verificar si el archivo existe en el almacenamiento local
    if (Storage::disk('local')->exists($ruta)) {
        // El archivo CSV existe, intenta leerlo

        // Obtiene la ruta completa al archivo
        $archivoCompleto = storage_path('app/' . $ruta);

        $csv = Reader::createFromPath($archivoCompleto, 'r');
        $data = $csv->getRecords(); // Obtiene los registros

        return view('adm2023divox.estudiante.datosdesalud', compact('data', 'estudiante'));
    } else {
        // El archivo CSV no existe, redirige a otro lugar
        return view('errores.adm.noexistendatosdesalud', compact('dni', 'ruta', ));
    }

    } 




    public function DatosRetiroDeMenores($dni)
    {
       
        
    $nombreArchivo = $dni . '.csv'; // Por ejemplo, "314526592.csv"

    $estudiante = DB::table('estudiantes')
    ->where('dni', '=', $dni)
    ->select('id', 'apellido', 'nombre')
    ->first();



    $ruta = 'formularios/retiro-de-menores/' . $nombreArchivo;

    // Verificar si el archivo existe en el almacenamiento local
    if (Storage::disk('local')->exists($ruta)) {
        // El archivo CSV existe, intenta leerlo

        // Obtiene la ruta completa al archivo
        $archivoCompleto = storage_path('app/' . $ruta);

        $csv = Reader::createFromPath($archivoCompleto, 'r');
        $data = $csv->getRecords(); // Obtiene los registros

        return view('adm2023divox.estudiante.retirodemenores', compact('data', 'estudiante'));
    } else {
        // El archivo CSV no existe, redirige a otro lugar
        return view('errores.adm.noexistendatosretirodemenores', compact('dni', 'ruta', ));
    }

    } 





public function calificaciones($id)
{
    $estudiante = DB::table('estudiantes')
        ->where('id', '=', $id)
        ->first();

    $dniEstudiante = $estudiante->dni;

    $carrera = DB::table('estudiantes')
        ->where('dni', $dniEstudiante)
        ->value('carrera');

    $nombreCarrera = DB::table('carreras')
        ->where('id', $carrera)
        ->value('nombre_carrera');

    // Obtener las materias de la carrera
    $materiasCarrera = DB::table('materias_x_carreras')
        ->where('id_carrera', $carrera)
        ->pluck('id_materia');

    // Obtener las calificaciones del estudiante en las materias de la carrera
    $calificaciones = DB::table('calificaciones')
        ->join('materias', 'calificaciones.id_materia', '=', 'materias.id')
        ->whereIn('calificaciones.id_materia', $materiasCarrera)
        ->where('calificaciones.dni', $dniEstudiante)
        ->select('calificaciones.*', 'materias.nombre_materia as nombre_materia')
        ->get();

    foreach ($calificaciones as $calificacion) {
        if (is_numeric($calificacion->nota_cuatri1)) {
            $calificacion->nota_cuatri1_letras = ConversionNotas::notaEnLetras($calificacion->nota_cuatri1);
        } else {
            $calificacion->nota_cuatri1_letras = 'Nota no válida';
        }

        if (is_numeric($calificacion->nota_cuatri2)) {
            $calificacion->nota_cuatri2_letras = ConversionNotas::notaEnLetras($calificacion->nota_cuatri2);
        } else {
            $calificacion->nota_cuatri2_letras = 'Nota no válida';
        }

        if (is_numeric($calificacion->nota_final)) {
            $calificacion->nota_final_letras = ConversionNotas::notaEnLetras($calificacion->nota_final);
        } else {
            $calificacion->nota_final_letras = 'Nota no válida';
        }
    }

    return view('adm2023divox.estudiante.calificaciones', compact('estudiante', 'calificaciones', 'nombreCarrera'));
}



public function inscripcionesMaterias($id)
{
    $estudiante = DB::table('estudiantes')
        ->where('id', '=', $id)
        ->first();

    $dni = $estudiante->dni;

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

    return view('inscripciones-materias.add', compact('inscripciones','estudiante'));
}




public function inscripcionesExamenes($id)
{
    $estudiante = DB::table('estudiantes')
        ->where('id', '=', $id)
        ->first();

    $dni = $estudiante->dni;

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

    return view('adm2023divox.estudiante.inscripcionexamenes', compact('inscripciones','estudiante'));
}



public function inscripcionMateriasEliminar(Request $request, $idEstudiante, $idInscripcion)
    {
        $idEstudiante = $request->idEstudiante;
        $idInscripcion = $request->idInscripcion;

        DB::table('inscripciones_materias')->where('id', $idInscripcion)->delete();

        return Redirect::route('inscripciones-materias.add', ['id' => $idEstudiante])->with('borrar', 'ok');
    }




public function inscripcionMateriasAgregar(Request $request, $dni)
{
    $estudiante = DB::table('estudiantes')
        ->where('dni', $dni)
        ->first(); 

    // Obtener la carrera del estudiante
    $carreraOld = DB::table('estudiantes')
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

    return view('adm2023divox.estudiante.inscripcionmateriasagregar', compact('catedrasDisponibles', 'estudiante'));
}



public function inscripcionMateriasAgregarEnviar(Request $request)
{

    $dni = $request->input('dni');

        // Esto obtendrá el valor seleccionado del formulario, que será "idCatedra|idMateria"
        $datos = request('catedra'); 

        if(empty($datos)){
           return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('noCatedra', 'ok');

        }

        // Divide el valor en dos partes utilizando el carácter "|"
        list($idCatedra, $idMateria) = explode('|', $datos);

        // Consulta para verificar si el estudiante ya está inscrito en la misma materia
        $inscripcionExistente = DB::table('inscripciones_materias')
            ->join('catedras', 'inscripciones_materias.id_catedra', '=', 'catedras.id')
            ->where('inscripciones_materias.dni', $dni)
            ->where('catedras.id_materia', $idMateria)
            ->exists();

        if ($inscripcionExistente) {
            // El estudiante ya está inscrito en esa catedra
            return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('yaInscripto', 'ok');

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

                        return redirect()->route('inscripciones-materias.add')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('inscripciones-materias.add')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('inscripciones-materias.add')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('inscripciones-materias.add')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('inscripciones-materias.add')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('inscripciones-materias.add')->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                    return redirect()->route('inscripciones-materias.add')->with('inscValidada', 'ok');
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

                   return redirect()->route('inscripciones-materias.add')->with('inscValidada', 'ok');
                } else {
                    // El estudiante no cumple con las correlativas, mostrar el error
                   return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
                }

            }














public function inscripcionExamenesEliminar(Request $request, $idEstudiante, $idInscripcion)
    {
        $idEstudiante = $request->idEstudiante;
        $idInscripcion = $request->idInscripcion;

        DB::table('inscripciones_examenes')->where('id', $idInscripcion)->delete();

        return Redirect::route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante])->with('borrar', 'ok');
    }




public function inscripcionExamenesAgregar(Request $request, $dni)
{
    $estudiante = DB::table('estudiantes')
        ->where('dni', $dni)
        ->first(); 

    // Obtener la carrera del estudiante
    $carreraOld = DB::table('estudiantes')
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

    return view('adm2023divox.estudiante.inscripcionexamenesagregar', compact('examenesDisponibles', 'estudiante'));
}



public function inscripcionExamenesAgregarEnviar(Request $request)
{
        $dni = $request->input('dni');

        $idEstudiante = DB::table('estudiantes')
            ->where('dni', $dni)
            ->select('id')
            ->first();

        // Esto obtendrá el valor seleccionado del formulario, que será "idCatedra|idMateria"
        $datos = request('examen'); 

        if(empty($datos)){
            return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noExamen', 'ok');
        }

        // Divide el valor en dos partes utilizando el carácter "|"
        list($idFecha, $idCatedra) = explode('|', $datos);

        $idMateriaOld = DB::table('catedras')
                ->select('id_materia')
                ->where('id', '=', $idCatedra)
                ->first();


        $idMateria = $idMateriaOld->id_materia;
        

        // Consulta para verificar si el estudiante ya está inscrito en la misma materia
        $inscripcionExistente = DB::table('inscripciones_examenes')
            ->join('examenes_fechas', 'inscripciones_examenes.id_fecha_examen', '=', 'examenes_fechas.id')
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->where('inscripciones_examenes.dni', $dni)
            ->where('catedras.id_materia', $idMateria)
            ->exists();

        if ($inscripcionExistente) {
            // El estudiante ya está inscrito en ese examen
            return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('yaInscripto', 'ok');
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

                        return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');

                    } else {
                        return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                        return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
                    } else {
                        return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
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

                    return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
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

                    return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
                } else {
                    // El estudiante no cumple con las correlativas, mostrar el error
                    return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noCorrelativas', 'ok');
                }

            }


















public function inscripcionExamenesAgregarDirecto(Request $request, $dni)
{
    $estudiante = DB::table('estudiantes')
        ->where('dni', $dni)
        ->first(); 

    // Obtener la carrera del estudiante
    $carreraOld = DB::table('estudiantes')
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

    return view('adm2023divox.estudiante.inscripcionexamenesagregarDirecto', compact('examenesDisponibles', 'estudiante'));
}



public function inscripcionExamenesAgregarEnviarDirecto(Request $request)
{
        $dni = $request->input('dni');

        $idEstudiante = DB::table('estudiantes')
            ->where('dni', $dni)
            ->select('id')
            ->first();

        // Esto obtendrá el valor seleccionado del formulario, que será "idCatedra|idMateria"
        $datos = request('examen'); 

        $condicion = $request->input('condicion');

        if(empty($datos)){
            return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('noExamen', 'ok');
        }

        // Divide el valor en dos partes utilizando el carácter "|"
        list($idFecha, $idCatedra) = explode('|', $datos);

        $idMateriaOld = DB::table('catedras')
                ->select('id_materia')
                ->where('id', '=', $idCatedra)
                ->first();


        $idMateria = $idMateriaOld->id_materia;
        

        // Consulta para verificar si el estudiante ya está inscrito en la misma materia
        $inscripcionExistente = DB::table('inscripciones_examenes')
            ->join('examenes_fechas', 'inscripciones_examenes.id_fecha_examen', '=', 'examenes_fechas.id')
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->where('inscripciones_examenes.dni', $dni)
            ->where('catedras.id_materia', $idMateria)
            ->exists();

        if ($inscripcionExistente) {
            // El estudiante ya está inscrito en ese examen
            return redirect()->route('inscripciones-examenes.add', ['dni' => $dni])->with('yaInscripto', 'ok');
        } 


                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_examenes')->insert([
                        'dni' => $dni,
                        'id_fecha_examen' => $idFecha,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);
                  

           return redirect()->route('adm2023divox.estudiante.inscripcionexamenes', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
                


            }

















public function inscripcionMateriasAgregarDirecto(Request $request, $dni)
{
    $estudiante = DB::table('estudiantes')
        ->where('dni', $dni)
        ->first(); 

    // Obtener la carrera del estudiante
    $carreraOld = DB::table('estudiantes')
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

    return view('adm2023divox.estudiante.inscripcionmateriasagregarDirecto', compact('catedrasDisponibles', 'estudiante'));
}



public function inscripcionMateriasAgregarEnviarDirecto(Request $request)
{
        $dni = $request->input('dni');

        $condicion = $request->input('condicion');

        $idEstudiante = DB::table('estudiantes')
            ->where('dni', $dni)
            ->select('id')
            ->first();

        // Esto obtendrá el valor seleccionado del formulario, que será "idCatedra|idMateria"
        $idCatedra = $request->input('catedra'); 


        $idMateriaOld = DB::table('catedras')
                ->select('id_materia')
                ->where('id', '=', $idCatedra)
                ->first();


        $idMateria = $idMateriaOld->id_materia;
        

        // Consulta para verificar si el estudiante ya está inscrito en la misma materia
        $inscripcionExistente = DB::table('inscripciones_materias')
            ->join('catedras', 'inscripciones_materias.id_catedra', '=', 'catedras.id')
            ->where('inscripciones_materias.dni', $dni)
            ->where('catedras.id_materia', $idMateria)
            ->exists();

        if ($inscripcionExistente) {
            // El estudiante ya está inscrito en ese examen
            return redirect()->route('inscripciones-materias.add', ['dni' => $dni])->with('yaInscripto', 'ok');
        } 


                    // Consulta para insertar los datos utilizando el Query Builder
                    DB::table('inscripciones_materias')->insert([
                        'dni' => $dni,
                        'id_catedra' => $idCatedra,
                        'condicion' => $condicion,
                        'created_at' => now(),
                    ]);
                  

           return redirect()->route('inscripciones-materias.add', ['id' => $idEstudiante->id])->with('inscValidada', 'ok');
                


            }












}
