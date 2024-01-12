<div class="box box-info padding-1">
    <div class="box-body">
        
     <div class="form-group">
    {{ Form::label('id_carrera', 'Carrera') }}
    {{ Form::select('id_carrera', $carreras->pluck('nombre_carrera', 'id'), $materiasXCarrera->id_carrera, ['class' => 'form-control' . ($errors->has('id_carrera') ? ' is-invalid' : ''), 'placeholder' => 'Seleccioná una carrera']) }}
    {!! $errors->first('id_carrera', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('id_materia', 'Materia') }}
    {{ Form::select('id_materia', $materias->pluck('nombre_materia', 'id'), $materiasXCarrera->id_materia, ['class' => 'form-control' . ($errors->has('id_materia') ? ' is-invalid' : ''), 'placeholder' => 'Seleccioná una materia']) }}
    {!! $errors->first('id_materia', '<div class="invalid-feedback">:message</div>') !!}
</div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>