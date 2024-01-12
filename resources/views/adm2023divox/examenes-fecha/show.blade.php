@extends('adm2023divox.layouts.app')

@section('template_title')
    {{ $examenesFecha->name ?? "{{ __('Show') Examenes Fecha" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Examenes Fecha</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('examenes-fechas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Catedra:</strong>
                            {{ $examenesFecha->id_catedra }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $examenesFecha->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Comienzo:</strong>
                            {{ $examenesFecha->hora_comienzo }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Finalizacion:</strong>
                            {{ $examenesFecha->hora_finalizacion }}
                        </div>
                        <div class="form-group">
                            <strong>Presidente:</strong>
                            {{ $examenesFecha->presidente }}
                        </div>
                        <div class="form-group">
                            <strong>Vocal1:</strong>
                            {{ $examenesFecha->vocal1 }}
                        </div>
                        <div class="form-group">
                            <strong>Vocal2:</strong>
                            {{ $examenesFecha->vocal2 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
