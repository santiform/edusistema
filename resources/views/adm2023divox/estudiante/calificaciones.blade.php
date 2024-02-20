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
                <a href="https://localhost/edusistema/public/adm2023divox/estudiantes/{{ $estudiante->id }}">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Calificaciones de {{ $estudiante->apellido }}, {{ $estudiante->nombre }}</span>

                          <a href="https://localhost/edusistema/public/adm2023divox/calificaciones-a-estudiante/{{ $estudiante->dni }}" style="margin-left: 0.5rem;">
                            <span class=" material-icons2">
                              add_circle_outline
                            </span>
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
                    <th>1er CUATRI</th>
                    <th>2do CUATRI</th>
                    <th>FINAL</th>
                    <th>FECHA FINAL</th>
                    <th>ACCION</th>
                    

                                    </tr>
                                </thead>
                                <tbody>

                                    
                                    @foreach ($calificaciones as $calificacion)
                      <tr>                                          
                      <td>{{ $calificacion->nombre_materia }}</td>
                      <td>@if ($calificacion->nota_cuatri1 !== null) {{ $calificacion->nota_cuatri1 }} ({{ $calificacion->nota_cuatri1_letras }}) @endif</td>
                      <td>@if ($calificacion->nota_cuatri2 !== null) {{ $calificacion->nota_cuatri2 }} ({{ $calificacion->nota_cuatri2_letras }}) @endif</td>
                      <td>@if ($calificacion->nota_final !== null) {{ $calificacion->nota_final }} ({{ $calificacion->nota_final_letras }}) @endif</td>
                      <td>@if ($calificacion->nota_final !== null)
                                    @php
                                        $fechaDB = $calificacion->fecha_final;

                                        $fechaVieja = Carbon::createFromFormat('Y-m-d', $fechaDB);

                                        $fecha = $fechaVieja->format('d/m/Y');
                                    @endphp {{ $fecha }} @endif</td>
                          

                                            <td>
                                                <form style="margin-top: 0.1rem" class="alerta-eliminar" action="{{ route('calificacionEliminar', $calificacion->id) }}" method="POST">

                                                    @if ($calificacion && $calificacion->id)
                                                        <a style="text-decoration: none!important" href="{{ route('calificacionVer1', $calificacion->id) }}">
                                                            <span class="material-icons-small">visibility</span>
                                                        </a>
                                                    @endif


                                                       <a style="text-decoration: none!important" href="{{ route('calificacionesEstudianteEditar', $calificacion->id) }}">
                                                            <span class="material-icons-small">edit</span>
                                                        </a>

                                                       

                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type="submit" ><span class=" material-icons-small botoneliminar">
                                                        delete_forever
                                                        </span></a></button>
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
              title: '¿Eliminar Calificación?',
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
          title: 'Calificación eliminada correctamente',
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
          title: 'Calificación agregada correctamente',
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
          title: 'Calificación modificada correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif


      

@endsection