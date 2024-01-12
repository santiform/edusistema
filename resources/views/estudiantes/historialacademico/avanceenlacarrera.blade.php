@include('estudiantes.includes.headerestudiantes')

          	<center>
              <h1 class="black">
          		<span class="material-icons" style="font-size: 1.2em; vertical-align: middle;">arrow_forward</span>
			    <span style="font-size: 24px; font-weight: 800; margin-left: -0.2rem; vertical-align: middle;">Avance en la carrera</span> </h1>

          <div class="divcarrera" > {{ $nombreCarrera }}</div>

          <div style="height: 5rem;" ></div>

          <p class="textoAvance" >Porcentaje de materias aprobadas:</p>



          <div class="progress" style="margin-top: -0.85rem; height: 2rem; font-size: 14px; font-weight: 500">
             <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style=" width: <?php echo $porcentajeMateriasAprobadas ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $porcentajeMateriasAprobadas ?>%</div>
          </div>

          </center>

          <div style="height: 5rem;" ></div>


          <div class="divcuentas" >
          <p class="textoAvance" ><b>Total materias de la carrera:</b> {{ $conteoMateriasCarrera }}</p>
          <p class="textoAvance" style="color: #006D55" ><b>Aprobadas:</b> {{ $conteoMateriasAprobadas }}</p>
          <p class="textoAvance" style="color: red" ><b>Restantes:</b> {{ $totalMateriasMenosAprobadas }}</p>
          </div>

			    <br>
            


<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES -! </p>

@include('estudiantes.includes.footerestudiantes')




