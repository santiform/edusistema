@include('docentes.includes.headerdocentes')

<center>
    <br>

    <a class="botonformulario" href="https://localhost/edusistema/public/password/reset">
                <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                    key
                </span>
                Restablecer mi contraseña
            </a>

    <br><br><br>

    <a class="botonformulario" href="https://localhost/edusistema/public/docentes/datos-de-salud">
                <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                    health_and_safety
                </span>
                Modificar mis datos de salud
            </a>

    <br><br><br>

    <h1>Editar mis datos personales</h1>

    <div class="formularioestudiantes" style=" width: 35rem;" >

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
            Año de ingreso:
            <input class="inputform" type="text" value="{{ $datos->ingreso }}" name="ingreso" readonly>
        </div>

        <br>
        
        <div class="grupo" >
            Horas (Reloj) a cargo:
            <input class="inputform" type="text" value="{{ $datos->horas }}" name="horas" readonly>
        </div>

        <br>

        <button class="botonformulario" type="submit"><span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
           edit
        </span> Editar</button>

        </form>

    </div>

    <br><br>

</center>

<p style="color: transparent;" > EduSistema docentes - EduSistema docentes - EduSistema docentes - 
    EduSistema docentes -! </p>    


@include('docentes.includes.footerdocentes')



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

              iconColor: '#f4f4f4',
              showCancelButton: true,
              confirmButtonColor: '#002998',
              cancelButtonColor: '#002998',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, editar',
              background: '#00195E',
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
          iconColor: '#F4F4F4',
          color: '#F4F4F4',
          background: '#00195E',
          title: 'Datos personales modificados correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

@endif