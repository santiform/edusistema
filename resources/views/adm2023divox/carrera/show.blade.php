@extends('adm2023divox.layouts.app')

@section('template_title')
    {{ $carrera->name ?? "{{ __('Show') Carrera" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Carrera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('carreras.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Carrera:</strong>
                            {{ $carrera->nombre_carrera }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
