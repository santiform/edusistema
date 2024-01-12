@extends('adm2023divox.layouts.app')



@section('content')

<style type="text/css">
    
    button {

        background-color: transparent;
        border: none;
    }

    a {

        text-decoration: none;
    }

</style>



               <div class="divbotonatras">
                <a href="https://emmu.edusistema.com.ar/adm2023divox/estadisticas">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   


    <div class="container-fluid">

        <h1 class="tituloseccion">Estadísticas de Inscripciones</h1>







    <div class="container-fluid" style="margin-top: 2rem;">
    <div class="row justify-content-center align-items-center">

    <div class="col-1"></div>

    <div class="col-2"> 
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/inscripciones-seccion/estadisticas-generales" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      forum
                    </span>
                    <p style="white-space: nowrap;" >Estadísticas Generales</p>
              </a>
        </div>
     </div>

    <div class="col-2">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/inscripciones-seccion/estadisticas-examenes" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      list_alt
                    </span>
                    <p style="white-space: nowrap;" >Estadísticas de Exámenes</p>
              </a>
        </div>      
    </div>

    <div class="col-2">        </div>


    <div class="col-2">        </div>


    <div class="col-2">        </div>


    <div class="col-1">       </div>

  </div>



    </div>
@endsection
