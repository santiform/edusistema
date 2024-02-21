
@include('docentes.includes.headerdocentes')

              <h1 class="titulo"><span class="material-icons" style="font-size: 1.2em; vertical-align: middle;">arrow_forward</span> Cargar Asistencia</h1>

              <div style="height: 0.4rem;" ></div>

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


               
               @if (count($estudiantesLibres) > 0)
                    <div class="estudiantesLibres" >
                    <p style="color: red" >
                            Los siguientes <b>estudiantes</b> se encuentran en condición <b>LIBRE</b>:
                    @foreach ($estudiantesLibres as $estudiante)

                        <br><br><br>
                        
                            -<b> {{ $estudiante->apellido }} {{ $estudiante->nombre }}</b>

                    @endforeach</p>


                    <div style="height: 1.7rem" ></div>

                    <i>Si vos como docente deseás que alguien de esta lista obtenga una reincorporación, ponete en contacto con administración.<br>Caso contrario omití esta alerta.</i>
                    </div>
                @endif
               
                    


<form action="{{ route('asistenciaCargarGuardar') }}" method="POST">                        

                
        <label style="margin-top: 1.5rem; margin-bottom: 2.5rem;" for="fecha"><b>Elegí una fecha:</b></label>
        <input type="date" id="fecha" name="fecha">


          <br>

<div class="div-asistencia" >

    @csrf
    <input type="hidden" name="catedra_id" value="{{ $catedra->id }}">
    <table class="tabla-asistencia" >
        <thead>
            <tr>
                <th style="text-align: left!important; padding-left: 2.35rem!important">Estudiante</th>
                <th style="padding-right: 2.35rem!important">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantesNormales as $estudiante)
                <tr>
                    <td style="text-align: left!important; padding-left: 2.35rem!important" >{{ $estudiante->apellido }} {{ $estudiante->nombre }}</td>
                    <td>
                        <select style="margin-right: 2.35rem!important" name="estado[{{ $estudiante->dni }}]">
                            <option value="" disabled selected> </option>
                            <option value="A">A</option>
                            <option value="P">P</option>
                            <option value="AJ">AJ</option>
                        </select>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="height: 3rem" ></div>


    <div style="width: 100%; text-align: center;">
    <button class="botonformulario" style="max-width: 20rem; margin: 0 auto!important" type="submit"><span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                send
                </span> Enviar Asistencia</button>

    </div>



</form>

</div>

          
<p style="color: transparent;" > EduSistema DOCENTES - EduSistema DOCENTES - 
  EduSistema DOCENTES  -! EduSistema </p>




@include('docentes.includes.footerdocentes')

