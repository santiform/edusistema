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
                <a href="https://emmu.edusistema.com.ar/adm2023divox/nueva-fecha-examen">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Creando nueva fecha de examen para la Cátedra {{ $catedra->id }}</span>

                          
                        </div>
                        @includeif('partials.errors')


<div class="divcentrado" style="margin-top: -2.3rem;"  >
    <div class="formulario" style="padding-top: -2rem; width: 65rem;" >

        <form class="alerta-crear" action="{{ route('adm2023divox.formularios.nuevafechaexamen3') }}" method="POST">
        @csrf

        <div class="center" style="font-size: 20px; font-weight: 600; margin-bottom: 0.3rem; color: #7B2A28" >
        {{ $materia->nombre_materia}}  <br>

        {{ $profesoracargo->apellido }}, {{ $profesoracargo->nombre }} - {{ $catedra->dia1 }} de 
                                            {{ $catedra->hora_comienzo_dia1 }} a 
                                            {{ $catedra->hora_finalizacion_dia1 }}

                                            @if($catedra->dia2 != '-')
                                                
                                                y 
                                            {{ $catedra->dia2 }} de 
                                            {{ $catedra->hora_comienzo_dia2 }} a 
                                            {{ $catedra->hora_finalizacion_dia2 }}

                                            @endif</div>

        <input type="hidden" name="catedra" value="<?php echo $catedra->id ?>">                                    

        <input type="hidden" name="materia" value="<?php echo $materia->id ?>">                                    


        <div class="row" >
            
        <div class="form-group center col-4">
            <label for="presidente">PRESIDENTE</label>
        <select name="presidente" id="presidente">
            
            @foreach($profesores as $profesor)
                <option value="<?php echo $profesor->dni ?>">{{ $profesor->apellido }}, {{ $profesor->nombre }}</option>
            @endforeach
        </select>
        </div>    

        <div class="form-group center col-4">
            <label for="vocal1">VOCAL 1</label>
        <select name="vocal1" id="vocal1">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}">{{ $profesor->apellido }}, {{ $profesor->nombre }}</option>
            @endforeach
        </select>
        </div>    


        <div class="form-group center col-4">
            <label for="vocal2">VOCAL 2</label>
        <select name="vocal2" id="vocal2">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}">{{ $profesor->apellido }}, {{ $profesor->nombre }}</option>
            @endforeach
        </select>
        </div>    


        </div>


         <div class="row" >

        <div class="form-group center col-3">
             <label for="aula">AULA</label>
            <input class="form-control center" type="text" name="aula">
        </div>    

        <div class="form-group center col-3">
             <label for="fecha">FECHA</label>
            <input class="form-control center" type="date" name="fecha">
        </div>


        <div class="form-group center col-3">
            <label for="hora_comienzo">HORA COMIENZO</label>
             <input class="form-control center" type="text" name="hora_comienzo">   
        </div>


        <div class="form-group center col-3">
            <label for="hora_finalizacion">HORA FINALIZACION</label>
             <input class="form-control center" type="text" name="hora_finalizacion">   
        </div>


        </div>




        
        <div class="row" >

        <div class="col-4" ></div>    

        <div class="col-4" > 
                <button type="submit" class="botonformulario">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                today
                </span>

            <span>Crear fecha examen</span></button>

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
              title: 'Agregando fecha de examen',
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