<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\FormController;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\EstudianteController;

use App\Http\Controllers\ParteEstudianteController;

use App\Http\Controllers\ParteDocenteController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/








Route::get('/', function () {
    return view('auth.login'); 
    });



Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login');


Route::get('/estudiantes/',[ParteEstudianteController::class,
                            'inicio'])->middleware('auth');


Route::get('/home', function () {
    if (auth()->check()) {
        $userType = auth()->user()->tipo;
        if ($userType === 'admin') {
            return view('adm2023divox.index');
        } elseif ($userType === 'estudiante') {
           return redirect()->route('index.estudiantes');
        } elseif ($userType === 'profesor') {
            return redirect()->route('index.docentes');
        }
    }

    // Si el tipo de usuario no coincide con ninguno de los casos anteriores,
    // redirige a una vista por defecto o muestra un mensaje de error
    return view('auth.login'); // Asegúrate de que 'index' sea el nombre correcto de la vista.
}); // Asegúrate de que 'check_user_type' sea el nombre correcto del middleware.




/*formulario para inscribirse a EduSistema 2023*/

                        Route::get('/formulario/', function () {
                            return view('errores.estudiantes.nologin.formulariodesactivado');
                        });

                        Route::get('/formulario21',
                            [FormController::class, 'preinscripciones']);

                        Route::post('/inscripciones/preinscripciones/guardar-datos',
                            [FormController::class, 'guardarPreinscripciones']);



