<div class="divcentrado" style="margin-top: -2.3rem;"  >
    <div class="formulario" style="padding-top: -2rem;" >

        <div class="form-group form-groupinicial">
            {{ Form::label('DNI') }}
            {{ Form::number('dni', $estudiante->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'DNI']) }}
            {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('APELLIDO') }}
            {{ Form::text('apellido', $estudiante->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'APELLIDO']) }}
            {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NOMBRE') }}
            {{ Form::text('nombre', $estudiante->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'NOMBRE']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NACIMIENTO') }}
            {{ Form::date('nacimiento', $estudiante->nacimiento, ['class' => 'form-control' . ($errors->has('nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'NACIMIENTO']) }}
            {!! $errors->first('nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CELULAR') }}
            {{ Form::number('celular', $estudiante->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'CELULAR']) }}
            {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('EMAIL') }}
            {{ Form::text('mail', $estudiante->mail, ['class' => 'form-control' . ($errors->has('mail') ? ' is-invalid' : ''), 'placeholder' => 'EMAIL']) }}
            {!! $errors->first('mail', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" >DIRECCION<br>
        <input class="inputform form-control" type="text" name="direccion" value="{{$estudiante->direccion}}" placeholder="DIRECCION">
        </div>

        <div class="form-group" >LOCALIDAD (elegir una opción) ↓↓↓<br>
            <select class="inputform" name="localidad" value="{{$estudiante->localidad}}">
                <option value="Caseros">Caseros</option>
                <option value="Churrucam">Churrucam</option>
                <option value="Ciudad Jardin">Ciudad Jardin</option>
                <option value="Lomas del Palomar">Lomas del Palomar</option>
                <option value="Ciudadela">Ciudadela</option>
                <option value="El Libertador">El Libertador</option>
                <option value="José Ingenieros">José Ingenieros</option>
                <option value="Loma Hermosa">Loma Hermosa</option>
                <option value="Martín Coronado">Martín Coronado</option>
                <option value="Once de Septiembre">Once de Septiembre</option>
                <option value="Pablo Podestá">Pablo Podestá</option>
                <option value="Remedios de Escalada">Remedios de Escalada</option>
                <option value="Sáenz Peña">Sáenz Peña</option>
                <option value="Santos Lugares">Santos Lugares</option>
                <option value="Villa Bosch">Villa Bosch</option>
                <option value="Villa Raffo">Villa Raffo</option>
                <option value="No pertenece a 3 de Febrero">No pertenece a 3 de Febrero</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo">TIPO DE ESTUDIANTE (elegir una opción) ↓↓↓</label>
            {{ Form::select('tipo', ['INGRESANTE' => 'INGRESANTE', 'REGULAR' => 'REGULAR'], $estudiante->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Seleccioná una opción', 'id' => 'tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="carrera">CARRERA (elegir una opción) ↓↓↓</label>
            {{ Form::select('carrera', $carreras, $estudiante->carrera, ['class' => 'form-control' . ($errors->has('carrera') ? ' is-invalid' : ''), 'placeholder' => 'Seleccioná una carrera', 'id' => 'carrera']) }}
            {!! $errors->first('carrera', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <button type="submit" class="botonformulario">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                done
                </span>

            <span>Aceptar<span></button>

    </div>
   
</div>


