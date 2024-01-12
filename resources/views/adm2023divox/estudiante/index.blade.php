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
                <a href="https://emmu.edusistema.com.ar/adm2023divox/">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Estudiantes</span>

                          <a href="{{ route('estudiantes.create') }}" style="margin-left: 0.5rem;">
                            <span class=" material-icons2">
                              add_circle_outline
                            </span>
                          </a>
                        </div>

                        <div class="center divinputfuncion" >
                  <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
                        </div>




    <div class="container-fluid" style="max-width: 94vw;" >
                        <div class="table-responsive">
                            <table class="table table-bordered search-table">
                                <thead class="thead">
                                    <tr>                                             
										<th>ESTUDIANTE</th>
										<th>DNI</th>
                                        <th>NACIMIENTO</th>
										<th>CELULAR</th>
										<th>MAIL</th>
										<th>CARRERA</th>

                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                    @foreach ($estudiantes as $estudiante)

                                    @php
                                        $fechaDB = $estudiante->nacimiento;

                                            $fechaVieja = Carbon::createFromFormat('Y-m-d', $fechaDB);

                                            $fecha = $fechaVieja->format('d/m/Y');
                                    @endphp        

                                        <tr>                                          
											
											<td>{{ $estudiante->apellido }}, {{ $estudiante->nombre }}</td>
                                            <td>{{ $estudiante->dni }}</td>
											<td>{{ $fecha }}</td>
											<td>{{ $estudiante->celular }}</td>
											<td>{{ $estudiante->mail }}</td>
											<td>{{ $estudiante->carreranombre }}</td>

                                            <td>
                                                <form style="margin-top: 0.1rem" class="alerta-eliminar" action="{{ route('estudiantes.destroy',$estudiante->id) }}" method="POST">

                                                    <a style="text-decoration: none!important" href="{{ route('estudiantes.show',$estudiante->id) }}"><span class=" material-icons-small">
                                                        visibility
                                                        </span></a> 

                                                       

                                                    <a style="text-decoration: none!important" href="{{ route('estudiantes.edit',$estudiante->id) }}"><span class=" material-icons-small">
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


      

@endsection