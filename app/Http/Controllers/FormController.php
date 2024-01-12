<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catedra;
use App\Models\Materia;
use App\Models\Estudiante;
use App\Models\Profesore;
use App\Models\ExamenesFecha;

use Illuminate\Support\Facades\DB;
use App\ConversionNotas;



use League\Csv\Writer;

class FormController extends Controller
{



     public function preinscripciones()
    {

        /* esta funcion hay que reformularla, porque ahora se estarán anotando los regulares por acá*/

        $carreras = DB::table('carreras')
            ->select('id', 'nombre_carrera')
            ->get();
        
        return view('estudiantes.inscripciones.preinscripciones.index', compact('carreras'));
    }


    public function guardarPreinscripciones(Request $request) {

    $dni = $request->input('dni');

    $dniExistente = Estudiante::where('dni', $dni)->first();

        if ($dniExistente) {
            // DNI ya registrado, redirigir a la vista de error
            return view('errores.estudiantes.dniduplicado', compact('dni'));
        }



    $email = $request->input('mail');    

    $emailExistente = DB::table('users')
    ->where('email', $email)
    ->first();       

        if ($emailExistente) {
            // Mail ya registrado, redirigir a la vista de error
            return view('errores.estudiantes.mailduplicado', compact('email'));
        }


    Estudiante::create([

    'dni' => $request->input('dni'),
    'apellido' => $request->input('apellido'),
    'nombre' => $request->input('nombre'),
    'nacimiento' => $request->input('nacimiento'),
    'celular' => $request->input('celular'),
    'mail' => $request->input('mail'),
    'direccion' => $request->input('direccion'),
    'localidad' => $request->input('localidad'),
    'tipo' => $request->input('tipo'),
    'carrera' => $request->input('carrera'),

    ]);


    DB::table('users')->insert([
    'dni' => $request->input('dni'),
    'tipo' => "estudiante",
    'name' => $request->input('apellido')." ".$request->input('nombre'),
    'email' => $request->input('mail'),
    'password' => bcrypt($request->input('celular')),

    ]);





    $salud1 = $request->input('salud1');
    $salud2 = $request->input('salud2');
    $salud3 = $request->input('salud3');
    $salud4 = $request->input('salud4');
    $salud5 = $request->input('salud5');
    $salud6 = $request->input('salud6');
    $salud7 = $request->input('salud7');
    $salud8 = $request->input('salud8');
    $salud9 = $request->input('salud9');
    $salud10 = $request->input('salud10');
    $salud11 = $request->input('salud11');
    $salud12 = $request->input('salud12');
    $salud13 = $request->input('salud13');
    $salud14 = $request->input('salud14');
    $salud15 = $request->input('salud15');
    $salud16 = $request->input('salud16');
    $salud17 = $request->input('salud17');
    $salud18 = $request->input('salud18');
    $salud19 = $request->input('salud19');
    $salud20 = $request->input('salud20');
    $salud21 = $request->input('salud21');
    $salud22 = $request->input('salud22');
    $salud23 = $request->input('salud23');
    $salud24 = $request->input('salud24');
    $salud25 = $request->input('salud25');
    $salud26 = $request->input('salud26');
    $salud27 = $request->input('salud27');
    $salud28 = $request->input('salud28');

    $dni = $request->input('dni');

    $data = [
    $salud1, $salud2, $salud3, $salud4, $salud5, $salud6, $salud7, $salud8, $salud9, $salud10, 
    $salud11, $salud12, $salud13, $salud14, $salud15, $salud16, $salud17, $salud18, $salud19, 
    $salud20, $salud21, $salud22, $salud23, $salud24, $salud25, $salud26, $salud27, $salud28
    ];

    // Crear el archivo CSV
    $nombreArchivo = $dni . '.csv';
    $rutaArchivo = storage_path('app/formularios/datos-de-salud/' . $nombreArchivo);

    $csv = Writer::createFromPath($rutaArchivo, 'w+');

    // Insertar todos los datos en una sola fila
    $csv->insertOne($data);

    return view('correctos.dnirecibido', compact('dni'));

}



public function retiroMenores(Request $request) {

    $retiro1 = $request->input('retiro1');
    $retiro2 = $request->input('retiro2');
    $retiro3 = $request->input('retiro3');
    $retiro4 = $request->input('retiro4');
    $retiro5 = $request->input('retiro5');
    $retiro6 = $request->input('retiro6');
    $retiro7 = $request->input('retiro7');
    $retiro8 = $request->input('retiro8');
    $retiro9 = $request->input('retiro9');
    $retiro10 = $request->input('retiro10');
    $retiro11 = $request->input('retiro11');
    $retiro12 = $request->input('retiro12');
    $retiro13 = $request->input('retiro13');
    $retiro14 = $request->input('retiro14');
    $retiro15 = $request->input('retiro15');
    $retiro16 = $request->input('retiro16');
    $retiro17 = $request->input('retiro17');
    $retiro18 = $request->input('retiro18');
    $retiro19 = $request->input('retiro19');

    $dni = auth()->user()->dni;

    $data = [
    $retiro1, $retiro2, $retiro3, $retiro4, $retiro5, $retiro6, $retiro7, $retiro8, $retiro9, $retiro10, 
    $retiro11, $retiro12, $retiro13, $retiro14, $retiro15, $retiro16, $retiro17, $retiro18, $retiro19,
    ];

    // Crear el archivo CSV
    $nombreArchivo = $dni . '.csv';
    $rutaArchivo = storage_path('app/formularios/retiro-de-menores/' . $nombreArchivo);

    $csv = Writer::createFromPath($rutaArchivo, 'w+');

    // Insertar todos los datos en una sola fila
    $csv->insertOne($data);

    return redirect()->route('index.estudiantes')->with('datosRetiroCompletos', 'ok');

}




public function datosSalud(Request $request) {

    $salud1 = $request->input('salud1');
    $salud2 = $request->input('salud2');
    $salud3 = $request->input('salud3');
    $salud4 = $request->input('salud4');
    $salud5 = $request->input('salud5');
    $salud6 = $request->input('salud6');
    $salud7 = $request->input('salud7');
    $salud8 = $request->input('salud8');
    $salud9 = $request->input('salud9');
    $salud10 = $request->input('salud10');
    $salud11 = $request->input('salud11');
    $salud12 = $request->input('salud12');
    $salud13 = $request->input('salud13');
    $salud14 = $request->input('salud14');
    $salud15 = $request->input('salud15');
    $salud16 = $request->input('salud16');
    $salud17 = $request->input('salud17');
    $salud18 = $request->input('salud18');
    $salud19 = $request->input('salud19');
    $salud20 = $request->input('salud20');
    $salud21 = $request->input('salud21');
    $salud22 = $request->input('salud22');
    $salud23 = $request->input('salud23');
    $salud24 = $request->input('salud24');
    $salud25 = $request->input('salud25');
    $salud26 = $request->input('salud26');
    $salud27 = $request->input('salud27');
    $salud28 = $request->input('salud28');

    $dni = auth()->user()->dni;

    $data = [
    $salud1, $salud2,    $salud3,    $salud4,    $salud5,    $salud6,    $salud7,    $salud8,    $salud9,    
    $salud10,    $salud11,    $salud12,    $salud13,    $salud14,    $salud15,    $salud16,    $salud17,
    $salud18,    $salud19,    $salud20,    $salud21,    $salud22,    $salud23,    $salud24,    $salud25,
    $salud26,    $salud27,    $salud28    ];

    // Crear el archivo CSV
    $nombreArchivo = $dni . '.csv';
    $rutaArchivo = storage_path('app/formularios/datos-de-salud/' . $nombreArchivo);

    $csv = Writer::createFromPath($rutaArchivo, 'w+');

    // Insertar todos los datos en una sola fila
    $csv->insertOne($data);

    return redirect()->route('index.estudiantes')->with('datosSaludCompletos', 'ok');

}


