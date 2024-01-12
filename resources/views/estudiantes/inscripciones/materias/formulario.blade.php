@include('estudiantes.includes.headerestudiantes')

    <center>

    <h1>Inscripción a materias</h1>

    <p>Recordá que debes inscribirte a las materias una por una.</p>

    <div class="formularioestudiantes" style="padding-top: -2rem;" >

        <form method="POST" action="../materias/formulario/guardar">
        @csrf

        <div class="grupo" >
        <select class="inputform"  name="catedra" id="catedra">
            <option value="">Selecciona una Cátedra</option>
            @foreach ($catedrasDisponibles as $catedra)
                <option value="{{ $catedra->id }}|{{ $catedra->id_materia }}"><b>{{ $catedra->nombremateria }}</b> | {{ $catedra->apellido }}, {{ $catedra->nombre }} 
                | {{ $catedra->dia1 }} de 
                {{$catedra->hora_comienzo_dia1}} a
                {{$catedra->hora_finalizacion_dia1}}  </option>
            @endforeach
        </select>
        </div>

        <button class="botonformulario" type="submit"><span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                send
                </span> Inscribirme</button>

        </form>

    </div>    


    </center>

    <br>

<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES -! </p>

@include('estudiantes.includes.footerestudiantes')



@if (session('noCatedra')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: '¡No seleccionaste ninguna Cátedra!',
          showConfirmButton: false,
          timer: 2500
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



      