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

                    .boton2 {
                    min-height: 160px;
                    min-width: 160px;
                    margin-inline: 3.4rem;
                    margin-top: 0.4rem;
                    margin-bottom: 0.4rem;
                    font-size: 1.4rem;
                        }


                        .grow-div {
                          /* Estilos normales del div */

                          margin-top: 60px;
                          width: 210px;
                        }

                        .grow-div:hover {
                          /* Estilos cuando el cursor pasa sobre el div */
                          transform: scale(1.1); /* Aplica un escalamiento del 110% */
                          transition: transform 0.4s ease-in-out; /* Añade una transición suave de 0.2 segundos */

                        }
                        
</style>


<?php use Carbon\Carbon; ?>


               <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/profesores-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Profesores</span>

                          <a href="{{ route('profesores.create') }}" style="margin-left: 0.5rem;">
                            <span class=" material-icons2">
                              add_circle_outline
                            </span>
                          </a>
                        </div>

                        <div class="center divinputfuncion" >
                  <input type="text" class="inputfuncion" id="search" placeholder="Buscar...">
                        </div>




    <div class="container-fluid" style="max-width: 95vw;" >
                        <div class="table-responsive">
                            <table class="table table-bordered search-table">
                                <thead class="thead">
                                    <tr>
                                        
										<th>DNI</th>
										<th>APELLIDO</th>
										<th>NOMBRE</th>
										<th>NACIMIENTO</th>
										<th>CELULAR</th>
										<th>EMAIL</th>
										<th>INGRESO</th>
                                        <th>HORAS</th>

                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profesores as $profesore)



                                    @php
                                        $fechaDB = $profesore->nacimiento;

                                            $fechaVieja = Carbon::createFromFormat('Y-m-d', $fechaDB);

                                            $fecha = $fechaVieja->format('d/m/Y');
                                    @endphp  
                                        <tr>
                                            
											<td>{{ $profesore->dni }}</td>
											<td>{{ $profesore->apellido }}</td>
											<td>{{ $profesore->nombre }}</td>
											<td>{{ $fecha }}</td>
											<td>{{ $profesore->celular }}</td>
											<td>{{ $profesore->mail }}</td>
											<td>{{ $profesore->ingreso }}</td>
                                            <td>{{ $profesore->horas }}</td>

                                            <td>
                                                 <form style="margin-top: 0.1rem" class="alerta-eliminar" action="{{ route('profesores.destroy',$profesore->id) }}" method="POST">

                                                    <a style="text-decoration: none!important" href="{{ route('profesores.show',$profesore->id) }}"><span class=" material-icons-small">
                                                        visibility
                                                        </span></a> 

                                                       

                                                    <a style="text-decoration: none!important" href="{{ route('profesores.edit',$profesore->id) }}"><span class=" material-icons-small">
                                                        edit
                                                        </span></a> 

                                                       

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
              title: '¿Eliminar profesor/a?',
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
          title: 'Profesor/a eliminado correctamente',
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
          title: 'Profesor/a agregado correctamente',
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
          title: 'Profesor/a modificado correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif


      

@endsection