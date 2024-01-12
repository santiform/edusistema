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
                <a href="https://emmu.edusistema.com.ar/adm2023divox/">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   


    <div class="container-fluid">

        <h1 class="tituloseccion">ADMINISTRACION</h1>







       <div class="container-fluid" style="margin-top: 2rem;">
  <div class="row justify-content-center align-items-center">

    <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 "> 
        <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/carreras" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      format_list_bulleted
                    </span>
                    <p>Carreras</p>
              </a>
        </div>
     </div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/materias" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      format_list_numbered
                    </span>
                    <p>Materias</p>
              </a>
        </div>
    </div> 

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/materias-por-carreras" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      list_alt
                    </span>
                    <p style="white-space: nowrap;" >Materias por Carreras</p>
              </a>
        </div>
    </div> 

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/catedras" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      square_foot
                    </span>
                    <p>Cátedras</p>
              </a>
        </div>
    </div>

  
    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/examenes-fechas" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      event
                    </span>
                    <p style="white-space: nowrap;" >Fechas de exámen</p>
              </a>
        </div>
    </div>
    </div>


    <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>

  </div>



    </div>
@endsection
