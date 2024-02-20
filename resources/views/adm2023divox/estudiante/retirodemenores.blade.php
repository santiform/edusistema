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
      font-size: 16px;
    }


</style>





 <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/estudiantes/{{ $estudiante->id }}">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Datos de retiro de {{ $estudiante->apellido }}, {{ $estudiante->nombre }}</span>

                        </div>

    





<div class="container-fluid" style=" background-color: #EE7873; color: white; padding-top: 10px;">
    <div class="row">
        <div class="col-md-6" style="text-align: right; margin-left: -2rem;">
            <ul>
                <li><strong>Apellido de Padre, Madre o tutor:</strong></li>
                <li><strong>Nombre de Padre, Madre o tutor:</strong></li>
                <li><strong>DNI de Padre, Madre o tutor:</strong></li>
                <li><strong>Nacimiento de Padre, Madre o tutor:</strong></li>
                <li><strong>Dirección de Padre, Madre o tutor:</strong></li>
                <li><strong>Localidad de Padre, Madre o tutor:</strong></li>
                <li><strong>Teléfono de Padre, Madre o tutor:</strong></li>
                <li><strong>Email de Padre, Madre o tutor:</strong></li>
                <li><strong>¿Autoriza a su hijo/a a retirarse solo/a?</strong></li>
                <li><strong>Apellido persona autorizada a retiro Nº 1:</strong></li>
                <li><strong>Nombre persona autorizada a retiro Nº 1:</strong></li>
                <li><strong>DNI persona autorizada a retiro Nº 1:</strong></li>
                <li><strong>Teléfono persona autorizada a retiro Nº 1:</strong></li>
                <li><strong>Parentesco persona autorizada a retiro Nº 1:</strong></li>
                <li><strong>Apellido persona autorizada a retiro Nº 2:</strong></li>
                <li><strong>Nombre persona autorizada a retiro Nº 2:</strong></li>
                <li><strong>DNI persona autorizada a retiro Nº 2:</strong></li>
                <li><strong>Teléfono persona autorizada a retiro Nº 2:</strong></li>
                <li><strong>Parentesco persona autorizada a retiro Nº 2:</strong></li>
            </ul>
        </div>
        <!-- Agrega otra columna si es necesario -->

        <div class="col-md-6" style="margin-left: -2rem">
            <ul>
                @foreach ($data as $record)
                    @foreach ($record as $value)
                        <li>{{ $value }}</li>
                    @endforeach
                @endforeach

            </ul>
        </div>
    </div>
</div>




            
 
@endsection
