@extends('adm2023divox.layouts.app')


@section('content')
   
@php use Carbon\Carbon; @endphp
           

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
                <a href="https://emmu.edusistema.com.ar/adm2023divox/fechas">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Editar fechas de examen</span>

                          
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
                                        <th>HACE CLICK EN ALGUNA FECHA PARA SELECCIONARLA</th>

                                    </tr>
                                </thead>
                                <tbody>

                                                                        


                                    
                                    @foreach ($fechas as $fecha)
                                        <tr>
                                            <td>
                                                <a href="{{ route('adm2023divox.formularios.editarfechaexamen2', ['id' => $fecha->id]) }}">
                                                    <b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $fecha->fecha)->format('d/m/y') }}</b> &nbsp; &nbsp; || &nbsp; &nbsp;    
                                                    {{ $fecha->nombremateria }} &nbsp; &nbsp; || &nbsp; &nbsp; 
                                                    {{ $fecha->apellidoprofesor }}, {{ $fecha->nombreprofesor }}  &nbsp; &nbsp; || &nbsp; &nbsp; 
                                                    {{ $fecha->fechadia1 }} de 
                                                    {{ $fecha->cathoracomdia1 }} a 
                                                    {{ $fecha->cathorafindia1 }}

                                                    @if($fecha->catedradia2 != '-')
                                                        y {{ $fecha->catedradia2 }} de 
                                                        {{ $fecha->cathoracomdia2 }} a 
                                                        {{ $fecha->cathorafindia2 }}
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