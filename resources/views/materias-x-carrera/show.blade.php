@extends('adm2023divox.layouts.app')

@section('template_title')
    {{ $materiasXCarrera->name ?? "{{ __('Show') Materias X Carrera" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Materias X Carrera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materias-x-carreras.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Carrera:</strong>
                            {{ $materiasXCarrera->id_carrera }}
                        </div>
                        <div class="form-group">
                            <strong>Id Materia:</strong>
                            {{ $materiasXCarrera->id_materia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
