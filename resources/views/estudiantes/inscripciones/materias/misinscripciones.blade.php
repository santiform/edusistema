@include('estudiantes.includes.headerestudiantes')


          <h1 class="black">
          	<center>

          		<span class="material-icons" style="font-size: 1.2em; vertical-align: middle;">arrow_forward</span>
			    <span style="font-size: 24px; font-weight: 800; margin-left: -0.2rem; vertical-align: middle;">Mis inscripciones a MATERIAS</span> </h1> </center>

			    <br>

        @foreach ($inscripciones as $inscripcion)
            <p class="nombremateria" >{{ $inscripcion->nombre_materia }}</p>
            <p class="profesordatos" >DOCENTE: {{ $inscripcion->apellido_profesor }}, {{ $inscripcion->nombre_profesor }}</p>
            <p class="horariodatos" >
            	

				{{ $inscripcion->dia1  }} de {{ $inscripcion->hora_comienzo_dia1  }} a {{ $inscripcion->hora_finalizacion_dia1  }} (AULA {{$inscripcion->aula_dia1}})</p>

				

				@if($inscripcion->dia2 != '-')
				<p class="horariodatos" >
                {{ $inscripcion->dia2 }} de 
                {{ $inscripcion->hora_comienzo_dia2 }} a 
                {{ $inscripcion->hora_finalizacion_dia2 }}
                (AULA {{$inscripcion->aula_dia2}})
                </p>
                @endif
            

            	<form class="botoneliminar alerta-eliminar" action="{{ route('eliminar_inscripcion_materia', ['id' => $inscripcion->id]) }}" method="POST">
				    @csrf
				    @method('DELETE')
				    <button type="submit">
				        <span class="material-icons ic">delete_forever</span>
				        <span>Eliminar Inscripción</span>
				    </button>
				</form>

        <br>        
            
        @endforeach

			    

			    



<script type="text/javascript">

        $('.alerta-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: '¿Eliminar inscripción?',
              text: "¡Esta acción no se puede revertir!",
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#002D18',
              showCancelButton: true,
              confirmButtonColor: '#002D18',
              cancelButtonColor: '#003D20',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, eliminar',
              background: '#006D55',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });    

</script>

<div style="height: 1.5rem;" ></div>
<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES -! </p>



@include('estudiantes.includes.footerestudiantes')


@if (session('borrar')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: 'Materia eliminada correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif




@if (session('inscValidada')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: '¡Inscripción a Materia realizada con éxito!',
          showConfirmButton: false,
          timer: 4000
        })

     </script>

@endif    
