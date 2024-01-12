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
                <a href="https://emmu.edusistema.com.ar/adm2023divox/administracion-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Cátedras</span>
                          <a href="{{ route('catedras.create') }}" style="margin-left: 0.5rem;">
                            <span class=" material-icons2">
                              add_circle_outline
                            </span>
                          </a>

                          
                        </div>

                        <div class="center divinputfuncion"   >
                  <input type="text"  class="inputfuncion" id="search" placeholder="Buscar...">
                        </div>




    <div class="container-fluid" style="max-width: 95vw;" >
                        <div class="table-responsive">
                            <table class="table table-bordered search-table">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        
										<th>MATERIA</th>
										<th>PROFESOR/A</th>
										
										
										<th>DIA Y HORARIO</th>

										<th>CUPOS</th>

                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catedras as $catedra)
                                        <tr>
                                            <td>{{ $catedra->id }}</td>
                                            
											<td>{{ $catedra->materianombre }}</td>
											<td>{{ $catedra->apellidoprofesor }}, {{ $catedra->nombreprofesor }}</td>
											
											
											<td>{{ $catedra->dia1 }} de 
											{{ $catedra->hora_comienzo_dia1 }} a 
											{{ $catedra->hora_finalizacion_dia1 }}

                                            (AULA {{ $catedra->aula }})

                                            @if($catedra->dia2 != '-')
                                                
                                                y 
                                            {{ $catedra->dia2 }} de 
                                            {{ $catedra->hora_comienzo_dia2 }} a 
                                            {{ $catedra->hora_finalizacion_dia2 }}

                                            (AULA {{ $catedra->aula_dia2 }})

                                            @endif

                                            </td>
                                            <td>{{ $catedra->cupos }}</td>

                                            <td>
                                               

                                                    <form style="margin-top: 0.1rem" class="alerta-eliminar" action="{{ route('catedras.destroy',$catedra->id) }}" method="POST">

                                                    <a style="text-decoration: none!important" href="{{ route('catedras.edit',$catedra->id) }}"><span class=" material-icons-small">
                                                        edit
                                                        </span></a> 

                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type="submit" ><span class=" material-icons-small botoneliminar">
                                                        delete_forever
                                                        </span></a></button>
                                                    </form>                                                  

                                                    
                                            </td>
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
              title: '¿Eliminar cátedra?',
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



 @if (session('crear')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Cátedra agregada correctamente',
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
          title: 'Cátedra modificada correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif


      

@endsection