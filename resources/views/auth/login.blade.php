<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <link rel="icon" type="image/webp" href="https://localhost/edusistema/public/resources/img/logo.webp">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EduSistema</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="https://localhost/edusistema/resources/librerias/style.css">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
      


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>



 <style>
        .panel-izquierdo {
            margin-left: -5.5rem!important;
        }

       body {


  background-image: url('https://localhost/edusistema/resources/img/backgroundlogin.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  width: 100vw;
  height: 100vh;
  padding-bottom: -1rem;


       }
       
    </style>




<div class="container-fluid">
    <div class="row justify-content-center align-items-center">

            <div class="divlogin">      

                    <center>

                    <p style="font-size: 2.8rem; font-weight: 700; margin-top: -0.6rem;" >EduSistema</p>
                    <p style="margin-top: -1.2rem" >Plataforma Virtual</p>

                    </center>

                    <p style="font-weight: 300; font-size: 14px">Si es la primera vez que ingresás, por defecto la contraseña es tu teléfono Celular. <br>Recordá cambiar estas credenciales por razones de seguridad.</p>

                    

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        

                        <div class="row mb-3 center">
                            
                            <p style="margin-bottom: 0rem">Email</p>
                            
                            <div class="col-md-12 center">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 center" >

                            <p style="margin-bottom: 0rem">Contraseña</p>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 recordardatos">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recordar mis datos
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12" style="margin-top: -0.5rem">
                                <button type="submit" class="botonaccionlogin">
                                    <span class="material-icons">
                                        login
                                        </span>    

                                    <span style="margin-left: 0.5rem;" > Ingresar </span>
                                </button>

                          <div>      
                                <div class="col-md-12 center">
                                @if (Route::has('password.request'))
                                    <a class="btn" href="{{ route('password.request') }}">
                                        <p class="olvidar">Olvidé mi contraseña</p>
                                    </a>
                                @endif
                            </div>
                        </form>


                        </div></div></div></form>





<!-- con este script de abajo hacemos que no se peudan recibir minúsculas ni letras con tilde, utilizando jquery -->
<script>
$(document).ready(function() {
  // Escucha el evento de cambio en los campos de entrada
  $('input[type="text"]').on('input', function() {
    var inputValue = $(this).val();
    var modifiedValue = inputValue.toUpperCase().replace(/[ÁÉÍÓÚáéíóúÜüÄËÏÖÜäëïöüÑñ`´]/g, function(letter) {
      // Mapea las vocales con caracteres especiales a su versión sin tilde o dieresis
      var vowelsWithAccent = 'ÁÉÍÓÚáéíóúÜüÄËÏÖÜäëïöü';
      var vowelsWithoutAccent = 'AEIOUaeiouUuAEIOUaeiouUu';
      var index = vowelsWithAccent.indexOf(letter);
      return vowelsWithoutAccent.charAt(index);
    });
    $(this).val(modifiedValue);
  });
});

</script>

</body>
</html>
