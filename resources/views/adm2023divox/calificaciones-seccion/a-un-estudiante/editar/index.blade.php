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
                <a href="https://localhost/edusistema/public/adm2023divox/estudiantes/{{$estudiante->id}}/calificaciones">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Editando calificación a {{ $estudiante->apellido }}, {{ $estudiante->nombre }}</span>

                          
                        </div>
                        @includeif('partials.errors')


<div class="divcentrado" style="margin-top: -2.3rem;"  >
    <div class="formulario" style="padding-top: -2rem; width: 84rem;" >

        <form class="alerta-crear" action="{{ route('calificacionesEstudianteEditar1') }}" method="POST">
        @csrf  
        @method('PUT')   

        <input type="hidden" name="dni" value="<?php echo $estudiante->dni ?>">                                    


        <div class="row" >
            
        <div class="form-group center col-5">
            <label for="presidente">MATERIA</label>
        <select name="id_materia">
            @foreach($materias as $id => $nombre)
                 <option value="{{ $id }}" {{ $calificacion->id_materia == $id ? 'selected' : '' }}>{{ $nombre }}</option>
            @endforeach
        </select>
        </div>    


        <div class="form-group center col-2">
             <label for="nota_cuatri1">1er Cuatri</label>
            <input class="form-control center" type="text" name="nota_cuatri1" value="{{ $calificacion->nota_cuatri1 }}">
        </div>  

        <div class="form-group center col-2">
             <label for="nota_cuatri2">2do Cuatri</label>
            <input class="form-control center" type="text" name="nota_cuatri2" value="{{ $calificacion->nota_cuatri2 }}">
        </div>  

        <div class="form-group center col-3">
             <label for="nota_final">Nota final</label>
            <input class="form-control center" type="text" name="nota_final" value="{{ $calificacion->nota_final }}">
        </div> 

        <div class="form-group center col-3">
            <label for="estado">Estado</label>
       <select name="estado">
            <option value="APROBADO" {{ $calificacion->modalidad == 'APROBADO' ? 'selected' : '' }}>APROBADO</option>
            <option value="DESAPROBADO" {{ $calificacion->modalidad == 'DESAPROBADO' ? 'selected' : '' }}>DESAPROBADO</option>
            <option value="AUSENTE" {{ $calificacion->modalidad == 'AUSENTE' ? 'selected' : '' }}>AUSENTE</option>
        </select>
        </div>  

        <div class="form-group center col-3">
            <label for="modalidad">Modalidad</label>
       <select name="modalidad">
            <option value="REGULAR" {{ $calificacion->modalidad == 'REGULAR' ? 'selected' : '' }}>REGULAR</option>
            <option value="PREVIO" {{ $calificacion->modalidad == 'PREVIO' ? 'selected' : '' }}>PREVIO</option>
            <option value="LIBRE" {{ $calificacion->modalidad == 'LIBRE' ? 'selected' : '' }}>LIBRE</option>
        </select>
        </div>   


        <div class="form-group center col-3">
            <label for="presidente">Libro</label>
        <select name="tomo">
            <option value="1 FINALES" {{ $calificacion->tomo == '1 FINALES' ? 'selected' : '' }}>1 FINALES</option>
            <option value="2 FINALES" {{ $calificacion->tomo == '2 FINALES' ? 'selected' : '' }}>2 FINALES</option>
            <option value="3 FINALES" {{ $calificacion->tomo == '3 FINALES' ? 'selected' : '' }}>3 FINALES</option>
            <option value="4 FINALES" {{ $calificacion->tomo == '4 FINALES' ? 'selected' : '' }}>4 FINALES</option>
            <option value="5 FINALES" {{ $calificacion->tomo == '5 FINALES' ? 'selected' : '' }}>5 FINALES</option>
            <option value="6 FINALES" {{ $calificacion->tomo == '6 FINALES' ? 'selected' : '' }}>6 FINALES</option>
            <option value="7 FINALES" {{ $calificacion->tomo == '7 FINALES' ? 'selected' : '' }}>7 FINALES</option>
            <option value="1 PROMOCIONALES" {{ $calificacion->tomo == '1 PROMOCIONALES' ? 'selected' : '' }}>1 PROMOCIONALES</option>
            <option value="2 PROMOCIONALES" {{ $calificacion->tomo == '2 PROMOCIONALES' ? 'selected' : '' }}>2 PROMOCIONALES</option>
            <option value="3 PROMOCIONALES" {{ $calificacion->tomo == '3 PROMOCIONALES' ? 'selected' : '' }}>3 PROMOCIONALES</option>
            <option value="4 PROMOCIONALES" {{ $calificacion->tomo == '4 PROMOCIONALES' ? 'selected' : '' }}>4 PROMOCIONALES</option>
            <option value="5 PROMOCIONALES" {{ $calificacion->tomo == '5 PROMOCIONALES' ? 'selected' : '' }}>5 PROMOCIONALES</option>
        </select>
        </div> 

        <div class="form-group center col-3">
             <label for="pagina">Página</label>
            <input class="form-control center" type="number" name="pagina" value="{{ $calificacion->pagina }}">
        </div> 


        </div>




        
        <div class="row" >

        <div class="col-4" ></div>    

        <div class="col-4" > 
                <button type="submit" class="botonformulario">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                edit
                </span>

            <span>Editar calificación</span></button>

            </div> 

        <div class="col-4" ></div>  

        </div>    


              

                        </form>

</div>
</div>




@endsection

@section('js')

<script type="text/javascript">


        $('.alerta-crear').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: 'Editando calificación',
              text: "¿Editar?",
              color: '#F4F4F4',
              icon: 'question',

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

@endsection