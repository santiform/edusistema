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


?>



               <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/estudiantes/{{ $estudiante->id }}/inscripciones-materias">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Agregar inscripcion a materias de <br> {{ $estudiante->apellido }}, {{ $estudiante->nombre }}</span>


                        </div>



<div class="formularioestudiantes" style="padding-top: -2rem;">

    <form method="POST" action="../inscripciones-materias-agregar/enviar" role="form" enctype="multipart/form-data">
        @csrf

        <div class="divcentrado" style="margin-top: -2.3rem;">
            <div class="formulario" style="padding-top: -2rem;">


                <input type="hidden" name="dni" value="{{ $estudiante->dni }}">

                <select class="inputform" name="catedra" id="catedra">
                    <option value="">Selecciona una Cátedra</option>
                    @foreach ($catedrasDisponibles as $catedra)
                        <option value="{{ $catedra->id }}|{{ $catedra->id_materia }}">{{ $catedra->nombremateria }} | {{ $catedra->apellido }}, {{ $catedra->nombre }} | {{ $catedra->dia1 }} de {{$catedra->hora_comienzo_dia1}} a {{$catedra->hora_finalizacion_dia1}}</option>
                    @endforeach
                </select>

                <button type="submit" class="botonformulario">
                    <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                        done
                    </span>
                    <span>Inscribir</span>
                </button>

            </div>
        </div>
    </form>



<div style="height: 18rem;"></div>



<div class="formularioestudiantes" style="padding-top: -2rem;">


        <div class="divcentrado" style="margin-top: -2.3rem;">
            <div class="formulario" style="padding-top: -2rem;">

Para realizar una inscripción forzada al sistema, salteando el régimen de correlatividades, podés usar la siguiente función:

<div style="height: 2rem;"></div>

<a href="{{ route('inscripciones-materias.add.directo', ['dni' => $estudiante->dni]) }}"  class="botonformulario">
    <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
        build_circle
    </span>
    <span  >Inscripción forzada</span>
</a>   

</div>
</div>
</div>





                        

@endsection              



@section('js')



<!-- Agrega el código JavaScript y jQuery para implementar el filtro de búsqueda -->
<script>
$(document).ready(function(){
  $('#search').on('keyup', function(){
    var query = $(this).val().toLowerCase();
    $('.search-table tbody tr').filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
    });
  });
});
</script>





@if (session('noCatedra')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
         iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: '¡No seleccionaste ninguna Cátedra!',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif




@if (session('noCorrelativas')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
        iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: '¡El estudiante no posee las correlativas necesarias!',
          showConfirmButton: false,
          timer: 4000
        })

     </script>

     @endif


@if (session('yaInscripto')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: '¡Este estudiante ya está inscripto/a en esta Materia, no puede inscribirse más de una vez!',
          showConfirmButton: false,
          timer: 6000
        })

     </script>

     @endif     


      

@endsection