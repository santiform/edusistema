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

















    <div class="row justify-content-center align-items-center">
    <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 "> 
        <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://docs.google.com/spreadsheets/d/1MBEUWC8tvu2eVi6uaW3Ja1cSt0X2ND57/edit#gid=352841891" target="blank" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      inventory_2
                    </span>
                    <p style="white-space: nowrap;">Inventario EMMU</p>
              </a>
        </div>
     </div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://docs.google.com/document/d/1sB4Hr5qQxAOsDzchnwBod4Zf34oX6svM/edit" target="blank" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      cast_for_education
                    </span>
                    <p style="white-space: nowrap;">Disposición de aulas</p>
              </a>
        </div>
    </div> 


    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://docs.google.com/document/d/19JBcmzn927P89HGtNSGQ68sDOQHNcyk5/edit" target="blank" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      calendar_month
                    </span>
                    <p style="white-space: nowrap;">Calendario Académico</p>
              </a>
        </div>
    </div>

  
    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://www.canva.com/design/DAFii7cul3I/35aEX-h5i7tPYahZFL5VUA/edit" target="blank"  class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      real_estate_agent
                    </span>
                    <p style="white-space: nowrap;" >Préstamo de aulas</p>
              </a>
        </div>
    </div>


    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/administracion/documentos-institucionales" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      folder
                    </span>
                    <p style="white-space: nowrap;" >Documentos institucionales</p>
              </a>
        </div>
    </div> 

    </div>


    <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>
    </div>




















    <div class="row justify-content-center align-items-center">
    <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 "> 
        <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/administracion/emails" target="blank" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      contact_mail
                    </span>
                    <p style="white-space: nowrap;">Emails / Cuentas</p>
              </a>
        </div>
     </div>

    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
         <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
              <a href="https://emmu.edusistema.com.ar/adm2023divox/administracion/redes-sociales" target="blank" class="btn">
                    <span class="material-icons d-flex flex-column align-items-center justify-content-center">
                      phone_android
                    </span>
                    <p style="white-space: nowrap;">Redes sociales</p>
              </a>
        </div>
    </div> 


    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
         
    </div>

  
    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
         
    </div>


    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2">     
        
    </div> 

    </div>


    <div class="col-sm-0 col-md-0 col-lg-1 col-xl-1 col-xxl-l"></div>
    </div>











    </div>
@endsection
