@extends('adm2023divox.layouts.app')

@section('template_title')
    {{ __('Update') }} Carrera
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Carrera</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('carreras.update', $carrera->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('adm2023divox.carrera.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
