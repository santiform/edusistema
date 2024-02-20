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
    overflow-x: hidden;
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

        <h1 class="tituloseccion">Inscripciones exámenes estadísticas</h1>

<div style="height: 2.5rem;" ></div>

<div class="center divinputfuncion" >
    <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
 </div>


    <div class="container-fluid" style="max-width: 94vw;" >
     <div class="table-responsive">
      <table class="table table-bordered search-table">
       <thead class="thead">
        <tr>

            <th>Estudiante</th>
            <th>Examen</th>
            <th>Presidente</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listadoDeInscriptos as $inscripto)
            <tr>
                <td>{{ $inscripto->apellido_estudiante }}, {{ $inscripto->nombre_estudiante }}</td>
                <td>{{ $inscripto->nombre_materia }} ({{ \Carbon\Carbon::parse($inscripto->fecha_examen)->format('d/m/Y') }})
</td>
                <td>{{ $inscripto->apellido_profesor }}, {{ $inscripto->nombre_profesor }}</td>

                <td>
                    <form action="{{ route('admEliminarInscripcionExamen', $inscripto->id_inscripcion) }}" class="alerta-eliminar" method="post">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" ><span class=" material-icons-small botoneliminar">
                            delete_forever
                            </span></a></button>
                    </form>
                </td>


            </tr>
        @endforeach
    </tbody>   
    </table>
    </div>
    </div>



<div style="height: 8rem;" ></div>



<div class="container-fluid" style="max-width: 93vw;">

        <div class="row justify-content-center">
            <div class="col-md-5 card-5">
                <h1 class="card-title-4">{{ $totalInscripciones }}</h1>
                <p class="card-text-4">Inscriptos totales</p>    
            </div>
        </div>


        <div style="height: 1.8rem;" ></div>


        <div class="row justify-content-center">
            @foreach ($conteoPorFecha as $conteo)
                <div class="col-md-2">
                    <div class="card-6">
                        <div class="card-body-2">
                            <!-- Aquí puedes mostrar los datos de cada columna -->
                            <h1 class="card-title-6" style="font-size: 45px; font-weight: 700">{{ $conteo->total_estudiantes }}</h1>
                            <p style="font-size: 17px!important; font-weight: 500; margin-bottom: -0.6rem">{{ $conteo->nombre_materia }}</p>
                            <hr>
                            <p style="margin-top: -0.6rem">{{ $conteo->apellido_profesor }}, {{ $conteo->nombre_profesor }}</p>
                            <p style="margin-top: -0.6rem">{{ \Carbon\Carbon::parse($conteo->fecha)->format('d/m/Y') }}</p>
                            <!-- Agrega más campos según tus necesidades -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



    </div>


 



@endsection


@section('js')

<!-- Agrega el código JavaScript y jQuery para implementar el filtro de búsqueda -->
<script>
$(document).ready(function(){
  $('#search').on('keyup', function(){
    var query = $(this).val().toLowerCase();
    $('.search-table tbody tr').filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
    });
  });
});
</script>



<script type="text/javascript">

        $('.alerta-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: '¿Eliminar inscripción?',
              text: "¡Esta acción no se puede revertir!",
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#A32226',
              showCancelButton: true,
              confirmButtonColor: '#A5413F',
              cancelButtonColor: '#EE7873',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, eliminar',
              background: '#E45D58',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });

</script>




@if (session('borrar')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'error',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Inscripción eliminada correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif




@endsection