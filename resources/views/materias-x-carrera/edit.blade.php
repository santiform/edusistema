@extends('adm2023divox.layouts.app')

@section('template_title')
    {{ __('Update') }} Materias X Carrera
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Materias X Carrera</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('materias-x-carreras.update', $materiasXCarrera->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('materias-x-carrera.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
