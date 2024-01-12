<div class="divcentrado" style="margin-top: -2.3rem;"  >
    <div class="formulario" style="padding-top: -2rem; width: 60rem;" >
        

        <div class="row" style="margin-top: -1.6rem ; margin-bottom: 0.2rem; font-size: 18px;" >

        <div class="form-group col-6 center">
            <label for="id_materia">MATERIA</label>
            {{ Form::select('id_materia', $materias, $catedra->id_materia, [
                'class' => 'form-control' . ($errors->has('id_materia') ? ' is-invalid' : ''),
                'id' => 'id_materia'
            ]) }}
            {!! $errors->first('id_materia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-6 center">
          <label for="dni_profesor">PROFESOR/A</label>
          {{ Form::select('dni_profesor', $profesores, $catedra->dni_profesor, ['class' => 'form-control' . ($errors->has('dni_profesor') ? ' is-invalid' : '')]) }}
          {!! $errors->first('dni_profesor', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        </div>



        <div class="row" >

            <div class="form-group col-4 center">
            {{ Form::label('CUPOS') }}
            {{ Form::number('cupos', $catedra->cupos, ['class' => 'form-control center' . ($errors->has('cupos') ? ' is-invalid' : ''), 'placeholder' => 'Cupos']) }}
            {!! $errors->first('cupos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        

        <div class="form-group col-4 center">
            {{ Form::label('AULA DIA 1') }}
            {{ Form::text('aula', $catedra->aula, ['class' => 'form-control center' . ($errors->has('aula') ? ' is-invalid' : ''), 'placeholder' => 'Aula día 1']) }}
            {!! $errors->first('aula', '<div class="invalid-feedback">:message</div>') !!}
        </div>


     <div class="form-group col-4 center">
        {{ Form::label('AULA DIA 2') }}
        {{ Form::text('aula_dia2', $catedra->aula_dia2, ['class' => 'form-control center' . ($errors->has('aula_dia2') ? ' is-invalid' : ''), 'placeholder' => 'Aula día 2']) }}
        {!! $errors->first('aula_dia2', '<div class="invalid-feedback">:message</div>') !!}
    </div>




        
        

        </div>



        <div class="row" >


        <div class="form-group col-4 center">
          <label for="dia1">DIA 1</label>
          {{ Form::select('dia1', [
            'LUNES' => 'LUNES',
            'MARTES' => 'MARTES',
            'MIERCOLES' => 'MIERCOLES',
            'JUEVES' => 'JUEVES',
            'VIERNES' => 'VIERNES'
          ], strtoupper($catedra->dia1), ['class' => 'form-control center' . ($errors->has('dia1') ? ' is-invalid' : '')]) }}
          {!! $errors->first('dia1', '<div class="invalid-feedback">:message</div>') !!}
        </div>



        <div class="form-group col-4 center " >
            {{ Form::label('HORA INICIAL DIA 1') }}
            {{ Form::text('hora_comienzo_dia1', $catedra->hora_comienzo_dia1, ['class' => 'form-control center' . ($errors->has('hora_comienzo_dia1') ? ' is-invalid' : ''), 'placeholder' => 'HORA INICIAL DIA 1']) }}
            {!! $errors->first('hora_comienzo_dia1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-4 center">
            {{ Form::label('HORA FINALIZACION DIA 1') }}
            {{ Form::text('hora_finalizacion_dia1', $catedra->hora_finalizacion_dia1, ['class' => 'form-control center' . ($errors->has('hora_finalizacion_dia1') ? ' is-invalid' : ''), 'placeholder' => 'HORA FINALIZACION DIA 1']) }}
            {!! $errors->first('hora_finalizacion_dia1', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        </div>




        <div class="row" >

        <div class="form-group center col-4">
          <label for="dia1">DIA 2</label>
          {{ Form::select('dia2', [
            '-' => '-',
            'LUNES' => 'LUNES',
            'MARTES' => 'MARTES',
            'MIERCOLES' => 'MIERCOLES',
            'JUEVES' => 'JUEVES',
            'VIERNES' => 'VIERNES'
          ], strtoupper($catedra->dia2), ['class' => 'form-control center' . ($errors->has('dia2') ? ' is-invalid' : '')]) }}
          {!! $errors->first('dia2', '<div class="invalid-feedback">:message</div>') !!}
        </div>




       <div class="form-group center col-4">
            {{ Form::label('HORA INICIAL DIA 2') }}
            {{ Form::text('hora_comienzo_dia2', $catedra->hora_comienzo_dia2 ?: '-', [
                'class' => 'form-control center' . ($errors->has('hora_comienzo_dia2') ? ' is-invalid' : ''),
                'placeholder' => 'HORA INICIAL DIA 2'
            ]) }}
            {!! $errors->first('hora_comienzo_dia2', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group center col-4">
            {{ Form::label('HORA FINALIZACION DIA 2') }}
            {{ Form::text('hora_finalizacion_dia2', $catedra->hora_finalizacion_dia2 ?: '-', ['class' => 'form-control center' . ($errors->has('hora_finalizacion_dia2') ? ' is-invalid' : ''), 'placeholder' => 'HORA FINALIZACION DIA 2']) }}
            {!! $errors->first('hora_finalizacion_dia2', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        </div>



        <div class="row"  >

            <div class="col-4" ></div>

            <div class="col-4" >
        <button type="submit" class="botonformulario">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                done
                </span>

            <span>Aceptar<span></button>

                </div>


            <div class="col-4" ></div>

        </div>        



    </div>
   
</div>


<!-- con este script de abajo hacemos que no se peudan recibir minúsculas ni letras con tilde, utilizando jquery -->
<script>
$(document).ready(function() {
  // Escucha el evento de cambio en los campos de entrada
  $('input[type="text"]').on('input', function() {
    var inputValue = $(this).val();
    var modifiedValue = inputValue.toUpperCase().replace(/[ÁÉÍÓÚáéíóúÜü]/g, function(letter) {
      // Mapea las vocales a su versión sin tilde
      var vowelsWithAccent = 'ÁÉÍÓÚáéíóúÜü';
      var vowelsWithoutAccent = 'AEIOUaeiouUu';
      var index = vowelsWithAccent.indexOf(letter);
      return vowelsWithoutAccent.charAt(index);
    });
    $(this).val(modifiedValue);
  });
});
</script>
