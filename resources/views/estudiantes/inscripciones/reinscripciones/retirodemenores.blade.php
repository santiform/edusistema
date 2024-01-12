@include('estudiantes.includes.headerestudiantes')

<center>
<h1>DATOS DE RETIRO DE MENORES</h1>
<p>Esta información debe ser completada por un <b>padre</b>, <b>madre</b> y/o <b>tutor</b> del estudiante.</p>
<form id="miFormulario" class="form" method="POST" action="../reinscripciones/retiro-de-menores/guardar-datos" enctype="multipart/form-data">
    @csrf

    <div class="formularioestudiantes" >

    <div class="grupo" >Apellido de Padre, Madre o tutor <br>
        (quien completa este formulario):
        <input class="inputform" type="text" name="retiro1">
    </div>


    <br>

    <div class="grupo" >Nombre de Padre, Madre o tutor <br>
        (quien completa este formulario):
        <input class="inputform" type="text" name="retiro2">
    </div>

    <br>

    <div class="grupo" >DNI de Padre, Madre o tutor:
    <input class="inputform" type="number" name="retiro3">
    </div>

    <br>

    <div class="grupo" >Nacimiento de Padre, Madre o tutor:
    <input class="inputform" type="date" name="retiro4">
    </div>

    <br>

    <div class="grupo" >Dirección de Padre, Madre o tutor: <br>
    <input class="inputform" type="text" name="retiro5">
    </div>

    <br>

    <div class="grupo" >Localidad de Padre, Madre o tutor:  <br>
        <select class="inputform" name="retiro6">
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

    <div class="grupo" >Teléfono de Padre, Madre o tutor: <br>
    <input class="inputform" type="number" name="retiro7">
    </div>

    <br>

    <div class="grupo" >Email de Padre, Madre o tutor: <br>
    <input class="inputform" type="text" name="retiro8">
    </div>

    <br>

    <div class="grupo" >¿Autoriza a su hijo/a a retirarse solo/a? <br>
        <select class="inputform" name="retiro9">            
            <option value="No">No</option>
            <option value="Sí">Sí</option>
        </select>
    </div>

    <br>

    <div class="grupo" >Apellido persona autorizada a retiro Nº 1: <br>
    <input class="inputform" type="text" name="retiro10">
    </div>

    <br>

    <div class="grupo" >Nombre persona autorizada a retiro Nº 1: <br>
    <input class="inputform" type="text" name="retiro11">
    </div>

    <br>

    <div class="grupo" >DNI persona autorizada a retiro Nº 1: <br>
    <input class="inputform" type="number" name="retiro12">
    </div>

    <br>

    <div class="grupo" >Teléfono persona autorizada a retiro Nº 1: <br>
    <input class="inputform" type="number" name="retiro13">
    </div>

    <br>

    <div class="grupo" >Parentesco persona autorizada a retiro Nº 1:<br>
    <input class="inputform" type="text" name="retiro14">
    </div>

    <br>

    <div class="grupo" >Apellido persona autorizada a retiro Nº 2:<br>
    <input class="inputform" type="text" name="retiro15">
    </div>

    <br>

    <div class="grupo" >Nombre persona autorizada a retiro Nº 2: <br>
    <input class="inputform" type="text" name="retiro16">
    </div>

    <br>

    <div class="grupo" >DNI persona autorizada a retiro Nº 2: <br>
    <input class="inputform" type="number" name="retiro17">
    </div>

    <br>

    <div class="grupo" >Teléfono persona autorizada a retiro Nº 2:<br>
    <input class="inputform" type="number" name="retiro18">
    </div>

     <br>

    <div class="grupo" >Parentesco persona autorizada a retiro Nº 2:<br>
    <input class="inputform" type="text" name="retiro19">
    </div>

    <br>

    <button class="botonformulario" type="submit"><span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                send
                </span> Enviar datos</button>

    </div>

    <br><br>    

</form>


</center>

<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES  -! </p>

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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
<script src="https://emmu.edusistema.com.ar/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</body>
</html>


