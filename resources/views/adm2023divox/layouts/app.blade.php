<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EduSistema - Admin</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="https://localhost/edusistema/resources/librerias/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
      
    <link rel="icon" type="image/webp" href="https://localhost/edusistema/resources/img/logo.webp">
  

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>



  <div class="container-fluid panel-izquierdo" style="width: 3.85rem;">



  <div class="row">



  <div class="list-group3 list-group-item">
    
    <button id="toggle-panel" class="boton" style="margin-left: 0.4rem; padding: 0.5rem; ">
      <span class="material-icons icon" style="font-size: 3em; color: white; vertical-align: middle;">
              menu
            </span>


    

  </button>

    </div>






      <div class="list-group2" style="padding:0.2rem; margin-top: -60px !important;">


        <a href="https://localhost/edusistema/public/adm2023divox" class="list-group-item">

          <button class="btn" style="padding: 0.5rem; margin-top: 2rem; ">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              home
            </span>

          

          </button>

        </a>


        <a href="https://localhost/edusistema/public/adm2023divox/administracion-seccion" class="list-group-item">

          <button class="btn " style="padding: 0.5rem;">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              computer
            </span>

           
          </button>
          
        </a>
        


        <a href="https://localhost/edusistema/public/adm2023divox/estudiantes" class="list-group-item">

          <button class="btn" style="padding: 0.5rem;">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              local_library
            </span>

           

          </button>
          
        </a>



        <a href="https://localhost/edusistema/public/adm2023divox/profesores-seccion" class="list-group-item">

          <button class="btn" style="padding: 0.5rem;">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              school
            </span>

           

          </button>
          
        </a>


        <a href="https://localhost/edusistema/public/adm2023divox/calificaciones-seccion" class="list-group-item">

          <button class="btn" style="padding: 0.5rem;">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              checklist
            </span>

          

          </button>
          
        </a>



                <a href="https://localhost/edusistema/public/adm2023divox/inscripciones-seccion" class="list-group-item">

          <button class="btn" style="padding: 0.5rem;">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              text_snippet
            </span>


          </button>
          
        </a>


        <a href="https://emmu.tresdefebrero.gob.ar/tickets/" target="blank" class="list-group-item">

          <button class="btn" style="padding: 0.5rem;">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              support
            </span>


          </button>
          
        </a>


        @guest
        @else

          <a href="https://localhost/edusistema/public/adm2023divox/logout" class="list-group-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

          <button class="btn" style="padding: 0.5rem; margin-top: 9.3rem; margin-left: -0.25rem;">

     
                    

        
            <span class="material-icons icon " style="font-size: 2.8em; color: white; vertical-align: middle;">
              power_settings_new
            </span> 

           
           


                    </a>


               @endguest

                           




      </div>





</div>




<div class="list-group hidden" style="padding:0.2rem; padding-top: 7.8rem!important;">
        
         <a href="https://localhost/edusistema/public/adm2023divox/" class="list-group-item">

          <button class="btn" style="padding: 0.5rem; ">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle; ">
              home
            </span>

            <span style="font-size: 18px; margin-left: 0.7rem; color: white; vertical-align: middle;">Inicio</span>

          </button>

        </a>


        <a href="https://localhost/edusistema/public/adm2023divox/administracion-seccion" class="list-group-item">

          <button class="btn" style="padding: 0.5rem;">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              computer
            </span>

            <span style="font-size: 18px; margin-left: 0.7rem; color: white; vertical-align: middle;">Administración</span>

          </button>

        </a>


        <a href="https://localhost/edusistema/public/adm2023divox/estudiantes" class="list-group-item">

          <button class="btn" style="padding: 0.5rem; margin-top: -0.05rem">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              local_library
            </span>

            <span style="font-size: 18px; margin-left: 0.7rem; color: white; vertical-align: middle;">Estudiantes</span>

          </button>
          
        </a>
      


        <a href="https://localhost/edusistema/public/adm2023divox/profesores-seccion" class="list-group-item">

          <button class="btn" style="padding: 0.5rem; margin-top: 0.05rem">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              school
            </span>

            <span style="font-size: 18px; margin-left: 0.7rem; color: white; vertical-align: middle;">Profesores</span>

          </button>
          
        </a>


                <a href="https://localhost/edusistema/public/adm2023divox/calificaciones-seccion" class="list-group-item">

          <button class="btn" style="padding: 0.5rem; margin-top: 0.02rem">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              checklist
            </span>

            <span style="font-size: 18px; margin-left: 0.7rem; color: white; vertical-align: middle;">Calificaciones</span>

          </button>
          
        </a>



                <a href="https://localhost/edusistema/public/adm2023divox/inscripciones-seccion" class="list-group-item">

          <button class="btn" style="padding: 0.5rem; ">
              
            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              text_snippet
            </span>

            <span style="font-size: 18px; margin-left: 0.7rem; color: white; vertical-align: middle;">Inscripciones</span>
            
          </button>
          
        </a>


        <a href="https://emmu.tresdefebrero.gob.ar/tickets/" target="blank" class="list-group-item">

          <button class="btn" style="padding: 0.5rem; margin-top: -0.05rem">

            <span class="material-icons icon" style="font-size: 2.8em; color: white; vertical-align: middle;">
              support
            </span>

            <span style="font-size: 18px; margin-left: 0.7rem; color: white; vertical-align: middle;">Soporte</span>


          </button>
          
        </a>


        @guest
        @else

          <a href="https://localhost/edusistema/public/adm2023divox/logout"  class="list-group-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

          <button class="btn" style="padding: 0.5rem; margin-top: 9.3rem; margin-left: -1.6rem;">

     
                    

        
            <span class="material-icons icon " style="font-size: 2.8em; color: white; vertical-align: middle;">
              power_settings_new
            </span> 

            <span style="font-size: 18px; margin-left: 0.7rem; color: white; vertical-align: middle;">Cerrar sesión</span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
           


                    </a>


               @endguest
            









    </div>
  </div>



<script type="text/javascript">
$(document).ready(function() {
  $('#toggle-panel').click(function() {
    $('.list-group').toggleClass('hidden');
  });
});

</script>



      </div>



<!-- con este script de abajo hacemos que no se peudan recibir minúsculas ni letras con tilde, utilizando jquery -->
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
<script src="https://localhost/edusistema/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>



    <div id="app" style="position: absolute; top: -1.5rem; left: 0; right: 0; bottom: 0; z-index: 0;">

        <main class="py-4" style="margin-left: 5.03rem;">

            @yield('content')
            @yield('js')

                     
        </main>
    </div>





</body>
</html>
