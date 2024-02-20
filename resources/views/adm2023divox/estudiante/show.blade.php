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

$fechaDB = $estudiante->nacimiento;

$fechaVieja = Carbon::createFromFormat('Y-m-d', $fechaDB);

$fecha = $fechaVieja->format('d/m/Y');


$fechaActual = Carbon::now();

$edad = $fechaActual->diffInYears(Carbon::parse($fechaDB));








?>



 <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/estudiantes">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Legajo de {{ $estudiante->apellido }}</span>

                          <a style="text-decoration: none!important; margin-left: 1rem!important; " href="{{ route('estudiantes.edit',$estudiante->id) }}"><span style="font-size: 45px!important" class=" material-icons-small">
                                                        edit
                                                        </span></a> 
                        </div>




    <div class="legajoestudiante"  >

        <p class="center" ><span class="material-icons iconolenguajeestudiante" style="font-size: 230px; margin-" >
badge
</span></p>
        
                            <p class="nombrelegajo center" >{{ $estudiante->apellido }}, {{ $estudiante->nombre }}</p>
                        
                       
                        
                            <div class="textolegajoestudiante">
                            <p><b>DOCUMENTO: </b>
                            {{ $estudiante->dni }}</p>
                        
                        
                            
                            <p><b>NACIMIENTO:</b>
                            {{ $fecha }}</p>

                            <p><b>EDAD:</b>
                            {{ $edad }} AÑOS</p>                        
                        
                            
                        
                        
                            <p><b>TIPO:</b>
                            {{ $estudiante->tipo }}</p>
                        
                        
                            <p><b>CARRERA:</b>
                            {{ $nombreCarrera }}</p>

                            <p><b>CELULAR:</b>
                            {{ $estudiante->celular }}</p>
                        
                        
                            <p><b>EMAIL:</b>
                            {{ $estudiante->mail }}</p>

                            <p><b>DIRECCION:</b>
                            {{ $estudiante->direccion }}</p>

                            <p style="margin-bottom: -0.1rem;" ><b>LOCALIDAD:</b>
                            {{ $estudiante->localidad }}</p>

                                </div>
                        

                    </div>



   <div class="funcioneslegajoestudiantes">
  <div class="row justify-content-center align-items-center">
    <div class="col-4">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
        <a href="https://localhost/edusistema/public/adm2023divox/salud/{{$estudiante->dni}}" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            medical_information
          </span>
          <p>Datos de salud</p>
        </a>
      </div>
    </div>

    <div class="col-4">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
        <a href="https://localhost/edusistema/public/adm2023divox/estudiantes/{{ $estudiante->id }}/calificaciones" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            checklist
          </span>
          <p>Calificaciones</p>
        </a>
      </div>
    </div>

    <div class="col-4">
      <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
        <a href="https://localhost/edusistema/public/adm2023divox/estudiantes/{{ $estudiante->id }}/inscripciones-materias" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            text_snippet
          </span>
          <p style="margin-bottom: -1rem" >Inscripción materias</p>
        </a>
      </div>
    </div>

    <div class="col-4" style="margin-top: 4rem;">
      <div class="botonfuncion  d-flex flex-column align-items-center justify-content-center">
        <a href="https://localhost/edusistema/public/adm2023divox/estudiantes/{{ $estudiante->id }}/inscripciones-examenes" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            list_alt
          </span>
          <p style="margin-bottom: -1rem"  >Inscripción exámenes</p>
        </a>
      </div>
    </div>

    <div class="col-4" style="margin-top: 4rem;">
      <div class="botonfuncion  d-flex flex-column align-items-center justify-content-center">
        <a href="https://localhost/edusistema/public/adm2023divox/inscripciones-seccion" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            verified_user
          </span>
          <p style="margin-bottom: -3rem"  >Certificado estudiante regular</p>
        </a>
      </div>
    </div>


    @if ($edad < 18) 
    <div class="col-4" style="margin-top: 4rem;" >
      <div class="botonfuncion r d-flex flex-column align-items-center justify-content-center">
        <a href="https://localhost/edusistema/public/adm2023divox/retiro-de-menores/{{$estudiante->dni}}" class="btn">
          <span class="material-icons d-flex flex-column align-items-center justify-content-center">
            escalator_warning
          </span>
          <p>Retiro</p>
        </a>
      </div>
    </div>

    @else


    <div class="col-4" style="margin-top: 4rem;" >
      
    </div>

    @endif
  </div>
</div>
  
            
 
@endsection
