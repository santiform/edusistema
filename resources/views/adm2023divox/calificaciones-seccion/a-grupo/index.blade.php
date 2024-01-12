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

    /* Tamaños específicos para cada columna */
    th:nth-child(1),
    td:nth-child(1) {
        width: 5%;
        text-align: center;
    }

    th:nth-child(2),
    td:nth-child(2) {
        width: 10%;
        text-align: center;
    }

    th:nth-child(3),
    td:nth-child(3) {
        width: 70%;
    }

    th:nth-child(4),
    td:nth-child(4) {
        width: 2%;
    }

    th:nth-child(5),
    td:nth-child(5) {
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
    <a href="https://emmu.edusistema.com.ar/public/adm2023divox/calificaciones-seccion">
        <span class=" botonatras material-icons2">
            arrow_back_ios_new
        </span>
    </a>
</div>

<div class="tituloconicono">
    <span class="titulofuncion">Calificaciones a un grupo de Estudiantes</span>
</div>

<div class="container-fluid" style="max-width: 60vw;">

    <form method="post" action="{{ route('calificacionesGrupo1') }}">
        @csrf
        <div class="table-responsive">
            <table class="table table-bordered search-table" stdsyle="border: 4px solid white;">

                <div style="background-color: #E45D58; padding: 20px; border-radius: 15px; color: #f4f4f4; font-size: 19px;">
                    <label for="modalidad">Modalidad:</label>
                    <select name="modalidad" class="select">
                        <option value="REGULAR" {{ old('modalidad') === 'REGULAR' ? 'selected' : '' }}>REGULAR</option>
                        <option value="PREVIA" {{ old('modalidad') === 'PREVIA' ? 'selected' : '' }}>PREVIA</option>
                        <option value="LIBRE" {{ old('modalidad') === 'LIBRE' ? 'selected' : '' }}>LIBRE</option>
                    </select>

                    <div style="height: 1.5rem"></div>

                    <label for="tomo">LIBRO:</label>
                    <select name="tomo" class="select">
                        <option value="1 FINALES" {{ old('modalidad') === '1 FINALES' ? 'selected' : '' }}>1 FINALES
                        </option>
                        <option value="2 FINALES" {{ old('modalidad') === '2 FINALES' ? 'selected' : '' }}>2 FINALES
                        </option>
                         <option value="3 FINALES" {{ old('modalidad') === '3 FINALES' ? 'selected' : '' }}>3 FINALES
                        </option>
                         <option value="4 FINALES" {{ old('modalidad') === '4 FINALES' ? 'selected' : '' }}>4 FINALES
                        </option>
                         <option value="5 FINALES" {{ old('modalidad') === '5 FINALES' ? 'selected' : '' }}>5 FINALES
                        </option>
                         <option value="6 FINALES" {{ old('modalidad') === '6 FINALES' ? 'selected' : '' }}>6 FINALES
                        </option>
                         <option value="7 FINALES" {{ old('modalidad') === '7 FINALES' ? 'selected' : '' }}>7 FINALES
                        </option>
                         <option value="1 PROMOCIONALES" {{ old('modalidad') === '1 PROMOCIONALES' ? 'selected' : '' }}>1 PROMOCIONALES
                        </option>
                         <option value="2 PROMOCIONALES" {{ old('modalidad') === '2 PROMOCIONALES' ? 'selected' : '' }}>2 PROMOCIONALES
                        </option>
                        <option value="3 PROMOCIONALES" {{ old('modalidad') === '3 PROMOCIONALES' ? 'selected' : '' }}>3 PROMOCIONALES
                        </option>
                        <option value="4 PROMOCIONALES" {{ old('modalidad') === '4 PROMOCIONALES' ? 'selected' : '' }}>4 PROMOCIONALES
                        </option>
                        <option value="5 PROMOCIONALES" {{ old('modalidad') === '5 PROMOCIONALES' ? 'selected' : '' }}>5 PROMOCIONALES
                        </option>

                        <!-- Otras opciones... -->
                    </select>

                    <div style="height: 1.5rem"></div>

                    <label for="pagina">Página:</label>
                    <input class="input" type="number" name="pagina" value="{{ old('pagina') }}" />

                    <div style="height: 1.5rem"></div>

                    <label for="fecha_final">Fecha:</label>
                    <input type="date" name="fecha_final" value=" " />

                    <div style="height: 1.5rem"></div>

                    <label for="id_materia">Materia:</label>
                    <select name="id_materia" class="select">
                        <option value="">Selecciona una materia</option>
                        @foreach ($materias as $id => $nombre)
                        <option value="{{ $id }}">{{ $nombre }}</option>
                        @endforeach
                    </select>

                </div>

                <div style="height: 2.6rem"></div>

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
                    <tr>
                        <td><p>{{ $contador++ }}</p></td>
                        <td><input type="text" name="dni[]" id="dni_{{ $i }}" value="{{ old('dni.' . $i) }}" />
                            <button type="button" style="background-color: #E45D58; border-radius: 10px; color: #f4f4f4; margin-block: 0.5rem" onclick="validarDNI('{{ $i }}')">Validar</button></td>
                        <td>                            
                            <div id="resultado_validacion_{{ $i }}"></div>
                        </td>

                        </td>
                        <td>
                            <input type="text" name="nota_final[]" value="{{ old('nota.' . $i) }}" />
                        </td>
                        <td>
                            <select name="estado[]" class="select">
                                <option value="APROBADO" {{ old('nota.' . $i) === 'APROBADO' ? 'selected' : '' }}>APROBADO
                                </option>
                                <option value="DESAPROBADO" {{ old('nota.' . $i) === 'DESAPROBADO' ? 'selected' : '' }}>
                                    DESAPROBADO
                                </option>
                                <option value="AUSENTE" {{ old('nota.' . $i) === 'AUSENTE' ? 'selected' : '' }}>AUSENTE
                                </option>
                            </select>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>

            <button type="submit" class="botonformulario" style="font-size: 18px; background-color: #131313">
                <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                    send
                </span>
                <span>Enviar calificaciones<span></button>

            <div style="height: 2rem"></div>

        </div>
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
                    url: 'https://emmu.edusistema.com.ar/buscar-dni/' + dni,
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
