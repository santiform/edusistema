<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EduSistema - Admin</title>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>



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

    table {
            border-collapse: collapse;
            width: 100%; /* Ancho total de la tabla */
            border: 4px solid black;
            border-color: black;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            height: 30px;
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
            width: 10%;
        }
        th:nth-child(4), td:nth-child(4) {
            width: 45%;
        }
        th:nth-child(5), td:nth-child(5) {
            width: 10%;
        }
        th:nth-child(6), td:nth-child(6) {
            width: 10%;
        }
        th:nth-child(7), td:nth-child(7) {
            width: 10%;
        }

        p {
            margin-top: -0.5rem; /* Puedes ajustar este valor según tus preferencias */
            line-height: 1.9;
            font-size: 15px;
        }

</style>





<?php  

use Carbon\Carbon;


?>
                        <div class="container-fluid" style="max-width: 60vw;">
                                        

                                        @php
                                        $fechaDB = $datos[0]->fecha;

                                            $fechaVieja = Carbon::createFromFormat('Y-m-d', $fechaDB);

                                            $desglose = date_parse($fechaVieja);

                                        $año = $desglose['year'];
                                        $mesNumerico = $desglose['month'];
                                        $dia = $desglose['day'];

                                        // Mapeo de nombres de meses en inglés a español
                                        $meses = array(
                                            'January' => 'Enero',
                                            'February' => 'Febrero',
                                            'March' => 'Marzo',
                                            'April' => 'Abril',
                                            'May' => 'Mayo',
                                            'June' => 'Junio',
                                            'July' => 'Julio',
                                            'August' => 'Agosto',
                                            'September' => 'Septiembre',
                                            'October' => 'Octubre',
                                            'November' => 'Noviembre',
                                            'December' => 'Diciembre'
                                        );

                                        // Obtener el nombre del mes en español
                                        $mes = $meses[date('F', mktime(0, 0, 0, $mesNumerico, 1, $año))];

                                    @endphp

                        <p style="font-weight: bolder; margin-top: 0rem; text-align: right; font-size: 16px;" >Libro: __________ &nbsp; Folio: __________ </p>            

                        <p style="text-align: center; margin-bottom: 1rem; margin-top: 0rem; font-weight: bolder;" >LIBRO DE ACTAS DE EXAMENES</p>

                        <p>ESTABLECIMIENTO <b>EMMU</b></p>
                        <p>ACTA DE EXAMENES DE ALUMNOS <b>REGULARES</b> de <b>{{ $datos[0]->nombre_materia; }}.</b></p>
                        <p>A los  <b>{{$dia}}</b> días del mes de <b>{{$mes}}</b> de <b>{{$año}}</b>;
                        reunida la Cominisión Examinadora de la signatura mencionada, con asistencia de sus tres miembros. Señores <b>{{$datos[0]->apellido_presidente}} {{$datos[0]->nombre_presidente}}</b>, <b>{{$datos[0]->apellido_vocal1}} {{$datos[0]->nombre_vocal1}}</b> y <b>{{$datos[0]->apellido_vocal2}} {{$datos[0]->nombre_vocal2}}</b>; procedió a cumplir con su cometido con el resultado que se consigna a continuación:</p>
                        </div>


    <div class="container-fluid" style="max-width: 60vw;" >
                        <div class="table">
                            <table class="table" style=" border: 4px solid black;">
                                <thead class="thead">
                                    <tr>                                             
										<th>N°</th>
                                        <th>Permiso</th>
                                        <th>DNI</th>
                                        <th>Apellido y Nombre</th>
                                        <th>Escrito</th>
                                        <th>Oral</th>
                                        <th>Definitiva</th>
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
                                            <td>-</td>
                                            <td><p>{{ optional($dato)->dni_estudiante }}</p></td>
                                            <td><p>{{ optional($dato)->apellido_estudiante }} {{ optional($dato)->nombre_estudiante }}</p></td>
                                            <td><p> </p></td>
                                            <td><p> </p></td>
                                            <td><p> </p></td>
                                        </tr>
                                    @endfor

                                </tbody>

                            </table>
                        </div>

                        <p style="margin-top: 2.5rem;" >Se hace constar que sobre un total de ____________ alumnos, resultaron:<br> __________ aprobados __________ desaprobados __________ ausentes.


<div style="height: 2rem" ></div>
                         
<table style="border: none; text-align: center;">
    <tbody>
        <tr>
            <td style="border: none; text-align: center;">
                ________________________<br>
                {{ $datos[0]->apellido_vocal1 }} 
            </td>
            <td style="border: none; text-align: center;">
                ________________________<br>
                {{ $datos[0]->apellido_presidente }} 
            </td>
            <td style="border: none; text-align: center;">
                ________________________<br>
                {{ $datos[0]->apellido_vocal2 }}  
            </td>
        </tr>
        <!-- Agrega más filas según sea necesario -->
    </tbody>
</table>



                            <div style="height: 1rem;" ></div>
                            



                    </div>




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




</body>
</html>
