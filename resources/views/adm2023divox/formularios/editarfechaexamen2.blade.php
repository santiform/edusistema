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

   .datoscatedra {

    font-size: 20px; font-weight: 700; margin-bottom: 0.3rem; color: #7B2A28

   }

   .datosolo {
    font-weight: 700;
    color: #7B2A28;

   }

</style>

 <div class="divbotonatras">
                <a href="https://localhost/edusistema/public/adm2023divox/examenes-fechas">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Editando fecha de examen para la Cátedra {{ $catedra->id }}</span>

                          
                        </div>
                        @includeif('partials.errors')


<div class="divcentrado" style="margin-top: -2.3rem;"  >
    <div class="formulario" style="padding-top: -2rem; width: 65rem;" >

        <form class="alerta-editar" action="{{ route('adm2023divox.formularios.editarfechaexamen3', ['id' => $fecha]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="center datoscatedra"  >DATOS DE CATEDRA</div>
        <div class="center">
        MATERIA: <span class="datosolo">{{ $materia->nombre_materia}} </span> &nbsp; &nbsp;|| &nbsp; &nbsp;

        PROFESOR: <span class="datosolo">{{ $profesoracargo->apellido }}, {{ $profesoracargo->nombre }} </span><br>

        HORARIO: {{ $catedra->dia1 }} de 
                                            {{ $catedra->hora_comienzo_dia1 }} a 
                                            {{ $catedra->hora_finalizacion_dia1 }}

                                            @if($catedra->dia2 != '-')
                                                
                                                y 
                                            {{ $catedra->dia2 }} de 
                                            {{ $catedra->hora_comienzo_dia2 }} a 
                                            {{ $catedra->hora_finalizacion_dia2 }}

                                            @endif

        <br>                                    
          --------------------------------------------------------                                     

        </div>          

                                        

        <input type="hidden" name="catedra" value="<?php echo $catedra->id ?>">                                    

        <input type="hidden" name="materia" value="<?php echo $materia->id ?>">       


                                     


        <div class="row" >
            
        <div class="form-group center col-4">
        <label for="presidente">PRESIDENTE</label>
        <select name="presidente" id="presidente">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}" @if($profesor->dni === $fecha->presidente) selected @endif>
                    {{ $profesor->apellido }}, {{ $profesor->nombre }}
                </option>
            @endforeach
        </select>
        </div>   

        <div class="form-group center col-4">
            <label for="vocal1">VOCAL 1</label>
        <select name="vocal1" id="vocal1">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}" @if($profesor->dni === $fecha->vocal1) selected @endif>
                    {{ $profesor->apellido }}, {{ $profesor->nombre }}
                </option>
            @endforeach
        </select>
        </div>    


        <div class="form-group center col-4">
            <label for="vocal2">VOCAL 2</label>
        <select name="vocal2" id="vocal2">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}" @if($profesor->dni === $fecha->vocal2) selected @endif>
                    {{ $profesor->apellido }}, {{ $profesor->nombre }}
                </option>
            @endforeach
        </select>
        </div>    


        </div>


         <div class="row" >

        <div class="form-group center col-3">
             <label for="aula">AULA</label>
            <input class="form-control center" type="text" name="aula" value="{{ $fecha->aula }}">
        </div>    

        <div class="form-group center col-3">
             <label for="fecha">FECHA</label>
            <input class="form-control center" type="date" name="fecha" value="{{ $fecha->fecha }}">
        </div>


        <div class="form-group center col-3">
            <label for="hora_comienzo">HORA COMIENZO</label>
             <input class="form-control center" type="text" name="hora_comienzo" value="{{ $fecha->hora_comienzo }}">   
        </div>


        <div class="form-group center col-3">
            <label for="hora_finalizacion">HORA FINALIZACION</label>
             <input class="form-control center" type="text" name="hora_finalizacion" value="{{ $fecha->hora_finalizacion }}">   
        </div>


        </div>




        
        <div class="row" >

        <div class="col-4" ></div>    

        <div class="col-4" > 
                <button type="submit" class="botonformulario">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                edit
                </span>

            <span>Modificar fecha examen</span></button>

            </div> 

        <div class="col-4" ></div>  

        </div>    


              

                        </form>

</div>
</div>



<script type="text/javascript">

        $('.alerta-editar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: 'Modificando fecha de examen',
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