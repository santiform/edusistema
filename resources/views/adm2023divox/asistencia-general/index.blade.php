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

    body {
    overflow-x: hidden;
}


</style>




<?php  

use Carbon\Carbon;


?>



               <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Asistencia de Estudiantes GENERAL</span>

                          
                        </div>

                        <div class="center divinputfuncion" >
                  <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
                        </div>


<div class="container-fluid" style="max-width: 94vw;">
    <div class="table-responsive">
        <table id="miTabla" class="table table-bordered search-table" >
            <thead class="thead">
                <tr>                                             
                    <th><i class="bi bi-arrow-down-up"></i> ESTUDIANTE</th>
                    <th><i class="bi bi-arrow-down-up"></i> DNI</th>
                    <th><i class="bi bi-arrow-down-up"></i> MATERIA</th>
                    <th><i class="bi bi-arrow-down-up"></i> ESTADO</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asistencias as $asistencia)
                <tr> <!-- Inicia una nueva fila para cada estudiante -->
                    <td >{{ $asistencia->apellido_estudiante }}, {{ $asistencia->nombre_estudiante }}</td>
                    <td>{{ $asistencia->dni }}</td>
                    <td>{{ $asistencia->nombre_materia }} </td>
                    <td>{{ $asistencia->estado }} </td>
                    <td>
                                                <form style="margin-top: 0.1rem" class="alerta-eliminar" action="" method="POST">

                                                    <a style="text-decoration: none!important" href=""><span class=" material-icons-small">
                                                        visibility
                                                        </span></a> 

                                                       

                                                    <a style="text-decoration: none!important" href=""><span class=" material-icons-small">
                                                        edit
                                                        </span></a> 

                                                       

                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type="submit" ><span class=" material-icons-small botoneliminar">
                                                        delete_forever
                                                        </span></a></button>
                                                </form>
                                            </td>
                </tr> <!-- Cierra la fila para cada estudiante -->
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
              title: '¿Eliminar estudiante?',
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
          title: 'Estudiante eliminado correctamente',
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
          title: 'Estudiante agregado correctamente',
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
          title: 'Estudiante modificado correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif



<script type="text/javascript">
$(document).ready( function () {
    $('#miTabla').DataTable({
        "columnDefs": [{
            "targets": 'sortable',
            "orderable": true
        }]
    });
});

</script>


      

@endsection