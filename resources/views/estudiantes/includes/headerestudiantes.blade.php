<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<link rel="icon" type="image/webp" href="https://emmu.edusistema.com.ar/resources/img/logo.webp">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>EduSistema - Estudiantes</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  <link rel="stylesheet" type="text/css" href="https://emmu.edusistema.com.ar/resources/librerias/styleestudiantes.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
      
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


<style type="text/css">
		
		a{ text-decoration:none; color:#f4f4f4 }
		a:hover{  color:#ededed }

</style>


<div class="divhoja" >

	<div class="header" >  

		<div class="container" style="padding-bottom: -0.8rem;"  >


				<div class="col titulosh1" style="font-size: 24px!important; font-weight: 600!important"  ><a href="https://emmu.edusistema.com.ar/estudiantes" >EduSistema | Estudiantes</a></div>


				<div class="col columna botonytexto" style="margin-top:-1rem!important"  >

					<span class="material-icons" style="vertical-align: middle;">
					account_circle
					</span>


					<span>{{ Auth::user()->name }}</span>
				</div>



				<div class="col botonytexto" > 

						<a href="https://emmu.edusistema.com.ar/estudiantes/mi-perfil" >

        
            <span class="material-icons" style="vertical-align: middle;">
              edit
            </span> 

            <span class="texto-icono" style="vertical-align: middle;">Editar Mi Perfil</span>
 
                    </a>
				</div>


				<div class="col botonytexto cerrar" style="margin-top: 0.5rem!important" >





					@guest
        	@else

          <a href="https://emmu.edusistema.com.ar/estudiantes/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

        
            <span class="material-icons" style="vertical-align: middle;">
              power_settings_new
            </span> 

            <span class="texto-icono" style="vertical-align: middle;">Cerrar sesión</span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>         
                    </a>


               @endguest


					

				</div>

				


		</div>		

	</div>

<div class="sepheader" ></div>