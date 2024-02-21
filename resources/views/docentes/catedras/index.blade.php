@include('docentes.includes.headerdocentes')
  

          
              @foreach ($catedras as $catedra)
                  

                    <p class="nombremateria" >{{ $catedra->nombre_materia }}</p>
                    
                    <p class="horariodatos" >
                      

                {{ $catedra->dia1  }} de {{ $catedra->hora_comienzo_dia1  }} a {{ $catedra->hora_finalizacion_dia1  }} (AULA {{$catedra->aula}})</p>

                

                @if($catedra->dia2 != '-')
                <p class="horariodatos" >
                        {{ $catedra->dia2 }} de 
                        {{ $catedra->hora_comienzo_dia2 }} a 
                        {{ $catedra->hora_finalizacion_dia2 }}
                        (AULA {{$catedra->aula_dia2}})
                        </p>
                        @endif        
                  
              @endforeach
          
<p style="color: transparent;" > EduSistema DOCENTES - EduSistema DOCENTES - 
  EduSistema DOCENTES  -! EduSistema </p>


@include('docentes.includes.footerdocentes')




<!--  Activar esta alerta de SweetAlert si es necesario, lo dejo como modelo

@if (session('datosSaludCompletos')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#F4F4F4',
          color: '#F4F4F4',
          background: '#00195E',
          title: 'Datos de Salud recibidos correctamente',
          showConfirmButton: false,
          timer: 4000
        })

     </script> 
   



@endif    

-->


