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

</style>

 <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/profesores">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Agregando nuevo/a profesor/a</span>

                          
                        </div>
                        @includeif('partials.errors')
                        <form class="alerta-crear" method="POST" action="{{ route('profesores.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('adm2023divox.profesore.form')

                        </form>
                    
@endsection





@section('js')

<script type="text/javascript">


        $('.alerta-crear').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: 'Agregando profesor/a',
              text: "¿Crear nuevo profesor/a?",
              color: '#F4F4F4',
              icon: 'question',

              iconColor: '#A32226',
              showCancelButton: true,
              confirmButtonColor: '#A5413F',
              cancelButtonColor: '#EE7873',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, crear',
              background: '#E45D58',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });
    
    

</script>

@endsection
