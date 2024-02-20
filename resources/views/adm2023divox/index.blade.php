@extends('adm2023divox.layouts.app')

@section('content')

<style type="text/css">
  
  body {

    overflow-x: hidden;


  }

</style>

<div class="container-fluid fondo">

    <div class="fondoinicio1 "  ></div>
        
       <p class="bienvenidainicio center ">¡Bienvenido/a, {{ Auth::user()->name }}!</p>



       <div class="container-fluid" style="margin-top: 2rem;">
  <div class="row justify-content-center align-items-center md-4">

    <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2  "> <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/administracion-seccion" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      computer
                    </span>
                    <p>Administración</p>
              </a>
        </div>
     </div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2"> <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/estudiantes" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      local_library
                    </span>
                    <p>Estudiantes</p>
              </a>
        </div>
     </div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
        <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/profesores" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      school
                    </span>
                    <p>Profesores</p>
              </a>
            </div>
        </div>


    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2"><div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/calificaciones-seccion" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      checklist
                    </span>
                    <p>Calificaciones</p>
              </a>
            </div>
        </div>


    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2"><div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/inscripciones-seccion" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      text_snippet
                    </span>
                    <p>Inscripciones</p>
              </a>
            </div>
        </div>


    <div class="col-sm-1 col-md-4 col-lg-2 col-xl-1 col-xxl-l"></div>

  </div>

</div>



</div>




@endsection