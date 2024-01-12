@include('estudiantes.includes.headerestudiantes')

          <center>

              <h1 class="black">
          		<span class="material-icons" style="font-size: 1.2em; vertical-align: middle;">arrow_forward</span>
			    <span style="font-size: 24px; font-weight: 800; margin-left: -0.2rem; vertical-align: middle;">Plan de Estudio</span> </h1>

			   <div class="divcarrera" > {{ $nombreCarrera }}</div>

			   <div style="height: 1.2rem;" ></div> 

          <div class="center divinputfuncion" >
              <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
          </div>

          <div style="height: 1.6rem;" ></div> 

		  </center> 		



		  <table class="tabla-invisible search-table">

    @foreach($materias as $materia)
    <tr>
        <td> 
        	<div style="height: 1.3rem"></div>

          <p class="nombremateria">{{ $materia->nombre_materia }}</p> 
          <a class="botondescargar" target="blank" href="{{ $materia->link_programa }}" method="POST">
              <button type="submit">
                  <span class="material-icons ic">visibility</span> 
                  <span>&nbsp;Ver Programa</span>
              </button>
          </a>



          <div style="height: 1.3rem"></div>
        </td>
    </tr>
    @endforeach
    
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