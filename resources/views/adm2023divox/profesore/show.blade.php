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



<?php  

use Carbon\Carbon;

$fechaDB = $profesore->nacimiento;

$fechaVieja = Carbon::createFromFormat('Y-m-d', $fechaDB);

$fecha = $fechaVieja->format('d/m/Y');


$fechaActual = Carbon::now();
$edad = $fechaActual->diffInYears(Carbon::parse($fechaDB));




?>



 <div class="divbotonatras">
                <a href="https://emmu.edusistema.com.ar/adm2023divox/profesores">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Legajo de {{ $profesore->apellido }}</span>

                          <a style="text-decoration: none!important; margin-left: 1rem!important; " href="{{ route('profesores.edit',$profesore->id) }}"><span style="font-size: 45px!important" class=" material-icons-small">
                                                        edit
                                                        </span></a> 
                        </div>




    <div class="legajoestudiante"  >

        <p class="center" ><span class="material-icons iconolenguajeestudiante" style="font-size: 250px; margin-" >
badge
</span></p>

                         <p class="nombrelegajo center" >{{ $profesore->apellido }}, {{ $profesore->nombre }}</p>
                        
                       
                        
                            <div class="textolegajoestudiante">
                        
                        <p>
                            <b>DOCUMENTO:</b>
                            {{ $profesore->dni }}
                        </p>
                        <p>
                            <b>NACIMIENTO:</b>
                            {{ $fecha }}
                        </p>
                        <p>
                            <b>EDAD:</b>
                            {{ $edad }}
                        </p>
                        <p>
                            <b>CELULAR:</b>
                            {{ $profesore->celular }}
                        </p>
                        <p>
                            <b>EMAIL:</b>
                            {{ $profesore->mail }}
                        </p>
                        <p>
                            <b>INGRESO:</b>
                            {{ $profesore->ingreso }}
                        </p>
                        <p>
                            <b>HORAS RELOJ:</b>
                            {{ $profesore->horas }}
                        </p>

</div>
                        

                    </div>




   <div class="funcioneslegajoestudiantes"  >
  <div class="row justify-content-center align-items-center" style="margin-top: 12rem!important;">
    <div class="col-4">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
        <a href="https://emmu.edusistema.com.ar/adm2023divox/administracion-seccion" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            medical_information
          </span>
          <p>Datos de salud</p>
        </a>
      </div>
    </div>

    <div class="col-4">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
        <a href="https://emmu.edusistema.com.ar/adm2023divox/profesores-seccion" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            checklist
          </span>
          <p style="margin-bottom: -1rem" >Cátedras a cargo</p>
        </a>
      </div>
    </div>

    <div class="col-4">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
        <a href="https://emmu.edusistema.com.ar/adm2023divox/profesores" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            text_snippet
          </span>
          <p style="margin-bottom: -3rem" >Certificado de prestación servicios</p>
        </a>
      </div>
    </div>

  </div>
</div>
  
            
 
@endsection

