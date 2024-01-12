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


    a {

        text-decoration: none;
         color: #F4F4F4!important;
    }

</style>

 <div class="divbotonatras">
                <a href="https://emmu.edusistema.com.ar/adm2023divox/inscripciones-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">LINKS DE INSCRIPCIONES PARA COMPARTIR</span>

                          
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
                                        <th>Función</th>
                                        <th>Link</th>

                                    </tr>
                                </thead>
                                <tbody>

                                        <tr>                         
                                            <td>Reinscripciones regulares para 2024</td>
                                            <td><a href="https://emmu.edusistema.com.ar/formulario" target="blank">https://emmu.edusistema.com.ar/formulario</a></td>
                                         
                                        </tr>

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