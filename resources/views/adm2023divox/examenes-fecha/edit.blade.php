@extends('adm2023divox.layouts.app')

@section('template_title')
    {{ __('Update') }} Examenes Fecha
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Examenes Fecha</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('examenes-fechas.update', $examenesFecha->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('adm2023divox.examenes-fecha.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
