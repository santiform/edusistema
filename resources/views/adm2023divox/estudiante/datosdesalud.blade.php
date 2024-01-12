@extends('adm2023divox.layouts.app')


@section('content')
<style type="text/css">
    
    button {

        background-color: transparent;
        border: none;
    }

    a {

        text-decoration: none;
    }



    body {
      font-size: 16px;
    }


</style>





 <div class="divbotonatras">
                <a href="https://emmu.edusistema.com.ar/adm2023divox/estudiantes/{{ $estudiante->id }}">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   

                          
                               <div class="tituloconicono">
                          <span class="titulofuncion">Datos de salud de {{ $estudiante->apellido }}, {{ $estudiante->nombre }}</span>

                        </div>

    





<div class="container-fluid" style=" background-color: #EE7873; color: white; padding-top: 10px;">
    <div class="row">
        <div class="col-md-6" style="text-align: right; margin-left: -2rem;">
            <ul>
                <li><strong>¿Posee el secundario completo?</strong></li>
                <li><strong>¿Cursa en otras Escuelas Municipales? Indique cuál:</strong></li>
                <li><strong>Grupo y factor sanguíneo:</strong></li>
                <li><strong>¿Está actualmente o estuvo en tratamiento médico? Indique cuál:</strong></li>
                <li><strong>¿Posee algún diagnóstico médico particular?</strong></li>
                <li><strong>¿Está actualmente o estuvo en tratamiento psicológico? Indique cuál:</strong></li>
                <li><strong>¿Presenta problemas respiratorios? Indique cuáles:</strong></li>
                <li><strong>¿Presenta problemas cardíacos? Indique cuales:</strong></li>
                <li><strong>¿Presenta Hipertensión o hipotensión arterial?</strong></li>
                <li><strong>¿Toma alguna medicación? Indique diagnóstico, tipo de medicación y suministro:</strong></li>
                <li><strong>¿Presenta algún otro problema físico o de salud?</strong></li>
                <li><strong>¿Posee intervenciones quirúrgicas? Indique cuáles:</strong></li>
                <li><strong>¿Tiene alergias? Indique a qué:</strong></li>
                <li><strong>¿Tiene epilepsia?</strong></li>
                <li><strong>¿Posee vacunas al día según calendario nacional de vacunación?</strong></li>
                <li><strong>¿Tuvo Covid 19? Indique fecha</strong></li>
                <li><strong>(Covid) Indique si es esquema incompleto- esquema completo- esquema con refuerzo:</strong></li>
                <li><strong>¿Posee cobertura médica?</strong></li>
                <li><strong>Indique nombre de obra social y/o prepaga:</strong></li>
                <li><strong>Nº de afiliado</strong></li>
                <li><strong>¿Declara estar apto psico-físicamente para realizar estudios vocales, instrumentales y físicos clases?</strong></li>
                <li><strong>(Contacto emergencia) Apellido:</strong></li>
                <li><strong>(Contacto emergencia) Nombre:</strong></li>
                <li><strong>(Contacto emergencia) Teléfono:</strong></li>
                <li><strong>Parentesco / vínculo:</strong></li>
                <li><strong>De ser necesario, trasladar a:</strong></li>
                <li><strong>Dirección del lugar a trasladar:</strong></li>
                <li><strong>Teléfono del lugar a trasladar:</strong></li>
            </ul>
        </div>
        <!-- Agrega otra columna si es necesario -->

        <div class="col-md-6" style="margin-left: -2rem">
            <ul>
                @foreach ($data as $record)
                    @foreach ($record as $value)
                        <li>{{ $value }}</li>
                    @endforeach
                @endforeach

            </ul>
        </div>
    </div>
</div>




            
 
@endsection
