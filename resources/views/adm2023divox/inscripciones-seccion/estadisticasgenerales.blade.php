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

</style>



               <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/inscripciones-seccion/estadisticas">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   


    <div class="container-fluid">

        <h1 class="tituloseccion">INSCRIPCIONES ESTADISTICAS</h1>

<div style="height: 3rem;" ></div>


<div class="container-fluid" style="max-width: 79vw;">

        <div class="row justify-content-center">
            <div class="col-md-8 card-4">
                <h1 class="card-title-3">{{ $todos }}</h1>
                <p class="card-text-3">Inscriptos totales</p>    
            </div>
        </div>


        <div style="height: 4.5rem;" ></div>

        <div class="row justify-content-center" style="margin-right: -3.4rem;">

                <div class="col-md-4">
                    <div class="card-3">
                        <div class="card-body-3">
                            <!-- Aquí puedes mostrar los datos de cada columna -->
                            <h1 class="card-title-3">{{ $mayores }}</h1>
                            <p class="card-text-3">Adultos</p>
                            <!-- Agrega más campos según tus necesidades -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-3">
                        <div class="card-body-3">
                            <!-- Aquí puedes mostrar los datos de cada columna -->
                            <h1 class="card-title-3">{{ $menores }}</h1>
                            <p class="card-text-3">Niños</p>
                            <!-- Agrega más campos según tus necesidades -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-3">
                        <div class="card-body-3">
                            <!-- Aquí puedes mostrar los datos de cada columna -->
                            <h1 class="card-title-3">{{ $taller }}</h1>
                            <p class="card-text-3">Taller</p>
                            <!-- Agrega más campos según tus necesidades -->
                        </div>
                    </div>
                </div>

        </div>


<div style="height: 4.5rem;" ></div>


        <div class="row justify-content-center">
            @foreach($carreras as $carrera)
                <div class="col-md-3">
                    <div class="card-2">
                        <div class="card-body-2">
                            <!-- Aquí puedes mostrar los datos de cada columna -->
                            <h1 class="card-title-2">{{ $carrera->estudiante_count }}</h1>
                            <p class="card-text-2">{{ $carrera->nombre_carrera }}</p>
                            <!-- Agrega más campos según tus necesidades -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




    </div>



@endsection
