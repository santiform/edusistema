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
                <a href="https://localhost/edusistema/public/adm2023divox/administracion-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Fechas de exámenes</span>

                          <a href="https://localhost/edusistema/public/adm2023divox/nueva-fecha-examen" style="margin-left: 0.5rem;">
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

										<th>CATEDRA</th>
										<th>FECHA EXAMEN</th>
										<th>PRESIDENTE</th>
										<th>VOCAL 1</th>
										<th>VOCAL 2</th>

                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($examenesFechas as $examenesFecha)
                                        <tr>
                                        
											<td><b>{{ $examenesFecha->nombre_materia }}</b> - {{ $examenesFecha->apellido_profesor }},
                                                {{ $examenesFecha->nombre_profesor }}<br>


                                                {{ $examenesFecha->dia1 }} de 
                                                {{ $examenesFecha->hora_comienzo_dia1 }} a 
                                                {{ $examenesFecha->hora_finalizacion_dia1 }}

                                                @if($examenesFecha->dia2 != '-')
                                                    y {{ $examenesFecha->dia2 }} de 
                                                    {{ $examenesFecha->hora_comienzo_dia2 }} a 
                                                    {{ $examenesFecha->hora_finalizacion_dia2 }}
                                                @endif


                                            </td>
											<td>
                                                @if($examenesFecha->hora_finalizacion != '-')
                                                {{ \DateTime::createFromFormat('Y-m-d', $examenesFecha->fecha)->format('d/m/Y') }} de {{ $examenesFecha->hora_comienzo }} a {{ $examenesFecha->hora_finalizacion }} 
                                                @else
                                                {{ \DateTime::createFromFormat('Y-m-d', $examenesFecha->fecha)->format('d/m/Y') }} - {{ $examenesFecha->hora_comienzo }}
                                                @endif
                                            </td>
											
											<td>{{ $examenesFecha->profesorPresidente->apellido }}, {{ $examenesFecha->profesorPresidente->nombre }}</td>
											<td>{{ $examenesFecha->profesorVocal1->apellido }}, {{ $examenesFecha->profesorVocal1->nombre }}</td>
											<td>{{ $examenesFecha->profesorVocal2->apellido }}, {{ $examenesFecha->profesorVocal2->nombre }}</td>

                                            <td>
                                                <form class="alerta-eliminar" action="{{ route('examenes-fechas.destroy',$examenesFecha->id) }}" method="POST">
                                                    <a style="text-decoration: none!important" href="{{ route('examenes-fechas.show',$examenesFecha->id) }}"><span class=" material-icons-small">
                                                        visibility
                                                        </span></a> 

                                                    <a style="text-decoration: none!important" href="{{ route('adm2023divox.formularios.editarfechaexamen2',$examenesFecha->id) }}"><span class=" material-icons-small">
                                                        edit
                                                        </span></a> 
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
              title: '¿Eliminar fecha de examen?',
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
          title: 'Fecha de examen eliminada correctamente',
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
          title: 'Fecha de examen agregada correctamente',
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
          title: 'Fecha de examen modificada correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif


      

@endsection