    public function nuevafechaexamen1()
    {
        $catedras = Catedra::select('catedras.id', 'catedras.id_materia', 'catedras.dni_profesor', 'catedras.aula', 'catedras.dia1',
            'catedras.hora_comienzo_dia1', 'catedras.hora_finalizacion_dia1', 'catedras.dia2', 'catedras.hora_comienzo_dia2', 'catedras.hora_finalizacion_dia2', 'materias.nombre_materia AS nombremateria', 'profesores.apellido as apellidoprofesor' , 
            'profesores.nombre as nombreprofesor')
        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
        ->get();
        
        return view('adm2023divox.formularios.nuevafechaexamen1', compact('catedras'));
    }




    public function nuevafechaexamen2($id)
    {

        $catedra = Catedra::find($id);

        $idMateria = $catedra->id_materia;

        // Obtener la materia según el ID
        $materia = Materia::find($idMateria);


        $dniProfesor = $catedra->dni_profesor;

        
        $profesoracargo = Profesore::where('dni', $dniProfesor)->first();


        $profesores = Profesore::select('dni', 'apellido', 'nombre')
        ->orderBy('apellido', 'asc')
        ->get();


        
        return view('adm2023divox.formularios.nuevafechaexamen2', compact('catedra' , 'materia' ,'profesoracargo',  'profesores'));
    }


