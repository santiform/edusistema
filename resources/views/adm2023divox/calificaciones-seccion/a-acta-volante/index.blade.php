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
                <a href="https://localhost/edusistema/public/adm2023divox/calificaciones-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   
                          
                        <div class="tituloconicono">
                          <span class="titulofuncion">Calificaciones a un Acta volante</span>
                        </div>

                        <div class="center divinputfuncion" >
                  <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
                        </div>




    <div class="container-fluid" style="max-width: 53vw;" >
                        <div class="table-responsive">
                            <table class="table table-bordered search-table">
                                <thead class="thead">
                                    <tr>                                             
										<th>Seleccioná una fecha de examen</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                    @foreach ($examenes as $examen)

                                    @php
                                        $fechaDB = $examen->fecha;

                                            $fechaVieja = Carbon::createFromFormat('Y-m-d', $fechaDB);

                                            $fecha = $fechaVieja->format('d/m/Y');
                                    @endphp        

                                        <tr>                                          
											
											

                                            <td>
                                                

                                                    <a style="text-decoration: none!important; color: #f4f4f4;" href="{{ route('calificacionesActasVolante1',$examen->id) }}"><b>{{ $examen->nombre_materia }}</b> | 
                                                {{ $fecha}} | {{ $examen->apellido_presidente }}, {{ $examen->nombre_presidente }}</a> 

                                                       

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




@if (session('vacio')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Este examen no tiene estudiantes inscriptos',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif
      



@endsection