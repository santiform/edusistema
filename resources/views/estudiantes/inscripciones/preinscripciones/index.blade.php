<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EduSistema - Estudiantes</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="https://localhost/edusistema/public/resources/librerias/styleestudiantes.css">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
      


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <br><br><br>


<center>
<form id="miFormulario" class="form" method="POST" action="../inscripciones/preinscripciones/guardar-datos" enctype="multipart/form-data">
    @csrf

    <div class="formularioestudiantes" style="padding-top: -2rem;" >

    <input type="hidden" name="archivo">

    <div class="grupo" >DNI: <br>
    <input class="inputform" type="text" name="dni">
    </div>

    <br>

    <div class="grupo" >Apellido/s: <br>
    <input class="inputform" type="text" name="apellido">
    </div>

    <br>

    <div class="grupo" >Nombre/s: <br>
    <input class="inputform" type="text" name="nombre">
    </div>

    <br>

    <div class="grupo" >Nacimiento: <br>
    <input class="inputform" type="date" name="nacimiento">
    </div>

    <br>

    <div class="grupo" >Celular: <br>
    <input class="inputform" type="text" name="celular">
    </div>

    <br>

    <div class="grupo" >Email: <br>
    <input class="inputform" type="text" name="mail">
    </div>

    <br>

    <div class="grupo" >Dirección: <br>
    <input class="inputform" type="text" name="direccion">
    </div>

    <br>

    <div class="grupo" >Localidad: <br>
        <select class="inputform" name="localidad">
            <option value="Caseros">Caseros</option>
            <option value="Churrucam">Churrucam</option>
            <option value="Ciudad Jardin">Ciudad Jardin</option>
            <option value="Lomas del Palomar">Lomas del Palomar</option>
            <option value="Ciudadela">Ciudadela</option>
            <option value="El Libertador">El Libertador</option>
            <option value="José Ingenieros">José Ingenieros</option>
            <option value="Loma Hermosa">Loma Hermosa</option>
            <option value="Martín Coronado">Martín Coronado</option>
            <option value="Once de Septiembre">Once de Septiembre</option>
            <option value="Pablo Podestá">Pablo Podestá</option>
            <option value="Remedios de Escalada">Remedios de Escalada</option>
            <option value="Sáenz Peña">Sáenz Peña</option>
            <option value="Santos Lugares">Santos Lugares</option>
            <option value="Villa Bosch">Villa Bosch</option>
            <option value="Villa Raffo">Villa Raffo</option>
            <option value="No pertenece a 3 de Febrero">No pertenece a 3 de Febrero</option>
        </select>
    </div>

    <br>

    <input class="inputform" type="hidden" name="tipo" value="REGULAR">




    <div class="grupo" >Carrera: <br>
        <select class="inputform" name="carrera">
            @foreach ($carreras as $carrera)
                <option value="{{ $carrera->id }}">{{ $carrera->nombre_carrera }}</option>
            @endforeach
        </select>

    </div>

    <input type="hidden" name="tipo" value="REGULAR">

    <br>

    <!-- Datos de salud a partir de acá -->


    <div class="grupo" >¿Posee el secundario completo?: <br>
        <select class="inputform" name="salud1">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>
    </div>


    <br>

    <div class="grupo" >¿Cursa en otras Escuelas Municipales? Indique cuál: <br>
        <select class="inputform" name="salud2">
            <option value="No">No</option>
            <option value="CAPACYT">CAPACYT</option>
            <option value="EMAC">EMAC</option>
            <option value="Otra">Otra</option>
        </select>
    </div>

    <br>

    <div class="grupo" >Grupo y factor sanguíneo: <br>
    <input class="inputform" type="text" name="salud3">
    </div>

    <br>

    <div class="grupo" >¿Está actualmente o estuvo en tratamiento médico? Indique cuál: <br>
    <input class="inputform" type="text" name="salud4">
    </div>

    <br>

    <div class="grupo" >¿Posee algún diagnóstico médico particular? <br>
    <input class="inputform" type="text" name="salud5">
    </div>

    <br>

    <div class="grupo" >¿Está actualmente o estuvo en tratamiento psicológico? Indique cuál: <br>
    <input class="inputform" type="text" name="salud6">
    </div>

    <br>

    <div class="grupo" >¿Presenta problemas respiratorios? Indique cuáles: <br>
    <input class="inputform" type="text" name="salud7">
    </div>

    <br>

    <div class="grupo" >¿Presenta problemas cardíacos? Indique cuales: <br>
    <input class="inputform" type="text" name="salud8">
    </div>

    <br>

    <div class="grupo" >¿Presenta Hipertensión o hipotensión arterial? <br>
        <select class="inputform" name="salud9">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>
    </div>

    <br>

    <div class="grupo" >¿Toma alguna medicación? Indique diagnóstico, tipo de medicación y suministro: <br>
    <input class="inputform" type="text" name="salud10">
    </div>

    <br>

    <div class="grupo" >¿Presenta algún otro problema físico o de salud? <br>
    <input class="inputform" type="text" name="salud11">
    </div>

    <br>

    <div class="grupo" >¿Posee intervenciones quirúrgicas? Indique cuáles: <br>
    <input class="inputform" type="text" name="salud12">
    </div>

    <br>

    <div class="grupo" >¿Tiene alergias? Indique a qué: <br>
    <input class="inputform" type="text" name="salud13">
    </div>

    <br>

    <div class="grupo" >¿Tiene epilepsia?<br>
        <select class="inputform" name="salud14">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>
    </div>

    <br>

   <div class="grupo" >¿Posee vacunas al día según calendario nacional de vacunación?<br>
        <select class="inputform" name="salud15">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>
    </div>

    <br>

    <div class="grupo" >¿Tuvo Covid 19? Indique fecha <br>
    <input class="inputform" type="text" name="salud16">
    </div>

    <br>

    <div class="grupo" >(Covid) Indique si es esquema incompleto- esquema completo- esquema con refuerzo: <br>
        <select class="inputform" name="salud17">
            <option value="Esquema incompleto">Esquema incompleto</option>
            <option value="Esquema completo">Esquema completo</option>
            <option value="Esquema con refuerzo">Esquema con refuerzo</option>
        </select>
    </div>

    <br>

    <div class="grupo" >¿Posee cobertura médica?<br>
        <select class="inputform" name="salud18">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>
    </div>

     <br>

    <div class="grupo" >Indique nombre de obra social y/o prepaga:<br>
    <input class="inputform" type="text" name="salud19">
    </div>

     <br>

    <div class="grupo" >Nº de afiliado<br>
    <input class="inputform" type="text" name="salud20">
    </div>

    <br>

    <div class="grupo" >¿Declara estar apto psico-físicamente para realizar estudios vocales, instrumentales y físicos clases?<br>
        <select class="inputform" name="salud21">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>
    </div>

    <br><br><br><br><br>

    <div class="grupo" style="font-weight: 800; font-size: 26px; " >En caso de emergencia, llamar a...</div>
    <br>

    <div class="grupo" >Apellido: <br>
    <input class="inputform" type="text" name="salud22">
    </div>

    <br>

    <div class="grupo" >Nombre: <br>
    <input class="inputform" type="text" name="salud23">
    </div>

    <br>

    <div class="grupo" >Teléfono: <br>
    <input class="inputform" type="number" name="salud24">
    </div>

    <br>

    <div class="grupo" >Parentesco / vínculo: <br>
    <input class="inputform" type="text" name="salud25">
    </div>

    <br>

    <div class="grupo" >De ser necesario, trasladar a: <br>
    <input class="inputform" type="text" name="salud26">
    </div>

    <br>

    <div class="grupo" >Dirección del lugar a trasladar: <br>
    <input class="inputform" type="text" name="salud27">
    </div>

    <br>

    <div class="grupo" >Teléfono del lugar a trasladar: <br>
    <input class="inputform" type="number" name="salud28">
    </div>

    <br><br>

    <button class="botonformulario" type="submit"><span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                send
                </span> Inscribirme</button>

    </div>

    <br><br>    