        public function nuevafechaexamen3(Request $request)
        {
            // Obtener los datos enviados desde el formulario
            $idcatedra = $request->input('catedra');
            $aula = $request->input('aula');
            $presidente = $request->input('presidente');
            $vocal1 = $request->input('vocal1');
            $vocal2 = $request->input('vocal2');
            $fecha = $request->input('fecha');
            $hora_comienzo = $request->input('hora_comienzo');
            $hora_finalizacion = $request->input('hora_finalizacion');

            // Crear un nuevo registro de FechaExamen con los datos proporcionados
            $nuevaFechaExamen = new ExamenesFecha();
            $nuevaFechaExamen->id_catedra = $idcatedra;
            $nuevaFechaExamen->aula = $aula;
            $nuevaFechaExamen->presidente = $presidente;
            $nuevaFechaExamen->vocal1 = $vocal1;
            $nuevaFechaExamen->vocal2 = $vocal2;
            $nuevaFechaExamen->fecha = $fecha;
            $nuevaFechaExamen->hora_comienzo = $hora_comienzo;
            $nuevaFechaExamen->hora_finalizacion = $hora_finalizacion;

            // Asigna otros campos según la estructura de tu base de datos...

            $nuevaFechaExamen->save(); // Guardar el nuevo registro en la base de datos

            // Redireccionar a una nueva vista o hacer cualquier otra acción necesaria después de guardar
           return redirect()->route('examenes-fechas.index')
            ->with('crear', 'ok');
        }



        public function editarfechaexamen1()
        {
            
            $fechas = ExamenesFecha::select(
                'examenes_fechas.*',
                'catedras.id as idcatedra',
                'catedras.id_materia as idmateria',
                'catedras.dni_profesor as dniprofesorcatedra',
                'catedras.aula as catedraaula',
                'catedras.dia1 as catedradia1',
                'catedras.hora_comienzo_dia1 as cathoracomdia1',
                'catedras.hora_finalizacion_dia1 as horafindia1',
                'catedras.dia2 as catedradia2',
                'catedras.hora_comienzo_dia2 as cathoracomdia2',
                'catedras.hora_finalizacion_dia2 as cathorafindia2',
                'materias.nombre_materia AS nombremateria',
                'profesores.apellido as apellidoprofesor',
                'profesores.nombre as nombreprofesor'
            )
            ->join('catedras', 'examenes_fechas.id_catedra', '=', 'catedras.id')
            ->join('materias', 'catedras.id_materia', '=', 'materias.id')
            ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
            ->orderBy('fecha')
            ->get();
                    
            return view('adm2023divox.formularios.editarfechaexamen1', compact('fechas'));
        }



        public function editarfechaexamen2($id)
    {
        $fecha = ExamenesFecha::find($id);

        $idCatedra = $fecha->id_catedra;

        $catedra = Catedra::find($idCatedra);

        $idMateria = $catedra->id_materia;

        // Obtener la materia según el ID
        $materia = Materia::find($idMateria);


        $dniProfesor = $catedra->dni_profesor;

        
        $profesoracargo = Profesore::where('dni', $dniProfesor)->first();


        $profesores = Profesore::select('dni', 'apellido', 'nombre')
        ->get();

        
        return view('adm2023divox.formularios.editarfechaexamen2', compact('fecha' , 'catedra' , 'materia' ,'profesoracargo',  'profesores'));
    }


