@include('docentes.includes.headerdocentes')

			 <h1 class="titulo"><span class="material-icons" style="font-size: 1.4em; vertical-align: middle;">arrow_forward</span> Asistencia</h1>


		    <h1 class="black">- Cargar</h1>


	         <a href="https://localhost/edusistema/public/docentes/asistencia-cargar">
			  <button class="boton2">
			    <span class="material-icons" style="font-size: 1.4em; vertical-align: middle;">arrow_forward</span>
			    <span style="font-size: 19px; margin-inline: 0.4rem; vertical-align: middle;">Acceder</span>
			  </button>
			 </a>		 


			 <div style="height: 2rem;" ></div>


		    <h1 class="black">- Consultar</h1>


	         <a href="https://localhost/edusistema/public/DOCENTES/inscripciones/examenes">
			  <button class="boton2">
			    <span class="material-icons" style="font-size: 1.4em; vertical-align: middle;">arrow_forward</span>
			    <span style="font-size: 19px; margin-inline: 0.4rem; vertical-align: middle;">Acceder</span>
			  </button>
			 </a>


			 <div style="height: 2rem;" ></div>


			 <h1 class="black">- Modificar</h1>


	         <a href="https://localhost/edusistema/public/DOCENTES/inscripciones/examenes">
			  <button class="boton2">
			    <span class="material-icons" style="font-size: 1.4em; vertical-align: middle;">arrow_forward</span>
			    <span style="font-size: 19px; margin-inline: 0.4rem; vertical-align: middle;">Acceder</span>
			  </button>
			 </a>

          <br>


<p style="color: transparent;" > EduSistema DOCENTES - EduSistema DOCENTES - 
	EduSistema DOCENTES	-! EduSistema </p>



@include('docentes.includes.footerdocentes')




@if (session('asistenciaCargada')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#F4F4F4',
          color: '#F4F4F4',
          background: '#00195E',
          title: 'Asistencia cargada correctamente',
          showConfirmButton: false,
          timer: 4000
        })

     </script> 

@endif





@if (session('asistenciaEditada')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#F4F4F4',
          color: '#F4F4F4',
          background: '#00195E',
          title: 'Asistencia editada correctamente',
          showConfirmButton: false,
          timer: 4000
        })

     </script> 

@endif