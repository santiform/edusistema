<div class="divcentrado" style="margin-top: -2.3rem;"  >
    <div class="formulario" style="padding-top: -2rem; width: 65rem;" >

                            <form action="{{ route('formularios.nuevafechaexamen3') }}" method="POST">
        @csrf

        <div class="center" style="font-size: 20px; font-weight: 600; margin-bottom: 0.3rem; color: #7B2A28" >
        {{ $materia->nombre_materia}}  <br>

        {{ $examenesFecha->apellido_profesor }}, {{ $examenesFecha->nombre_profesor }} - {{ $examenesFecha->dia1 }} de 
                                            {{ $examenesFecha->hora_comienzo_dia1 }} a 
                                            {{ $examenesFecha->hora_finalizacion_dia1 }}

                                            @if($examenesFecha->dia2 != '-')
                                                
                                                y 
                                            {{ $examenesFecha->dia2 }} de 
                                            {{ $examenesFecha->hora_comienzo_dia2 }} a 
                                            {{ $examenesFecha->hora_finalizacion_dia2 }}

                                            @endif</div>

        <input type="hidden" name="catedra" value="<?php echo $examenesFecha->id_catedra ?>">                                    

        <input type="hidden" name="materia" value="<?php echo $examenesFecha->id_materia ?>">                                    


        <div class="row" >
            
        <div class="form-group center col-4">
            <label for="presidente">PRESIDENTE</label>
        <select name="presidente" id="presidente">
            @foreach($profesores as $profesor)
                <option value="<?php echo $examenesFecha->dni_profesor ?>">{{ $examenesFecha->apellido_profesor }}, {{ $examenesFecha->nombre_profesor }}</option>
            @endforeach
        </select>
        </div>    

        <div class="form-group center col-4">
            <label for="vocal1">VOCAL 1</label>
        <select name="vocal1" id="vocal1">
            @foreach($profesores as $profesor)
                <option value="<?php echo $examenesFecha->dni_profesor ?>">{{ $examenesFecha->apellido_profesor }}, {{ $examenesFecha->nombre_profesor }}</option>
            @endforeach
        </select>
        </div>    


        <div class="form-group center col-4">
            <label for="vocal2">VOCAL 2</label>
        <select name="vocal2" id="vocal2">
            @foreach($profesores as $profesor)
                <option value="<?php echo $examenesFecha->dni_profesor ?>">{{ $examenesFecha->apellido_profesor }}, {{ $examenesFecha->nombre_profesor }}</option>
            @endforeach
        </select>
        </div>    


        </div>


         <div class="row" >

        <div class="form-group center col-4">
             <label for="fecha">FECHA</label>
            <input class="form-control center" type="date" name="fecha">
        </div>


        <div class="form-group center col-4">
            <label for="hora_comienzo">HORA COMIENZO</label>
             <input class="form-control center" type="text" name="hora_comienzo">   
        </div>


        <div class="form-group center col-4">
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

            <span>Crear fecha exámen</span></button>

            </div> 

        <div class="col-4" ></div>  

        </div>    


              

                        </form>

</div>
</div>