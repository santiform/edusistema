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
                <a href="https://emmu.edusistema.com.ar/adm2023divox/catedras">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Modificando Cátedra ID : {{ $catedra->id }}</span>

                          
                        </div>
                        @includeif('partials.errors')
                        <form class="alerta-editar" method="POST" action="{{ route('catedras.update', $catedra->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('adm2023divox.catedra.form')

                        </form>
                


@endsection    




@section('js')



<script type="text/javascript">

        $('.alerta-editar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: 'Modificando cátedra',
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
