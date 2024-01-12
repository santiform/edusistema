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
                <a href="https://emmu.edusistema.com.ar/adm2023divox/calificaciones-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Agregando calificación a {{ $estudiante->apellido }}, {{ $estudiante->nombre }}</span>

                          
                        </div>
                        @includeif('partials.errors')


<div class="divcentrado" style="margin-top: -2.3rem;"  >
    <div class="formulario" style="padding-top: -2rem; width: 84rem;" >

        <form class="alerta-crear" action="{{ route('calificacionesEstudiante3') }}" method="POST">
        @csrf   

        <input type="hidden" name="dni" value="<?php echo $estudiante->dni ?>">                                    


        <div class="row" >
            
        <div class="form-group center col-5">
            <label for="presidente">MATERIA</label>
        <select name="id_materia">
            @foreach($materias as $id => $nombre)
                 <option value="{{ $id }}">{{ $nombre }}</option>
            @endforeach
        </select>
        </div>    


        <div class="form-group center col-2">
             <label for="nota_cuatri1">1er Cuatri</label>
            <input class="form-control center" type="text" name="nota_cuatri1">
        </div>  

        <div class="form-group center col-2">
             <label for="nota_cuatri2">2do Cuatri</label>
            <input class="form-control center" type="text" name="nota_cuatri2">
        </div>  

        <div class="form-group center col-3">
             <label for="nota_final">Nota final</label>
            <input class="form-control center" type="text" name="nota_final">
        </div> 



       </div>




       <div class="row" >

       <div class="form-group center col-3">
            <label for="estado">ESTADO</label>
       <select name="estado">
            <option value="APROBADO">APROBADO</option>
            <option value="DESAPROBADO">DESAPROBADO</option>
            <option value="AUSENTE">AUSENTE</option>
        </select>
        </div>

        <div class="form-group center col-3">
            <label for="modalidad">Modalidad</label>
       <select name="modalidad">
            <option value="REGULAR">REGULAR</option>
            <option value="PREVIO">PREVIO</option>
            <option value="LIBRE">LIBRE</option>
        </select>
        </div>   


        <div class="form-group center col-3">
            <label for="presidente">Libro</label>
        <select name="tomo">
            <option value="1 FINALES">1 FINALES</option>
            <option value="2 FINALES">2 FINALES</option>
            <option value="3 FINALES">3 FINALES</option>
            <option value="4 FINALES">4 FINALES</option>
            <option value="5 FINALES">5 FINALES</option>
            <option value="6 FINALES">6 FINALES</option>
            <option value="7 FINALES">7 FINALES</option>
            <option value="1 PROMOCIONALES">1 PROMOCIONALES</option>
            <option value="2 PROMOCIONALES">2 PROMOCIONALES</option>
            <option value="3 PROMOCIONALES">3 PROMOCIONALES</option>
            <option value="4 PROMOCIONALES">4 PROMOCIONALES</option>
            <option value="5 PROMOCIONALES">5 PROMOCIONALES</option>
        </select>
        </div> 

        <div class="form-group center col-3">
             <label for="pagina">Página</label>
            <input class="form-control center" type="number" name="pagina">
        </div> 


        </div>




        
        <div class="row" >

        <div class="col-4" ></div>    

        <div class="col-4" > 
                <button type="submit" class="botonformulario">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                add_box
                </span>

            <span>Agregar calificación</span></button>

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
              title: 'Agregando calificación',
              text: "¿Crear registro?",
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