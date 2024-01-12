@include('estudiantes.includes.headerestudiantes')
      
          	<center>
              <h1 class="black">
          		<span class="material-icons" style="font-size: 1.2em; vertical-align: middle;">arrow_forward</span>
			    <span style="font-size: 24px; font-weight: 800; margin-left: -0.2rem; vertical-align: middle;">Mis Calificaciones</span> </h1> 

          <div class="divcarrera" > {{ $nombreCarrera }}</div>

          <div class="center divinputfuncion" >
              <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
          </div>

        </center>

			    <br>


            
    

<table class="tabla-invisible search-table">

    @foreach($calificaciones as $calificacion)
    
    <tr>
        <td> 
          <p class="nombremateria">{{ $calificacion->nombre_materia }}</p> 
          <p class="horariodatos">1er Cuatrimestre: {{ $calificacion->nota_cuatri1 }} ({{ $calificacion->nota_cuatri1_letras }})</p> 
          
          {{-- Verifica si cuatri2 no es nulo --}}
          @if ($calificacion->nota_cuatri2 !== null)
              <p class="horariodatos">2do Cuatrimestre: {{ $calificacion->nota_cuatri2 }} ({{ $calificacion->nota_cuatri2_letras }})</p>
          @endif
          
          {{-- Verifica si nota_final no es nula --}}
          @if ($calificacion->nota_final !== null)
              <p class="horariodatos" style="color: #006D55"><b>Nota final:</b> {{ $calificacion->nota_final }} ({{ $calificacion->nota_final_letras }})  - {{ $calificacion->fechaFinalFormateada }}</p>

          @endif

          <div style="height: 1rem"></div>
        </td>
    </tr>
    @endforeach
    <!-- Agrega más filas según sea necesario -->
</table>


			    
<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES -! </p>



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


@include('estudiantes.includes.footerestudiantes')




