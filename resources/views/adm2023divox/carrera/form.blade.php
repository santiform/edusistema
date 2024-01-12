<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('id') }}
            {{ Form::text('id', $carrera->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Id']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('nombre_carrera') }}
            {{ Form::text('nombre_carrera', $carrera->nombre_carrera, ['class' => 'form-control' . ($errors->has('nombre_carrera') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Carrera']) }}
            {!! $errors->first('nombre_carrera', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>