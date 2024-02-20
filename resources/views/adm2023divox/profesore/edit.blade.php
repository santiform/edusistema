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
                <a href="https://localhost/edusistema/public/adm2023divox/profesores">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Modificando a profesor/a {{ $profesore->apellido }}</span>

                          
                        </div>
                        @includeif('partials.errors')
                        <form class="alerta-editar" method="POST" action="{{ route('profesores.update', $profesore->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('adm2023divox.profesore.form')

@endsection





@section('js')



<script type="text/javascript">

        $('.alerta-editar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: 'Modificando profesor/a',
              text: "¿Guardar los cambios?",
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#A32226',
              showCancelButton: true,
              confirmButtonColor: '#A5413F',
              cancelButtonColor: '#EE7873',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, guardar',
              background: '#E45D58',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });
    
    

</script>

@endsection

