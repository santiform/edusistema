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




<?php  

use Carbon\Carbon;


?>



               <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/administracion-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Editar asistencia</span>

                          
                        </div>

                        <div class="divcentrado" style="margin-top: -2.3rem; "  >    
                          <div class="formulario" style="width: 35%;">
                          <div class="tituloconicono">
                          <span style="font-size: 20px"><b>{{ $asistencia->apellido_estudiante }}, {{ $asistencia->nombre_estudiante }}</b></span>



                        </div>

                        @includeif('partials.errors')
                        <form class="alerta-editar" method="POST" action="{{ route('asistencia.update', $asistencia->id) }}">
                            @csrf
                            @method('PUT')

                            <p class="nombremateria" style="text-align: center" >{{ $asistencia->nombre_materia }} <br>({{ $asistencia->apellido_profesor }} {{ $asistencia->nombre_profesor }})</p>

                            <hr>

                            <div class="row" >


                                <div class="col-6" >
                                    <div class="form-group" ><label for="fecha">Fecha:</label><br>
                                    <input style="width: 100%" type="date" name="fecha" id="fecha" value="{{ $asistencia->fecha }}" required></div>
                                </div>

                                <div class="col-6" >
                                    <div class="form-group">
                                        <label for="estado">Estado:</label>
                                        <select name="estado" id="estado" required>
                                            <option value="A" {{ $asistencia->estado == 'A' ? 'selected' : '' }}>Ausente</option>
                                            <option value="P" {{ $asistencia->estado == 'P' ? 'selected' : '' }}>Presente</option>
                                            <option value="AJ" {{ $asistencia->estado == 'AJ' ? 'selected' : '' }}>Ausente Justificado</option>
                                        </select>
                                    </div>
                                </div>    
              
                            </div>

                            <button type="submit" class="botonformulario">  

                            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                                edit
                                </span>

                            <span>Editar<span></button>


                        </form>

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

        $('.alerta-editar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: '¿Editar asistencia?',
              text: "¡Esta acción no se puede revertir!",
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#A32226',
              showCancelButton: true,
              confirmButtonColor: '#A5413F',
              cancelButtonColor: '#EE7873',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, editar',
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
          title: 'Estudiante eliminado correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif



           
    @if (session('crear')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Estudiante agregado correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif



              
    @if (session('editar')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#A32226',
          color: '#F4F4F4',
          background: '#E45D58',
          title: 'Estudiante modificado correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif

      

@endsection