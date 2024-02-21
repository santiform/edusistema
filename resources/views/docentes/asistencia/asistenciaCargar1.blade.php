
@include('docentes.includes.headerdocentes')

              <h1 class="titulo"><span class="material-icons" style="font-size: 1.4em; vertical-align: middle;">arrow_forward</span> Seleccioná una Cátedra</h1>

              <div class="center divinputfuncion" >
              <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
          </div>

          <br>


@foreach ($catedras as $catedra)

<table class="tabla-invisible search-table">
          <tbody>
          

              <form action="{{ route('asistenciaCargar2') }}" method="POST">
                    @csrf
                   

              

                <tr>
                <td> 
                <input type="hidden" name="catedra_id" value="{{ $catedra->id }}">
                  
                <p>
                <button type="submit" style="border: none; background: none; cursor: pointer; text-align: left;">
                <p class="nombremateria" >{{ $catedra->nombre_materia }}</p>
                    
                <p class="horariodatos" >
                      

                {{ $catedra->dia1  }} de {{ $catedra->hora_comienzo_dia1  }} a {{ $catedra->hora_finalizacion_dia1  }} (AULA {{$catedra->aula}})</p>

                

                @if($catedra->dia2 != '-')
                <p class="horariodatos" >
                        {{ $catedra->dia2 }} de 
                        {{ $catedra->hora_comienzo_dia2 }} a 
                        {{ $catedra->hora_finalizacion_dia2 }}
                        (AULA {{$catedra->aula_dia2}})
                        </p>
                        @endif        
                </button> </p> </form>

                </td>
                </tr>
              
</tbody>
</table>

@endforeach

          
<p style="color: transparent;" > EduSistema DOCENTES - EduSistema DOCENTES - 
  EduSistema DOCENTES  -! EduSistema </p>




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




@include('docentes.includes.footerdocentes')