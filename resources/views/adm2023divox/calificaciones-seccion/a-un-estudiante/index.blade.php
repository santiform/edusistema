@extends('adm2023divox.layouts.app')


@section('content')
   

                

<style type="text/css">

    html {
  overflow-x: hidden;
}
    
    button {

        background-color: transparent;
        border: none;
    }

    a {

        text-decoration: none;
    }


    td:hover {

        text-decoration: underline;
        cursor: pointer;
         color: #F4F4F4!important;
    }

    a {

        text-decoration: none;
         color: #F4F4F4!important;
    }

</style>

 <div class="divbotonatras">
                <a href="https://emmu.edusistema.com.ar/adm2023divox/calificaciones-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Asignar calificación a un Estudiante</span>

                          
                        </div>



                        <div class="center divinputfuncion" >
                  <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
                        </div>
                        @includeif('partials.errors')


                        <div class="container-fluid" style="max-width: 82vw;" >
                        <div class="table-responsive">
                            <table class="table table-bordered search-table search-table" >
                                <thead class="thead">
                                    <tr>                                             
                                        <th>HACE CLICK EN ALGUN/A ESTUDIANTE PARA SELECCIONARLO/A</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    
                                    @foreach ($estudiantes as $estudiante)       

                                        <tr>                         

                                            <td>
                                                <a href="{{ route('calificacionesEstudiante2', ['dni' => $estudiante->dni]) }}">



                                                {{ $estudiante->apellido }}, {{ $estudiante->nombre }}

                                            </a>

                                            </td>

                                            

                                         
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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


@if (session('crear')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Calificación agregada correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif


@endsection