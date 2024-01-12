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
                <a href="https://emmu.edusistema.com.ar/adm2023divox/estudiantes/{{ $estudiante->id }}">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Inscripcion a materias de <br> {{ $estudiante->apellido }}, {{ $estudiante->nombre }}</span>

                          <a href="{{ route('inscripciones-materias.add', ['dni' => $estudiante->dni]) }}" style="margin-left: 0.5rem;">
                            <span class="material-icons2">add_circle_outline</span>
                          </a>



                        </div>

                        <div class="center divinputfuncion" >
                  <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
                        </div>




    <div class="container-fluid" style="max-width: 95vw;" >
                        <div class="table-responsive">
                            <table class="table table-bordered search-table">
                                <thead class="thead">
                                    <tr>                                             
                    <th>MATERIA</th>
                    <th>DOCENTE</th>
                    <th>HORARIO</th>
                    <th>ACCION</th>
                    

                                    </tr>
                                </thead>
                                <tbody>

                                    
                                    @foreach ($inscripciones as $inscripcion)
                      <tr>                                          
                      <td>{{ $inscripcion->nombre_materia }}</td>
                      <td>{{ $inscripcion->apellido_profesor }}, {{ $inscripcion->nombre_profesor }}</td>
                      <td>
                        {{ $inscripcion->dia1  }} de {{ $inscripcion->hora_comienzo_dia1  }} a {{ $inscripcion->hora_finalizacion_dia1  }} (AULA {{$inscripcion->aula_dia1}})

                

                        @if($inscripcion->dia2 != '-')
                        <p style="margin-bottom: 0.3rem;" >
                        {{ $inscripcion->dia2 }} de 
                        {{ $inscripcion->hora_comienzo_dia2 }} a 
                        {{ $inscripcion->hora_finalizacion_dia2 }}
                        (AULA {{$inscripcion->aula_dia2}})
                        </p>
                        @endif
                      </td>
                      

                                            <td>
                                                <form style="margin-top: 0.1rem" class="alerta-eliminar" action="{{ route('inscripciones-materias.destroy', ['idEstudiante' => $estudiante->id, 'idInscripcion' => $inscripcion->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <span class="material-icons-small botoneliminar">delete_forever</span>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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




<script type="text/javascript">

        $('.alerta-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: '¿Eliminar registro?',
              text: "¡Esta acción no se puede revertir!",
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#A32226',
              showCancelButton: true,
              confirmButtonColor: '#A5413F',
              cancelButtonColor: '#EE7873',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, eliminar',
              background: '#E45D58',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });


    
    

</script>


@if (session('borrar')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Registro eliminado correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif



           
    @if (session('crear')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Registro agregado correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif



              
    @if (session('editar')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Registro modificado correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif


      

@endsection