Route::group(['middleware' => ['auth']], function () {

                Route::group(['middleware' => ['check_user_type:admin']], function () {
                    // Rutas para administradores





                //ELIMINAR ESTAS RUTAS Y VISTAS
                Route::get('/adm2023divox/editarpromo', [FormController::class, 'editarPromo'])->name('editarPromo')->middleware('auth');

                Route::post('/adm2023divox/editarpromo1', [FormController::class, 'editarPromo1'])->name('editarPromo1')->middleware('auth');

                Route::put('/adm2023divox/editarpromo2', [FormController::class, 'editarPromo2'])->name('editarPromo2')->middleware('auth');






                /* formulario en varios pasos para crear nueva fecha de examen */
                Route::get('/adm2023divox/nueva-fecha-examen', [FormController::class, 'nuevafechaexamen1'])->middleware('auth');

                Route::get('/adm2023divox/formularios/nuevafechaexamen2', [FormController::class, 'nuevafechaexamen2'])->name('adm2023divox.formularios.nuevafechaexamen2')->middleware('auth');

                Route::get('/adm2023divox/formularios/nuevafechaexamen2/{id}', [FormController::class, 'nuevafechaexamen2'])->name('adm2023divox.formularios.nuevafechaexamen2');

                Route::post('/adm2023divox/formularios/nuevafechaexamen3', [FormController::class, 'nuevafechaexamen3'])->name('adm2023divox.formularios.nuevafechaexamen3')->middleware('auth');


                Route::get('/adm2023divox/formularios/editarfechaexamen', [FormController::class, 'editarfechaexamen1'])->name('adm2023divox.formularios.actualizarfechaexamen')->middleware('auth');


                Route::get('/adm2023divox/formularios/editarfechaexamen/{id}', [FormController::class, 'editarfechaexamen2'])->name('adm2023divox.formularios.editarfechaexamen2')->middleware('auth');


                Route::put('/adm2023divox/formularios/editarfechaexamen/{id}', [FormController::class, 'editarfechaexamen3'])->name('adm2023divox.formularios.editarfechaexamen3')->middleware('auth');




                Route::get('/adm2023divox/', function () {
                    return view('adm2023divox.index');
                })->middleware('auth')->name('index.adm2023divox');


                Route::get('/adm2023divox/error/noestasautorizado', function () {
                    return view('adm2023divox.errores.noestasautorizado');
                })->name('adm2023divox.error.noestasautorizado');



                Route::get('/adm2023divox/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



                Route::resource('adm2023divox/estudiantes',App\Http\Controllers\EstudianteController::class)->middleware('auth');


                Route::get('/adm2023divox/salud/{dni}', 'App\Http\Controllers\EstudianteController@DatosDeSalud');
                
                Route::get('/adm2023divox/retiro-de-menores/{dni}', 'App\Http\Controllers\EstudianteController@DatosRetiroDeMenores');


                Route::get('adm2023divox/estudiantes/{id}/calificaciones', 'App\Http\Controllers\EstudianteController@calificaciones')->name('listadoCalificaciones')->middleware('auth');

                Route::get('adm2023divox/estudiantes/{id}/inscripciones-materias', 'App\Http\Controllers\EstudianteController@inscripcionesMaterias')
                ->name('adm2023divox.estudiante.inscripcionmaterias')
                ->middleware('auth');

                Route::get('adm2023divox/estudiantes/{id}/inscripciones-examenes', 'App\Http\Controllers\EstudianteController@inscripcionesExamenes')
                ->name('adm2023divox.estudiante.inscripcionexamenes')
                ->middleware('auth');



                Route::delete('/inscripciones-materias/{idEstudiante}/{idInscripcion}', [EstudianteController::class, 'inscripcionMateriasEliminar'])->name('inscripciones-materias.destroy')->middleware('auth');

                Route::get('/inscripciones-materias-agregar/{dni}/', [EstudianteController::class, 'inscripcionMateriasAgregar'])->name('inscripciones-materias.add')->middleware('auth');

                Route::post('/inscripciones-materias-agregar/enviar/', [EstudianteController::class, 'inscripcionMateriasAgregarEnviar'])->name('inscripciones-materias.add.enviar')->middleware('auth');



                Route::get('/inscripciones-materias-agregar-directo/{dni}/', [EstudianteController::class, 'inscripcionMateriasAgregarDirecto'])->name('inscripciones-materias.add.directo')->middleware('auth');

                Route::post('/inscripciones-materias-agregar-directo/enviar/', [EstudianteController::class, 'inscripcionMateriasAgregarEnviarDirecto'])->name('inscripciones-materias.add.enviar.directo')->middleware('auth');








                Route::delete('/inscripciones-examenes/{idEstudiante}/{idInscripcion}', [EstudianteController::class, 'inscripcionExamenesEliminar'])->name('inscripciones-examenes.destroy')->middleware('auth');




                Route::get('/inscripciones-examenes-agregar/{dni}/', [EstudianteController::class, 'inscripcionExamenesAgregar'])->name('inscripciones-examenes.add')->middleware('auth');

                Route::post('/inscripciones-examenes-agregar/enviar/', [EstudianteController::class, 'inscripcionExamenesAgregarEnviar'])->name('inscripciones-examenes.add.enviar')->middleware('auth');



                Route::get('/inscripciones-examenes-agregar-directo/{dni}/', [EstudianteController::class, 'inscripcionExamenesAgregarDirecto'])->name('inscripciones-examenes.add.directo')->middleware('auth');

                Route::post('/inscripciones-examenes-agregar-directo/enviar/', [EstudianteController::class, 'inscripcionExamenesAgregarEnviarDirecto'])->name('inscripciones-examenes.add.enviar.directo')->middleware('auth');










                Route::get('/adm2023divox/profesores-seccion', function () {
                    return view('adm2023divox.profesoresindex');
                })->middleware('auth')->name('profesores-seccion');                         


                Route::resource('adm2023divox/profesores',App\Http\Controllers\ProfesoreController::class)->middleware('auth');







                Route::resource('adm2023divox/catedras',App\Http\Controllers\CatedraController::class)->middleware('auth');







                Route::resource('adm2023divox/examenes-fechas',App\Http\Controllers\ExamenesFechaController::class)->middleware('auth');






                Route::resource('adm2023divox/carreras',App\Http\Controllers\CarreraController::class)->middleware('auth');



                Route::resource('adm2023divox/materias',App\Http\Controllers\MateriaController::class)->middleware('auth');
                





                 Route::get('adm2023divox/materias-por-carreras', [App\Http\Controllers\MateriasXCarreraController::class, 'index'])
                        ->name('materias-x-carreras.index')
                        ->middleware('auth');

                 Route::get('adm2023divox/materias-por-carrera/create', [App\Http\Controllers\MateriasXCarreraController::class, 'create'])
                        ->name('materias-x-carreras.create')
                        ->middleware('auth'); 

                 Route::post('adm2023divox/materias-por-carrera/store', [App\Http\Controllers\MateriasXCarreraController::class, 'store'])
                        ->name('materias-x-carreras.store')
                        ->middleware('auth');       

                 Route::get('adm2023divox/materias-por-carrera/show/{id}', [App\Http\Controllers\MateriasXCarreraController::class, 'show'])
                        ->name('materias-x-carreras.show')
                        ->middleware('auth'); 

                 Route::get('adm2023divox/materias-por-carrera/edit/{id}', [App\Http\Controllers\MateriasXCarreraController::class, 'edit'])
                        ->name('materias-x-carreras.edit')
                        ->middleware('auth');   

                 Route::patch('adm2023divox/materias-por-carrera/update/{id}', [App\Http\Controllers\MateriasXCarreraController::class, 'update'])
                        ->name('materias-x-carreras.update')
                        ->middleware('auth');                     
                        
                 Route::delete('adm2023divox/materias-por-carrera/destroy/{id}', [App\Http\Controllers\MateriasXCarreraController::class, 'destroy'])
                        ->name('materias-x-carreras.destroy')
                        ->middleware('auth');           




                Route::get('/adm2023divox/administracion-seccion', function () {
                    return view('adm2023divox.administracion-seccion.index');
                })->middleware('auth');


                Route::get('/adm2023divox/administracion/documentos-institucionales', function () {
                    return view('adm2023divox.administracion-seccion.doc-institucionales');
                })->middleware('auth');

                Route::get('/adm2023divox/administracion/emails', function () {
                    return view('adm2023divox.administracion-seccion.emails');
                })->middleware('auth');

                Route::get('/adm2023divox/administracion/redes-sociales', function () {
                    return view('adm2023divox.administracion-seccion.redes');
                })->middleware('auth');








                Route::get('/adm2023divox/inscripciones-seccion', function () {
                    return view('adm2023divox.inscripciones-seccion.index');
                })->middleware('auth');


                Route::get('/adm2023divox/inscripciones-seccion/links-para-compartir', function () {
                    return view('adm2023divox.inscripciones-seccion.links-compartir');
                })->middleware('auth');


                Route::get('/adm2023divox/inscripciones-seccion/estadisticas', function () {
                    return view('adm2023divox.inscripciones-seccion.estadisticas');
                })->middleware('auth');

                Route::get('adm2023divox/inscripciones-seccion/estadisticas-generales', [App\Http\Controllers\InscripcionesController::class, 'conteoInscripcionesCarreras'])
                        ->name('conteoInscripcionesCarreras')
                        ->middleware('auth');

                Route::get('adm2023divox/inscripciones-seccion/estadisticas-examenes', [App\Http\Controllers\InscripcionesController::class, 'conteoInscripcionesExamenes'])
                        ->name('conteoInscripcionesCarreras')
                        ->middleware('auth');
        

                Route::delete('/adm2023divox/eliminar-inscripcion-examen/{id}', [App\Http\Controllers\InscripcionesController::class, 'admEliminarInscripcionExamen'])->name('admEliminarInscripcionExamen');   


                Route::get('adm2023divox/inscripciones-seccion/actas-volante', [App\Http\Controllers\InscripcionesController::class, 'actasVolante'])
                        ->name('actasVolante')
                        ->middleware('auth'); 

                Route::get('adm2023divox/acta-volante-ver/{id}', [App\Http\Controllers\InscripcionesController::class, 'actasVolanteVer'])
                        ->name('actaVolanteVer')
                        ->middleware('auth');    

                Route::get('adm2023divox/acta-volante-descargar/{id}', [App\Http\Controllers\InscripcionesController::class, 'actasVolanteDescargar'])
                        ->name('actaVolanteDescargar')
                        ->middleware('auth');                  


                Route::get('/buscar-dni/{dni}', [App\Http\Controllers\FormController::class, 'buscarDNI'])
                        ->middleware('auth');              



                Route::get('/adm2023divox/calificaciones-seccion', function () {
                    return view('adm2023divox.calificaciones-seccion.index');
                })->middleware('auth');


                Route::get('adm2023divox/calificaciones-a-estudiante', [App\Http\Controllers\FormController::class, 'calificacionesEstudiante'])
                        ->name('calificacionesEstudiante')
                        ->middleware('auth'); 

                Route::get('adm2023divox/calificaciones-a-estudiante/{dni}', [App\Http\Controllers\FormController::class, 'calificacionesEstudiante2'])
                        ->name('calificacionesEstudiante2')
                        ->middleware('auth'); 

                Route::post('adm2023divox/calificaciones-a-estudiante/guardar', [App\Http\Controllers\FormController::class, 'calificacionesEstudiante3'])
                        ->name('calificacionesEstudiante3')
                        ->middleware('auth');

                  

                Route::get('adm2023divox/calificaciones-a-estudiante-editar/{id}', [App\Http\Controllers\FormController::class, 'calificacionesEstudianteEditar'])
                        ->name('calificacionesEstudianteEditar')
                        ->middleware('auth');                


                Route::put('adm2023divox/calificaciones-a-estudiante-editar/guardar', [App\Http\Controllers\FormController::class, 'calificacionesEstudianteEditar1'])
                        ->name('calificacionesEstudianteEditar1')
                        ->middleware('auth');  

                Route::get('adm2023divox/calificaciones-a-grupo', [App\Http\Controllers\FormController::class, 'calificacionesGrupo'])
                        ->name('calificacionesGrupo')
                        ->middleware('auth');
                        

                Route::post('adm2023divox/calificaciones-a-grupo/guardar', [App\Http\Controllers\FormController::class, 'calificacionesGrupo1'])
                        ->name('calificacionesGrupo1')
                        ->middleware('auth');





                Route::get('adm2023divox/calificaciones-a-acta-volante', [App\Http\Controllers\InscripcionesController::class, 'calificacionesActasVolante'])
                        ->name('calificacionesActasVolante')
                        ->middleware('auth');         

                        
                Route::get('adm2023divox/calificaciones-a-acta-volante/{id}', [App\Http\Controllers\InscripcionesController::class, 'calificacionesActasVolante1'])
                        ->name('calificacionesActasVolante1')
                        ->middleware('auth');              


                Route::post('adm2023divox/calificaciones-a-acta-volante/guardar', [App\Http\Controllers\InscripcionesController::class, 'calificacionesActasVolante2'])
                        ->name('calificacionesActasVolante2')
                        ->middleware('auth');  






                Route::get('adm2023divox/estudiantes/calificaciones/{id}', 'App\Http\Controllers\FormController@calificacionVer')->middleware('auth')->name('calificacionVer1');
                
                Route::get('/adm2023divox/estudiantes/calificaciones/ver', function () {
                    return view('adm2023divox.estudiantes.calificacionver');
                })->middleware('auth')->name('calificacionVer2'); 


                Route::delete('adm2023divox/estudiantes/calificaciones/{id}/eliminar', 'App\Http\Controllers\FormController@calificacionEliminar')->middleware('auth')->name('calificacionEliminar');






                Route::get('adm2023divox/asistencia-general', [App\Http\Controllers\AsistenciaController::class, 'index'])
                        ->name('asistenciaAdmGeneral')
                        ->middleware('auth');  


                Route::get('adm2023divox/asistencia/{id}/edit', [App\Http\Controllers\AsistenciaController::class, 'edit'])
                        ->name('asistencia.edit')
                        ->middleware('auth');   

                Route::put('adm2023divox/asistencia/{id}/update', [App\Http\Controllers\AsistenciaController::class, 'update'])
                        ->name('asistencia.update')
                        ->middleware('auth');   

                Route::delete('adm2023divox/asistencia/{id}/delete', [App\Http\Controllers\AsistenciaController::class, 'destroy'])
                        ->name('asistencia.destroy')
                        ->middleware('auth');              



                });




                /*----------------------------------------*/




                Route::group(['middleware' => ['check_user_type:estudiante']], function () {


                       

                        Route::get('/estudiantes', [ParteEstudianteController::class, 'inicio'])
                        ->name('index.estudiantes')
                        ->middleware('auth');

                        Route::get('/estudiantes/mi-perfil',
                            [ParteEstudianteController::class, 'miPerfil'])
                        ->name('miperfil');

                        Route::post('/estudiantes/mi-perfil/editar',
                            [ParteEstudianteController::class, 'miPerfilEditar']);




                        Route::get('/estudiantes/inscripciones/reinscripciones/retiro-de-menores', function () {
                            return view('estudiantes.inscripciones.reinscripciones.retirodemenores');
                        })->middleware('auth');


                        Route::post('/estudiantes/inscripciones/reinscripciones/retiro-de-menores/guardar-datos',
                            [FormController::class, 'retiroMenores']);



                        Route::get('/estudiantes/inscripciones/reinscripciones/datos-de-salud', function () {
                            return view('estudiantes.inscripciones.reinscripciones.datosdesalud');
                        })->middleware('auth');


                        Route::post('/estudiantes/inscripciones/reinscripciones/datos-de-salud/guardar-datos',
                            [FormController::class, 'datosSalud']);


                        Route::get('/estudiantes/inscripciones', function () {
                            return view('estudiantes.inscripciones.index');
                        })->middleware('auth');

                        Route::get('/estudiantes/inscripciones/materias', function () {
                            return view('estudiantes.inscripciones.materias.index');
                        })->middleware('auth');

                       
                        Route::get('/estudiantes/inscripciones/materias/mis-inscripciones',
                            [ParteEstudianteController::class, 'misInscripcionesMaterias'])
                        ->middleware('auth')->name('misInscripcionesMaterias');
                        

                        Route::get('/estudiantes/inscripciones/examenes', function () {
                            return view('estudiantes.inscripciones.examenes.index');
                        })->middleware('auth');

                        Route::get('/estudiantes/inscripciones/examenes/mis-inscripciones',
                            [ParteEstudianteController::class, 'misInscripcionesExamenes'])
                        ->middleware('auth')->name('misInscripcionesExamenes');
                    


                        /*formulario para inscripcion a materias*/
                        Route::get('/estudiantes/inscripciones/materias/formulario',
                            [ParteEstudianteController::class, 'inscripcionMaterias'])->middleware('auth')
                        ->name('materiasForm');

                        /*Route::get('/estudiantes/inscripciones/materias/formulario', function () {
                            return view('errores.estudiantes.formulariodesactivado');
                        })->middleware('auth');*/

                        Route::post('/estudiantes/inscripciones/materias/formulario/guardar',
                            [ParteEstudianteController::class, 'inscripcionMaterias2'])->middleware('auth');


                        /*formulario para inscripcion a examenes*/
                        Route::get('/estudiantes/inscripciones/examenes/formulario',
                            [ParteEstudianteController::class, 'inscripcionExamenes'])->middleware('auth')
                        ->name('examenesForm');

                        /*Route::get('/estudiantes/inscripciones/examenes/formulario', function () {
                            return view('errores.estudiantes.formulariodesactivado');
                        })->middleware('auth');*/

                        Route::post('/estudiantes/inscripciones/examenes/formulario/guardar',
                            [ParteEstudianteController::class, 'inscripcionExamenes2'])->middleware('auth');


        
                        /*formulario para probar enviar datos a un csv*/
                        Route::get('/estudiantes/inscripciones/reinscripciones/retiro-de-menores', function () {
                            return view('estudiantes.inscripciones.reinscripciones.retirodemenores');
                        })->middleware('auth');

                        Route::post('/estudiantes/inscripciones/reinscripciones/guardar-datos',
                            [FormController::class, 'guardarReinscripciones'])->middleware('auth');


                        Route::delete('/eliminar-inscripcion-materia/{id}',
                            [ParteEstudianteController::class, 'eliminarInscripcionMateria'])->name('eliminar_inscripcion_materia');

                        Route::delete('/eliminar-inscripcion-examen/{id}',
                            [ParteEstudianteController::class, 'eliminarInscripcionExamen'])->name('eliminar_inscripcion_examen');










                        Route::get('/estudiantes/historial-academico', function () {
                            return view('estudiantes.historialacademico.index');
                        })->middleware('auth');


                        Route::get('/estudiantes/historial-academico/mis-calificaciones',
                            [ParteEstudianteController::class, 'misCalificaciones'])->middleware('auth');

                        Route::get('/estudiantes/historial-academico/avance-en-la-carrera',
                            [ParteEstudianteController::class, 'avanceEnLaCarrera'])->middleware('auth');











                        Route::get('/estudiantes/informacion-academica', function () {
                            return view('estudiantes.informacionacademica.index');
                        })->middleware('auth');

                        Route::get('/estudiantes/informacion-academica/plan-de-estudio',
                            [ParteEstudianteController::class, 'planDeEstudio'])->middleware('auth');


                        Route::get('/estudiantes/informacion-academica/certificado-estudiante-regular',
                            [ParteEstudianteController::class, 'certificadoEstudianteRegular'])->middleware('auth');










                });











                /*----------------------------------------*/




                Route::group(['middleware' => ['check_user_type:profesor']], function () {


                        
                            

                         Route::get('/docentes', [ParteDocenteController::class, 'inicio'])
                        ->name('index.docentes')
                        ->middleware('auth');


                        Route::get('/docentes/mi-perfil',
                            [ParteDocenteController::class, 'miPerfil'])
                        ->name('miPerfilDocente');

                        Route::post('/docentes/mi-perfil/editar',
                            [ParteDocenteController::class, 'miPerfilEditar']);




                        Route::get('/docentes/datos-de-salud', function () {
                            return view('docentes.datos-de-salud.index');
                        })->middleware('auth');

                        
                        Route::post('/docentes/datos-de-salud/guardar-datos',
                            [FormController::class, 'datosSaludDocentes']);




                        Route::get('/docentes/mis-catedras',
                            [ParteDocenteController::class, 'misCatedras'])
                        ->name('misCatedras');






                        Route::get('/docentes/asistencia', function () {
                            return view('docentes.asistencia.index');
                        })->name('asistencia')->middleware('auth');

                        Route::get('/docentes/asistencia-cargar',
                            [ParteDocenteController::class, 'asistenciaCargar1'])
                        ->name('asistenciaCargar1');

                        Route::post('/docentes/asistencia-cargar2',
                            [ParteDocenteController::class, 'asistenciaCargar2'])
                        ->name('asistenciaCargar2');

                        Route::post('/docentes/asistencia-cargar-guardar',
                            [ParteDocenteController::class, 'asistenciaCargarGuardar'])
                        ->name('asistenciaCargarGuardar');





                });








      });          










Auth::routes();


