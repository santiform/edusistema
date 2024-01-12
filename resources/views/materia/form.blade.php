<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('id') }}
            {{ Form::text('id', $materia->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'ID']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('nombre_materia') }}
            {{ Form::text('nombre_materia', $materia->nombre_materia, ['class' => 'form-control' . ($errors->has('nombre_materia') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Materia']) }}
            {!! $errors->first('nombre_materia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modalidad') }}
            {{ Form::text('modalidad', $materia->modalidad, ['class' => 'form-control' . ($errors->has('modalidad') ? ' is-invalid' : ''), 'placeholder' => 'Modalidad']) }}
            {!! $errors->first('modalidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>

        Link al programa <br>
        <input type="text" class="form-control" value='{{ $materia->link_programa }}' name="link_programa" placeholder="Link del programa" id="convertirAMinusculas" oninput="convertirAMinusculas(this)">

        <br>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>





