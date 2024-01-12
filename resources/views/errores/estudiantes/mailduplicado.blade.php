<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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


        </div>      

    </div>

            <center>
          <h1>El mail "<b>{{ $email }}</b>" ya está registrado en nuestro Sistema, tenés que usar uno distinto.</h1>
          
          
        </center>

        <p style="color: transparent;" > EduSistema ESTUDIANTES - EduSistema ESTUDIANTES - 
    EduSistema ESTUDIANTES  -! </p>
        
<div style="height: 1rem" ></div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
<script src="https://emmu.edusistema.com.ar/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</body>
</html>
