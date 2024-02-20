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
                <a href="https://localhost/edusistema/public/adm2023divox/">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   


    <div class="container-fluid">

        <h1 class="tituloseccion">CALIFICACIONES</h1>







    <div class="container-fluid" style="margin-top: 2rem;">
    <div class="row justify-content-center align-items-center">

     <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 ">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/calificaciones-a-estudiante" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      person_add_alt
                    </span>
                    <p style="white-space: nowrap;" >A un Estudiante</p>
              </a>
        </div>
     </div>


     <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 ">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/calificaciones-a-grupo" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      group_add
                    </span>
                    <p style="white-space: nowrap;" >A grupo de Estudiantes</p>
              </a>
        </div>
     </div>


    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 ">
        <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/calificaciones-a-acta-volante" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      fact_check
                    </span>
                    <p style="white-space: nowrap;" >A una Acta volante</p>
              </a>
        </div>     
      </div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 ">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.tresdefebrero.gob.ar/notas-2020-2023/" class="btn" target="blank" >
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      calculate
                    </span>
                    <p style="white-space: nowrap;" >Cuatrimestrales 2020-2023</p>
              </a>
              </div>
           </div>


    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 ">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://localhost/edusistema/public/adm2023divox/editarpromo" class="btn" >
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      edit
                    </span>
                    <p style="white-space: nowrap;" >Editar promocionales 2023</p>
              </a>
              </div>
    </div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 "></div>


    <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>

  </div>



    </div>
@endsection
