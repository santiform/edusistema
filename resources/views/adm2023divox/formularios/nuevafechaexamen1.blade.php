@extends('adm2023divox.layouts.app')


@section('content')
   

                

<style type="text/css">

    html {
  overflow-x: hidden;
}
    
    button {

        background-color: transparent;
        border: none;
    }

    a {

        text-decoration: none;
    }


    td:hover {

        text-decoration: underline;
        cursor: pointer;
         color: #F4F4F4!important;
    }

    a {

        text-decoration: none;
         color: #F4F4F4!important;
    }

</style>

 <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/examenes-fechas">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Crear nueva fecha de examen para una cátedra</span>

                          
                        </div>



                        <div class="center divinputfuncion" >
                  <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
                        </div>
                        @includeif('partials.errors')


                        <div class="container-fluid" style="max-width: 82vw;" >
                        <div class="table-responsive">
                            <table class="table table-bordered search-table search-table" >
                                <thead class="thead">
                                    <tr>                                             
                                        <th>HACE CLICK EN ALGUNA CATEDRA PARA SELECCIONARLA</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    
                                    @foreach ($catedras as $catedra)       

                                        <tr>                         

                                            <td>
                                                <a href="{{ route('adm2023divox.formularios.nuevafechaexamen2', ['id' => $catedra->id]) }}">


                                                {{ $catedra->nombremateria }} &nbsp; &nbsp; || &nbsp; &nbsp; 
                                                {{ $catedra->apellidoprofesor }}, {{ $catedra->nombreprofesor }}  &nbsp; &nbsp; || &nbsp; &nbsp; 
                                                {{ $catedra->dia1 }} de 
                                                {{ $catedra->hora_comienzo_dia1 }} a 
                                                {{ $catedra->hora_finalizacion_dia1 }}

                                                @if($catedra->dia2 != '-')
                                                    
                                                    y 
                                                {{ $catedra->dia2 }} de 
                                                {{ $catedra->hora_comienzo_dia2 }} a 
                                                {{ $catedra->hora_finalizacion_dia2 }}
                                                @endif

                                            </a>

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


@endsection