        public function editarfechaexamen3(Request $request, $id)
        {
            // Obtén el ID de la fecha de examen que deseas editar
            $idFechaExamen = $id;

            // Obtén la instancia del registro existente desde la base de datos
            $fechaExamen = ExamenesFecha::find($idFechaExamen);

            if (!$fechaExamen) {
                // Manejar el caso en el que no se encuentre la fecha de examen
                return redirect()->route('examenes-fechas.index')
                    ->with('error', 'La fecha de examen no fue encontrada.');
            }

            // Obtener los datos enviados desde el formulario
            $presidente = $request->input('presidente');
            $vocal1 = $request->input('vocal1');
            $vocal2 = $request->input('vocal2');
            $aula = $request->input('aula');
            $fecha = $request->input('fecha');
            $hora_comienzo = $request->input('hora_comienzo');
            $hora_finalizacion = $request->input('hora_finalizacion');

            // Actualiza los campos del registro existente con los nuevos datos
            $fechaExamen->presidente = $presidente;
            $fechaExamen->vocal1 = $vocal1;
            $fechaExamen->vocal2 = $vocal2;
            $fechaExamen->aula = $aula;
            $fechaExamen->fecha = $fecha;
            $fechaExamen->hora_comienzo = $hora_comienzo;
            $fechaExamen->hora_finalizacion = $hora_finalizacion;

            // Asigna y actualiza otros campos según la estructura de tu base de datos...

            $fechaExamen->save(); // Guardar los cambios en la base de datos

            // Redireccionar a una nueva vista o hacer cualquier otra acción necesaria después de guardar
            return redirect()->route('examenes-fechas.index')
                ->with('editar', 'ok');
        }





public function calificacionesEstudiante() {

    $estudiantes = Estudiante::all(['dni', 'apellido', 'nombre']);    

    return view('adm2023divox.calificaciones-seccion.a-un-estudiante.index', compact('estudiantes')); 

}       




public function calificacionesEstudiante2($dni) {

    $estudiante = Estudiante::where('dni', $dni)->first();

    $materias = Materia::orderBy('nombre_materia')->pluck('nombre_materia', 'id')->toArray();


    return view('adm2023divox.calificaciones-seccion.a-un-estudiante.agregar', compact('estudiante', 'materias')); 

}  


public function calificacionesEstudiante3(Request $request)
{   
    $dni = $request->input('dni');
    $id_materia = $request->input('id_materia');
    $nota_cuatri1 = $request->input('nota_cuatri1');
    $fecha_cuatri1 = now();
    $nota_cuatri2 = $request->input('nota_cuatri2');
    $fecha_cuatri2 = now();
    $nota_final = $request->input('nota_final');
    $estado = $request->input('estado');    
    $fecha_final = now();
    $modalidad = $request->input('modalidad');
    $tomo = $request->input('tomo');
    $pagina = $request->input('pagina');



    //corroborar que la materia no esté previamente aprobada
    $calificacion = DB::table('calificaciones')
    ->where('dni', $dni)
    ->where('id_materia', $id_materia)
    ->where('estado', 'APROBADO')
    ->first();


    if ($calificacion) {
        // Ya tiene aprobada la materia
        return view('errores.adm.calificacionExistente');

    } else {

        // Utiliza el constructor de consultas para insertar el registro
        DB::table('calificaciones')->insert([
            'dni' => $dni,
            'id_materia' => $id_materia,
            'nota_cuatri1' => $nota_cuatri1,
            'fecha_cuatri1' => $fecha_cuatri1,
            'nota_cuatri2' => $nota_cuatri2,
            'fecha_cuatri2' => $fecha_cuatri2,
            'nota_final' => $nota_final,
            'estado' => $estado,
            'fecha_final' => $fecha_final,
            'modalidad' => $modalidad,
            'tomo' => $tomo,
            'pagina' => $pagina,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }    

    return redirect()->route('calificacionesEstudiante')->with('crear', 'ok');
}






public function calificacionesEstudianteEditar($id) {

    $calificacion = DB::table('calificaciones')
                    ->where('id', '=', $id)
                    ->first();

    $dni = $calificacion->dni;
    
    $estudiante = Estudiante::where('dni', $dni)->first();            

    $materias = Materia::orderBy('nombre_materia')->pluck('nombre_materia', 'id')->toArray();


    return view('adm2023divox.calificaciones-seccion.a-un-estudiante.editar.index', compact('calificacion', 'estudiante', 'materias')); 

}  








//eliminar esta funcion
public function editarPromo() {

    $materias = Materia::orderBy('nombre_materia')->pluck('nombre_materia', 'id')->toArray();

    return view('adm2023divox.formulario', compact('materias')); 

} 



//eliminar esta funcion
public function editarPromo1(Request $request) {

    $id_materia = $request->input('id_materia');

    $calificaciones = DB::table('calificaciones')
        ->join('estudiantes', 'calificaciones.dni', '=', 'estudiantes.dni') // Ajusta según tu estructura de base de datos
        ->join('materias', 'calificaciones.id_materia', '=', 'materias.id')
        ->select('calificaciones.*', 'estudiantes.apellido', 'estudiantes.nombre', 'materias.nombre_materia')
        ->where('calificaciones.id_materia', $id_materia)
        ->where('calificaciones.fecha_final', '>', '2023-10-01')
        ->get();


    return view('adm2023divox.formulario2', compact('calificaciones')); 

} 



//eliminar esta funcion
public function editarPromo2(Request $request)
{
    // Obtener las calificaciones del formulario
    $calificaciones = $request->input('calificaciones');

        // Recorrer las calificaciones y actualizar en la base de datos
        foreach ($calificaciones as $id => $calificacion) {
            // Aquí puedes realizar la lógica para actualizar cada conjunto de calificaciones en la base de datos
            // Puedes acceder a los datos con $calificacion['dni'], $calificacion['nota_cuatri1'], etc.

            // Ejemplo (esto debe adaptarse a la estructura de tu base de datos):
            DB::table('calificaciones')
                ->where('id', $calificacion['id'])
                ->update([
                    'nota_cuatri1' => $calificacion['nota_cuatri1'],
                    'fecha_cuatri1' => $calificacion['fecha_cuatri1'],
                    'nota_cuatri2' => $calificacion['nota_cuatri2'],
                    'fecha_cuatri2' => $calificacion['fecha_cuatri2'],
                    'nota_final' => $calificacion['nota_final'],
                    'fecha_final' => $calificacion['fecha_final'],
                    'estado' => $calificacion['estado'],
                    'modalidad' => $calificacion['modalidad'],
                    'tomo' => $calificacion['tomo'],
                    'pagina' => $calificacion['pagina'],
                    'updated_at' => now(),
                    // ... Agrega los demás campos
                ]);
        }

    // Redirigir a una vista con los resultados (fuera del bucle)
    return view('correctos.adm.calificacionesRecibidas');

} 







public function calificacionesEstudianteEditar1(Request $request)
{   
    $dni = $request->input('dni');
    $id_materia = $request->input('id_materia');
    $nota_cuatri1 = $request->input('nota_cuatri1');
    $fecha_cuatri1 = now();
    $nota_cuatri2 = $request->input('nota_cuatri2');
    $fecha_cuatri2 = now();
    $nota_final = $request->input('nota_final');
    $estado = $request->input('estado'); 
    $fecha_final = now();
    $modalidad = $request->input('modalidad');
    $tomo = $request->input('tomo');
    $pagina = $request->input('pagina');

    $idResult = DB::table('estudiantes')
    ->where('dni', $dni)
    ->select('id')
    ->first();

    $id = $idResult->id;

    // Utiliza el constructor de consultas para actualizar el registro existente
    DB::table('calificaciones')
        ->where('dni', $dni)
        ->where('id_materia', $id_materia)
        ->update([
            'nota_cuatri1' => $nota_cuatri1,
            'fecha_cuatri1' => $fecha_cuatri1,
            'nota_cuatri2' => $nota_cuatri2,
            'fecha_cuatri2' => $fecha_cuatri2,
            'nota_final' => $nota_final,
            'estado' => $estado,
            'fecha_final' => $fecha_final,
            'modalidad' => $modalidad,
            'tomo' => $tomo,
            'pagina' => $pagina,
            'updated_at' => now(),
        ]);
            
        return redirect()->route('listadoCalificaciones', ['id' => $id])->with('editar', 'ok');
        
}







public function calificacionVer($id)
{
    $calificacion = DB::table('calificaciones')
    ->join('estudiantes', 'calificaciones.dni', '=', 'estudiantes.dni')
    ->join('materias', 'calificaciones.id_materia', '=', 'materias.id')
    ->select('calificaciones.*','estudiantes.apellido', 'estudiantes.nombre', 'materias.nombre_materia')
    ->where('calificaciones.id', '=', $id)
    ->first();

    $dni = $calificacion->dni;

    $estudiante = DB::table('estudiantes')
    ->where('dni', '=', $dni)
    ->first();

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



    return view('adm2023divox.estudiante.calificacionver', compact('calificacion','estudiante')); 
}






public function calificacionesGrupo()
{
    $materias = Materia::pluck('nombre_materia', 'id')->toArray();

    return view('adm2023divox.calificaciones-seccion.a-grupo.index', compact('materias')); 


}



// En tu controlador
public function buscarDNI($dni) {
    // Realiza la búsqueda en la base de datos y devuelve el resultado (apellido y nombre)
    $resultado = Estudiante::where('dni', $dni)->first();
    if ($resultado) {
        return $resultado->apellido . ' ' . $resultado->nombre;
    } else {
        return 'No se encontraron resultados para el DNI ' . $dni;
    }
}








public function calificacionesGrupo1(Request $request)
{
    // Obtener campos adicionales del formulario
    $modalidad = $request->input('modalidad');
    $tomo = $request->input('tomo');
    $pagina = $request->input('pagina');
    $fecha = $request->input('fecha_final');
    
    $response = '';  // Variable para almacenar el resultado

    // Iterar sobre los datos del formulario
       foreach ($request->input('dni') as $index => $dni) {
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

    









public function datosSaludDocentes(Request $request) {

    $salud3 = $request->input('salud3');
    $salud4 = $request->input('salud4');
    $salud5 = $request->input('salud5');
    $salud6 = $request->input('salud6');
    $salud7 = $request->input('salud7');
    $salud8 = $request->input('salud8');
    $salud9 = $request->input('salud9');
    $salud10 = $request->input('salud10');
    $salud11 = $request->input('salud11');
    $salud12 = $request->input('salud12');
    $salud13 = $request->input('salud13');
    $salud14 = $request->input('salud14');
    $salud15 = $request->input('salud15');
    $salud16 = $request->input('salud16');
    $salud17 = $request->input('salud17');
    $salud18 = $request->input('salud18');
    $salud19 = $request->input('salud19');
    $salud20 = $request->input('salud20');
    $salud21 = $request->input('salud21');
    $salud22 = $request->input('salud22');
    $salud23 = $request->input('salud23');
    $salud24 = $request->input('salud24');
    $salud25 = $request->input('salud25');
    $salud26 = $request->input('salud26');
    $salud27 = $request->input('salud27');
    $salud28 = $request->input('salud28');

    $dni = auth()->user()->dni;

    $data = [
    $salud3,    $salud4,    $salud5,    $salud6,    $salud7,    $salud8,    $salud9,    
    $salud10,    $salud11,    $salud12,    $salud13,    $salud14,    $salud15,    $salud16,    $salud17,
    $salud18,    $salud19,    $salud20,    $salud21,    $salud22,    $salud23,    $salud24,    $salud25,
    $salud26,    $salud27,    $salud28    ];

    // Crear el archivo CSV
    $nombreArchivo = $dni . '.csv';
    $rutaArchivo = storage_path('app/formularios/datos-de-salud/' . $nombreArchivo);

    $csv = Writer::createFromPath($rutaArchivo, 'w+');

    // Insertar todos los datos en una sola fila
    $csv->insertOne($data);

    return redirect()->route('index.docentes')->with('datosSaludCompletos', 'ok');

}





}
