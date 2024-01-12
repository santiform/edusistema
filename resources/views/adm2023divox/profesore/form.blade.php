<div class="divcentrado" style="margin-top: -2.3rem;"  >
    <div class="formulario" >
        
        <div class="form-group form-groupinicial ">
            {{ Form::label('DNI') }}
            {{ Form::text('dni', $profesore->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'DNI']) }}
            {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('APELLIDO') }}
            {{ Form::text('apellido', $profesore->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'APELLIDO']) }}
            {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NOMBRE') }}
            {{ Form::text('nombre', $profesore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'NOMBRE']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NACIMIENTO') }}
            {{ Form::date('nacimiento', $profesore->nacimiento, ['class' => 'form-control' . ($errors->has('nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'NACIMIENTO']) }}
            {!! $errors->first('nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CELULAR') }}
            {{ Form::text('celular', $profesore->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'CELULAR']) }}
            {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('EMAIL') }}
            {{ Form::text('mail', $profesore->mail, ['class' => 'form-control' . ($errors->has('mail') ? ' is-invalid' : ''), 'placeholder' => 'EMAIL']) }}
            {!! $errors->first('mail', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('INGRESO') }}
            {{ Form::text('ingreso', $profesore->ingreso, ['class' => 'form-control' . ($errors->has('ingreso') ? ' is-invalid' : ''), 'placeholder' => 'INGRESO']) }}
            {!! $errors->first('ingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('HORAS RELOJ') }}
            {{ Form::text('horas', $profesore->horas, ['class' => 'form-control' . ($errors->has('horas') ? ' is-invalid' : ''), 'placeholder' => 'HORAS']) }}
            {!! $errors->first('horas', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <button type="submit" class="botonformulario">  

            <span style="vertical-align: middle; margin-top: -0.2rem;" class="material-icons">
                done
                </span>

            <span>Aceptar<span></button>

    </div>
    
</div>