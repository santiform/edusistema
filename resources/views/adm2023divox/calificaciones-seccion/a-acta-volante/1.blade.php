@extends('adm2023divox.layouts.app')


@section('content')


<style type="text/css">
    
    button {

        background-color: transparent;
        border: none;
    }

    a {

        text-decoration: none;
    }

    body {
    overflow-x: hidden;
}



        th, td {
            padding: 8px;
            text-align: left;
            height: 20px;
            line-height: 2;
        }

        tr {
    height: 50px; /* Ajusta la altura según sea necesario */
}

        th {
            text-align: center;
        }

        /* Tamaños específicos para cada columna */
        th:nth-child(1), td:nth-child(1) {
            width: 5%;
            text-align: center;
        }

        th:nth-child(2), td:nth-child(2) {
            width: 10%;
            text-align: center;
        }

        th:nth-child(3), td:nth-child(3) {
            width: 70%;
        }

        th:nth-child(4), td:nth-child(4) {
            width: 2%;
        }
        th:nth-child(5), td:nth-child(5) {
            width: 3%;
        }


        p {
            font-size: 20px;
        }

</style>





<?php  

use Carbon\Carbon;


?>

<div class="divbotonatras">
                <a href="https://emmu.edusistema.com.ar/public/adm2023divox/calificaciones-a-acta-volante">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Calificaciones a un Acta volante</span>

                        </div>



                        <div class="container-fluid" style="max-width: 60vw;">
                                        

                                        @php

                                        $fechaDB = $datos[0]->fecha; // Supongamos que $datos[0]->fecha contiene la fecha en formato de base de datos
                                        $fechaVieja = $fechaDB ? Carbon::createFromFormat('Y-m-d', $fechaDB) : null;
                                        $fecha = $fechaVieja ? $fechaVieja->format('d/m/Y') : null;

                                        @endphp    

                                        


    <div class="container-fluid" style="max-width: 60vw;" >

        
        <div style="background-color: #E45D58; padding: 20px; border-radius: 15px; color: #f4f4f4; font-size: 19px;" >
        Enviando calificaciones para <b>{{ $datos[0]->nombre_materia}}</b>. <br>
        Examen realizado el día <b>{{$fecha}}</b>. <br>
        Mesa examinadora: <b>{{ $datos[0]->apellido_presidente}}</b>, <b>{{ $datos[0]->apellido_vocal1}}</b> y <b>{{ $datos[0]->apellido_vocal2}}.</b>
        </div>

