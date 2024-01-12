@include('docentes.includes.headerdocentes')

<center>
<h1>DATOS DE SALUD</h1>
<form id="miFormulario" class="form" method="POST" action="https://emmu.edusistema.com.ar/docentes/datos-de-salud/guardar-datos" enctype="multipart/form-data">
    @csrf

    <div class="formularioestudiantes" style="padding-top: -2rem;" >

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

    <div class="grupo" >¿Declara estar apto psico-físicamente para realizar esta actividad docente?<br>
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
                </span> Enviar</button>

    </div>

    <br><br>    

</form>


</center>

<p style="color: transparent;" > EduSistema DOCENTES - EduSistema DOCENTES - 
    EduSistema DOCENTES DOCENTES  -! </p>

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

<div style="height: 1rem" ></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
<script src="https://emmu.edusistema.com.ar/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</body>
</html>
