@extends('adm2023divox.layouts.app')

@section('template_title')
    {{ $catedra->name ?? "{{ __('Show') Catedra" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Catedra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('catedras.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Materia:</strong>
                            {{ $catedra->id_materia }}
                        </div>
                        <div class="form-group">
                            <strong>Dni Profesor:</strong>
                            {{ $catedra->dni_profesor }}
                        </div>
                        <div class="form-group">
                            <strong>Aula:</strong>
                            {{ $catedra->aula }}
                        </div>
                        <div class="form-group">
                            <strong>Cupos:</strong>
                            {{ $catedra->cupos }}
                        </div>
                        <div class="form-group">
                            <strong>Dia1:</strong>
                            {{ $catedra->dia1 }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Comienzo Dia1:</strong>
                            {{ $catedra->hora_comienzo_dia1 }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Finalizacion Dia1:</strong>
                            {{ $catedra->hora_finalizacion_dia1 }}
                        </div>
                        <div class="form-group">
                            <strong>Dia2:</strong>
                            {{ $catedra->dia2 }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Comienzo Dia2:</strong>
                            {{ $catedra->hora_comienzo_dia2 }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Finalizacion Dia2:</strong>
                            {{ $catedra->hora_finalizacion_dia2 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