<form method="post" action="{{ route('calificacionesActasVolante2') }}">
    @csrf 
    <div class="table-responsive">
      <table class="table table-bordered search-table" stdsyle="border: 4px solid white;">


        <div style="height: 2rem"></div> 




        <div style="background-color: #E45D58; padding: 20px; border-radius: 15px; color: #f4f4f4; font-size: 19px;" >
            
        <label for="modalidad">Modalidad:</label>
        <select name="modalidad" class="select">
            <option value="REGULAR" {{ old('modalidad') === 'REGULAR' ? 'selected' : '' }}>REGULAR</option>
            <option value="PREVIA" {{ old('modalidad') === 'PREVIA' ? 'selected' : '' }}>PREVIA</option>
            <option value="LIBRE" {{ old('modalidad') === 'LIBRE' ? 'selected' : '' }}>LIBRE</option>
            <!-- Agrega más opciones según sea necesario -->
        </select>


        <div style="height: 1.5rem"></div>        


        <label for="tomo">LIBRO:</label>
        <select name="tomo" class="select">
            <option value="1 FINALES" {{ old('modalidad') === '1 FINALES' ? 'selected' : '' }}>1 FINALES</option>
            <option value="2 FINALES" {{ old('modalidad') === '2 FINALES' ? 'selected' : '' }}>2 FINALES</option>
            <option value="3 FINALES" {{ old('modalidad') === '3 FINALES' ? 'selected' : '' }}>3 FINALES</option>
            <option value="4 FINALES" {{ old('modalidad') === '4 FINALES' ? 'selected' : '' }}>4 FINALES</option>
            <option value="5 FINALES" {{ old('modalidad') === '5 FINALES' ? 'selected' : '' }}>5 FINALES</option>
            <option value="6 FINALES" {{ old('modalidad') === '6 FINALES' ? 'selected' : '' }}>6 FINALES</option>
            <option value="7 FINALES" {{ old('modalidad') === '7 FINALES' ? 'selected' : '' }}>7 FINALES</option>

            <option value="1 PROMOCIONALES" {{ old('modalidad') === '1 PROMOCIONALES' ? 'selected' : '' }}>1 PROMOCIONALES</option>
            <option value="2 PROMOCIONALES" {{ old('modalidad') === '2 PROMOCIONALES' ? 'selected' : '' }}>2 PROMOCIONALES</option>
            <option value="3 PROMOCIONALES" {{ old('modalidad') === '3 PROMOCIONALES' ? 'selected' : '' }}>3 PROMOCIONALES</option>
            <option value="4 PROMOCIONALES" {{ old('modalidad') === '4 PROMOCIONALES' ? 'selected' : '' }}>4 PROMOCIONALES</option>
            <!-- Agrega más opciones según sea necesario -->
        </select>


        <div style="height: 1.5rem"></div> 


        <label for="pagina">Página:</label>
        <input class="input" type="number" name="pagina" value="{{ old('pagina') }}" />

        </div>


        


        <div style="height: 1.8rem"></div>  




            <thead class="thead">
                <tr>
                    <th>N°</th>
                    <th>DNI</th>
                    <th>Apellido y Nombre</th>
                    <th>Calificación Final</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @php $contador = 1 @endphp
                @for ($i = 0; $i < 26; $i++)
                    @php
                        $dato = $i < count($datos) ? $datos[$i] : null;

                        $fechaDB = optional($dato)->fecha;
                        $fechaVieja = $fechaDB ? Carbon::createFromFormat('Y-m-d', $fechaDB) : null;
                        $fecha = $fechaVieja ? $fechaVieja->format('d/m/Y') : null;
                    @endphp

                    <tr>
                        <td><p>{{ $contador++ }}</p></td>
                        <td><p>{{ optional($dato)->dni_estudiante }}</p></td>
                        <td><p>{{ optional($dato)->apellido_estudiante }} {{ optional($dato)->nombre_estudiante }}</p></td>
                        <td>
                            <input type="number" name="nota_final[]" value="{{ old('nota.' . $i) }}" />
                        </td>
                        <td>
                            <select name="estado[]" class="select">
                                <option value="APROBADO" {{ old('nota.' . $i) === 'APROBADO' ? 'selected' : '' }}>APROBADO</option>
                                <option value="DESAPROBADO" {{ old('nota.' . $i) === 'DESAPROBADO' ? 'selected' : '' }}>DESAPROBADO</option>
                                <option value="AUSENTE" {{ old('nota.' . $i) === 'AUSENTE' ? 'selected' : '' }}>AUSENTE</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>

                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <!-- Campos ocultos con valores iguales para todos los registros -->
        @foreach($datos as $dato)
            <input type="hidden" name="dni_estudiantes[]" value="{{ $dato->dni_estudiante }}" />
        @endforeach
        <input type="hidden" name="id_materia" value="{{ $datos[0]->materia_id }}" />
        <input type="hidden" name="fecha_final" value="{{ $datos[0]->fecha }}" />
        <!-- Agrega más campos ocultos según sea necesario -->

        <button type="submit" class="botonformulario" style="font-size: 18px; background-color: #131313">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                send
                </span>

            <span>Enviar calificaciones<span></button>

             <div style="height: 2rem" ></div>   

    </div>
</form>



                    </div>

                      
<div style="height: 4rem" ></div>

                       
                    </div>


@endsection              



@section('js')


<!-- Agrega el código JavaScript y jQuery para implementar el filtro de búsqueda -->
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


@endsection              
