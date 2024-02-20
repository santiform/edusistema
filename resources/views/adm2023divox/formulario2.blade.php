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

    th,
    td {
        padding: 8px;
        text-align: left;
        height: 20px;
        line-height: 2;
    }

    tr {
        height: 50px;
        /* Ajusta la altura según sea necesario */
    }

    th {
        text-align: center;
    }

    

    p {
        font-size: 20px;
    }
</style>

<?php
use Carbon\Carbon;
?>

<div class="divbotonatras">
    <a href="https://localhost/edusistema/public/adm2023divox/editarpromo">
        <span class=" botonatras material-icons2">
            arrow_back_ios_new
        </span>
    </a>
</div>

<div class="tituloconicono">
    <span class="titulofuncion">Editando promocionales {{$calificaciones[0]->nombre_materia}}</span>
</div>

<div class="container-fluid" style="max-width: 45vw;">

    <form method="post" action="{{ url('/adm2023divox/editarpromo2') }}">
    @csrf
    @method('PUT')

    @foreach ($calificaciones as $calificacion)
        <div class="container-fluid formulario center" style="max-width: 45vw">
            <div class="row">
                <div class="col-12" style="font-size: 22px; font-weight: 700">{{ $calificacion->dni }} - {{ $calificacion->apellido }} {{ $calificacion->nombre }}</div>
                <input type="hidden" name="calificaciones[{{ $calificacion->id }}][dni]" value="{{ $calificacion->dni }}">
                <input type="hidden" name="calificaciones[{{ $calificacion->id }}][id]" value="{{ $calificacion->id }}">

                <div class="col-12" style="height:2rem; margin-top: 0.4rem;"><hr></div>

                <div class="col-4">1er Cuatrimeste:<br><input type="text" name="calificaciones[{{ $calificacion->id }}][nota_cuatri1]" value="{{ $calificacion->nota_cuatri1 }}"></div>
                <div class="col-4">Fecha 1er Cuat:<br><input type="date" name="calificaciones[{{ $calificacion->id }}][fecha_cuatri1]" value="{{ $calificacion->fecha_cuatri1 }}"></div>
                <div class="col-4">2do Cuatrimeste:<br><input type="text" name="calificaciones[{{ $calificacion->id }}][nota_cuatri2]" value="{{ $calificacion->nota_cuatri2 }}"></div>

                <div class="col-12" style="height:2rem;"><hr></div>

                <div class="col-4">Fecha 2do Cuat:<br><input type="date" name="calificaciones[{{ $calificacion->id }}][fecha_cuatri2]" value="{{ $calificacion->fecha_cuatri2 }}"></div>
                <div class="col-4">Nota final:<br><input type="text" name="calificaciones[{{ $calificacion->id }}][nota_final]" value="{{ $calificacion->nota_final }}"></div>
                <div class="col-4">Fecha final:<br><input type="date" name="calificaciones[{{ $calificacion->id }}][fecha_final]" value="{{ $calificacion->fecha_final }}"></div>

                <div class="col-12" style="height:2rem;"><hr></div>

                <div class="col-3">Estado:<br>
                    <select name="calificaciones[{{ $calificacion->id }}][estado]">
                        <option value="APROBADO" {{ $calificacion->estado == 'APROBADO' ? 'selected' : '' }}>APROBADO</option>
                        <option value="DESAPROBADO" {{ $calificacion->estado == 'DESAPROBADO' ? 'selected' : '' }}>DESAPROBADO</option>
                        <option value="AUSENTE" {{ $calificacion->estado == 'AUSENTE' ? 'selected' : '' }}>AUSENTE</option>
                    </select>
                </div>

                <div class="col-3">Modalidad:<br>
                    <select name="calificaciones[{{ $calificacion->id }}][modalidad]">
                        <option value="REGULAR" {{ $calificacion->modalidad == 'REGULAR' ? 'selected' : '' }}>REGULAR</option>
                        <option value="PREVIO" {{ $calificacion->modalidad == 'PREVIO' ? 'selected' : '' }}>PREVIO</option>
                        <option value="LIBRE" {{ $calificacion->modalidad == 'LIBRE' ? 'selected' : '' }}>LIBRE</option>
                    </select>
                </div>

                <div class="col-3">Libro:<br>
                    <select name="calificaciones[{{ $calificacion->id }}][tomo]">
                        <option value="1 FINALES" {{ $calificacion->tomo == '1 FINALES' ? 'selected' : '' }}>1 FINALES</option>
                        <option value="2 FINALES" {{ $calificacion->tomo == '2 FINALES' ? 'selected' : '' }}>2 FINALES</option>
                        <option value="3 FINALES" {{ $calificacion->tomo == '3 FINALES' ? 'selected' : '' }}>3 FINALES</option>
                        <option value="4 FINALES" {{ $calificacion->tomo == '4 FINALES' ? 'selected' : '' }}>4 FINALES</option>
                        <option value="5 FINALES" {{ $calificacion->tomo == '5 FINALES' ? 'selected' : '' }}>5 FINALES</option>
                        <option value="6 FINALES" {{ $calificacion->tomo == '6 FINALES' ? 'selected' : '' }}>6 FINALES</option>
                        <option value="7 FINALES" {{ $calificacion->tomo == '7 FINALES' ? 'selected' : '' }}>7 FINALES</option>
                        <option value="1 PROMOCIONALES" {{ $calificacion->tomo == '1 PROMOCIONALES' ? 'selected' : '' }}>1 PROMOCIONALES</option>
                        <option value="2 PROMOCIONALES" {{ $calificacion->tomo == '2 PROMOCIONALES' ? 'selected' : '' }}>2 PROMOCIONALES</option>
                        <option value="3 PROMOCIONALES" {{ $calificacion->tomo == '3 PROMOCIONALES' ? 'selected' : '' }}>3 PROMOCIONALES</option>
                        <option value="4 PROMOCIONALES" {{ $calificacion->tomo == '4 PROMOCIONALES' ? 'selected' : '' }}>4 PROMOCIONALES</option>
                        <option value="5 PROMOCIONALES" {{ $calificacion->tomo == '5 PROMOCIONALES' ? 'selected' : '' }}>5 PROMOCIONALES</option>
                        <!-- Agrega las demás opciones -->
                    </select>
                </div>

                <div class="col-3">Página:<br><input type="number" name="calificaciones[{{ $calificacion->id }}][pagina]" value="{{ $calificacion->pagina }}"></div>
            </div>
        </div>

        <div style="height: 2rem"></div>
    @endforeach

    <button type="submit" class="botonformulario" style="font-size: 18px; background-color: #131313">
        <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
            send
        </span>
        <span>Enviar calificaciones</span>
    </button>

    <div style="height: 2rem"></div>
</form>


</div>

<div style="height: 4rem"></div>

</div>

@endsection

@section('js')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<!-- Agrega el código JavaScript y jQuery para implementar el filtro de búsqueda -->
<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            var query = $(this).val().toLowerCase();
            $('.search-table tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
            });
        });
    });
</script>

<script>
    function validarDNI(index) {
        var dni = document.getElementById('dni_' + index).value;
        if (dni) {
            // Realizar la solicitud AJAX...
            $.ajax({
                    type: 'GET',
                    url: 'https://localhost/edusistema/public/buscar-dni/' + dni,
                    success: function (response) {
                        document.getElementById('resultado_validacion_' + index).innerHTML = response;
                    },
                    error: function (error) {
                        console.error('Error en la solicitud AJAX:', error);
                    }
                });

        } else {
            alert('Por favor, ingresa un DNI antes de validar.');
        }
    }
</script>


@endsection
