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
                          <span class="titulofuncion">PASO 2 DEL FORM</span>

                          
                        </div>
                        @includeif('partials.errors')
                        <form class="form formulario" method="POST" action="../public/adm2023divox/guardar-datos-de-salud" enctype="multipart/form-data">
                            @csrf

                            <form action="{{ route('guardar_profesores') }}" method="POST">
        @csrf


        <div class="row" ></div>

        <div class="form-group center col-4">
            <label for="presidente">Presidente</label>
        <select name="presidente" id="presidente">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}">{{ $profesor->apellido }}, {{ $profesor->nombre }}</option>
            @endforeach
        </select>
        </div>    

        <div class="form-group center col-4">
            <label for="vocal1">Vocal 1</label>
        <select name="vocal1" id="vocal1">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}">{{ $profesor->apellido }}, {{ $profesor->nombre }}</option>
            @endforeach
        </select>
        </div>    


        <div class="form-group center col-4">
            <label for="vocal2">Vocal 2</label>
        <select name="vocal2" id="vocal2">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}">{{ $profesor->apellido }}, {{ $profesor->nombre }}</option>
            @endforeach
        </select>
        </div>    






        <h2>Profesor 1</h2>
        
        <br>
        <!-- Agrega aquí otros campos para el profesor 1 -->
        <label for="campo_extra1">Campo Extra 1:</label>
        <input type="text" name="campo_extra1" required>
        <br>
        
        <h2>Profesor 2</h2>
        <label for="profesor2">Profesor 2:</label>
        <select name="dni_profesor2" id="profesor2">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}">{{ $profesor->apellido }}, {{ $profesor->nombre }}</option>
            @endforeach
        </select>
        <br>
        <!-- Agrega aquí otros campos para el profesor 2 -->
        <label for="campo_extra2">Campo Extra 2:</label>
        <input type="text" name="campo_extra2" required>
        <br>

        <h2>Profesor 3</h2>
        <label for="profesor3">Profesor 3:</label>
        <select name="dni_profesor3" id="profesor3">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->dni }}">{{ $profesor->apellido }}, {{ $profesor->nombre }}</option>
            @endforeach
        </select>
        <br>
        <!-- Agrega aquí otros campos para el profesor 3 -->
        <label for="campo_extra3">Campo Extra 3:</label>
        <input type="text" name="campo_extra3" required>
        <br>

        <input type="submit" value="Guardar">
    </form>

                             <button type="submit" class="botonformulario">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                done
                </span>

            <span>Seleccionar<span></button>

                </div>

                        </form>

</div>





@endsection