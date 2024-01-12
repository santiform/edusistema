@include('estudiantes.includes.headerestudiantes')

    <center>

    <h1>Inscripción a exámenes</h1>

    <div class="formularioestudiantes" style="padding-top: -2rem;" >

        <form method="POST" action="../examenes/formulario/guardar">
        @csrf

        <div class="grupo" >
        <select class="inputform"  name="examen" id="examen">
            <option value="">Selecciona un Exámen</option>
            @foreach ($examenesDisponibles as $examen)
                <option value="{{ $examen->id }}|{{ $examen->catedra_id }}"><b>{{ $examen->nombremateria }}</b> | {{ $examen->apellido }}, {{ $examen->nombre }} 
                | {{ $examen->dia1 }} de 
                {{$examen->hora_comienzo_dia1}} a
                {{$examen->hora_finalizacion_dia1}}  </option>
            @endforeach
        </select>
        </div>

        <button class="botonformulario" type="submit"><span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                send
                </span> Inscribirme</button>

        </form>

    </div>    


    </center>

<div style="height: 1.5rem;" ></div>
<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES -! </p>
    
@include('estudiantes.includes.footerestudiantes')




@if (session('noExamen')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: '¡No seleccionaste ningún Examen!',
          showConfirmButton: false,
          timer: 4000
        })

     </script>

@endif


@if (session('noCorrelativas')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: '¡No tenés las correlativas necesarias!',
          showConfirmButton: false,
          timer: 4000
        })

     </script>

@endif



@if (session('yaInscripto')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: '¡Ya estás inscripto/a en esta Materia, no podés inscribirte más de una vez!',
          showConfirmButton: false,
          timer: 6000
        })

     </script>

@endif     