</form>


</center>

<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema </p>

<script>
        // Esta función se ejecuta cuando se carga la página
        window.onload = function() {
            // Obtener todos los elementos de entrada del formulario
            var form = document.getElementById("miFormulario");
            var elements = form.elements;

            // Iterar a través de los elementos y agregar el atributo 'required'
            for (var i = 0; i < elements.length; i++) {
                elements[i].setAttribute("required", "true");
            }
        }
    </script>


<script>
$(document).ready(function() {
  // Escucha el evento de cambio en los campos de entrada
  $('input[type="text"]').on('input', function() {
    // Verifica si el campo actual es el campo de excepción
    if ($(this).attr('id') !== 'convertirAMinusculas') {
      var inputValue = $(this).val();
      var modifiedValue = inputValue.toUpperCase().replace(/[ÁÉÍÓÚáéíóúÜüÄËÏÖÜäëïöü`´]/g, function(letter) {
        // Mapea las vocales con caracteres especiales a su versión sin tilde o dieresis
        var vowelsWithAccent = 'ÁÉÍÓÚáéíóúÜüÄËÏÖÜäëïöü';
        var vowelsWithoutAccent = 'AEIOUaeiouUuAEIOUaeiouUu';
        var index = vowelsWithAccent.indexOf(letter);
        return vowelsWithoutAccent.charAt(index);
      });
      $(this).val(modifiedValue);
    }
  });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
<script src="https://localhost/edusistema/public/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</body>
</html>
