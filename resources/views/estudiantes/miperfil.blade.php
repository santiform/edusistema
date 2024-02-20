@include('estudiantes.includes.headerestudiantes')

<center>
    <br>

    <a class="botonformulario" href="https://localhost/edusistema/public/password/reset">
                <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                    key
                </span>
                Restablecer mi contraseña
            </a>

    <br><br><br>

    <a class="botonformulario" href="https://localhost/edusistema/public/estudiantes/inscripciones/reinscripciones/datos-de-salud">
                <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                    health_and_safety
                </span>
                Modificar mis datos de salud
            </a>

    <br><br><br>

    @if ($edad === "menor")    
    <a class="botonformulario" href="https://localhost/edusistema/public/estudiantes/inscripciones/reinscripciones/retiro-de-menores">
                <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                    diversity_3
                </span>
                Modificar mis datos de retiro
            </a> 

    <br><br><br>
    @endif

    <h1>Editar mis datos personales</h1>

    <div class="formularioestudiantes" style="paddindg-top: -3rem; width: 35rem;" >

        <form class="alerta-editar" action=" mi-perfil/editar" method="POST">
        @csrf
        @method('POST')

        <div class="grupo" style="font-size: 22px">
            DNI: {{ $datos->dni }} <br>
            {{ $datos->apellido }} {{ $datos->nombre }}
        </div>

        <br>

        <hr>

        <br>

        <input class="inputform" type="hidden" value="{{ $datos->apellido }}" name="apellido">

        <input class="inputform" type="hidden" value="{{ $datos->nombre }}" name="nombre">

        <div class="grupo" >
            Fecha de nacimiento:
            <input class="inputform" type="date" value="{{ $datos->nacimiento }}" name="nacimiento">
        </div>

        <br>

        <div class="grupo" >
            Celular:
            <input class="inputform" type="number" value="{{ $datos->celular }}" name="celular">
        </div>

        <br>

        <div class="grupo" >
            Email:
            <input class="inputform" type="text" value="{{ $datos->mail }}" name="mail">
        </div>

        <br>

        <div class="grupo" >
            Dirección:
            <input class="inputform" type="text" value="{{ $datos->direccion }}" name="direccion">
        </div>

        <br>
        
        <div class="grupo" >
            Localidad:
            <select class="inputform" type="text" value="{{ $datos->localidad }}" name="localidad">
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

        <button class="botonformulario" type="submit"><span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
           edit
        </span> Editar</button>

        </form>

    </div>

    <br><br>

</center>

<p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES -! </p>    


@include('estudiantes.includes.footerestudiantes')



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



<script type="text/javascript">

        $('.alerta-editar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: '¿Editar datos?',
              text: "¡Esta acción no se puede revertir!",
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#002D18',
              showCancelButton: true,
              confirmButtonColor: '#002D18',
              cancelButtonColor: '#003D20',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, editar',
              background: '#006D55',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });    

</script>




@if (session('editarPerfil')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: 'Datos personales modificados correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

@endif