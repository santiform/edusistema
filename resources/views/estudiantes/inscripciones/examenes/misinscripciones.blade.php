@include('estudiantes.includes.headerestudiantes')

          <h1 class="black">
          	<center>

          		<span class="material-icons" style="font-size: 1.2em; vertical-align: middle;">arrow_forward</span>
			    <span style="font-size: 24px; font-weight: 800; margin-left: -0.2rem; vertical-align: middle;">Mis inscripciones a EXAMENES</span> </h1> </center>

			    <br>

        @foreach ($inscripciones as $inscripcion)
            <p class="nombremateria" >{{ $inscripcion->nombre_materia }}</p>
            <p class="profesordatos" >PRESIDENTE: {{ $inscripcion->apellido_presidente }}, {{ $inscripcion->nombre_presidente }}</p>
            <p class="profesordatos" >VOCAL 1: {{ $inscripcion->apellido_vocal1 }}, {{ $inscripcion->nombre_vocal1 }}</p>
            <p class="profesordatos" >VOCAL 2: {{ $inscripcion->apellido_vocal2 }}, {{ $inscripcion->nombre_vocal2 }}</p>
            <p class="horariodatos" >
            	

				{{ \Carbon\Carbon::parse($inscripcion->fecha)->format('d/m/Y') }}, de {{ $inscripcion->hora_comienzo }} a {{ $inscripcion->hora_finalizacion }}, AULA {{$inscripcion->aula}}

            

            	<form class="botoneliminar alerta-eliminar" action="{{ route('eliminar_inscripcion_examen', ['id' => $inscripcion->id]) }}" method="POST">
				    @csrf
				    @method('DELETE')
				    <button type="submit">
				        <span class="material-icons ic">delete_forever</span>
				        <span>Eliminar Inscripción</span>
				    </button>
				</form>

        <br>
            
        @endforeach

			    

<div style="height: 1.5rem;" ></div>
<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES -! </p>	    




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

@include('estudiantes.includes.footerestudiantes')




@if (session('borrar')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: 'Examen eliminado correctamente',
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
          title: '¡Inscripción a Examen realizada con éxito!',
          showConfirmButton: false,
          timer: 4000
        })

     </script>

@endif    