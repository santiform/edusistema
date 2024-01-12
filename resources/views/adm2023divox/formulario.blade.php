@extends('adm2023divox.layouts.app')

@section('content')



<div class="divbotonatras">
    <a href="https://emmu.edusistema.com.ar/adm2023divox/calificaciones-seccion">
        <span class=" botonatras material-icons2">
            arrow_back_ios_new
        </span>
    </a>
</div>

<div class="tituloconicono">
    <span class="titulofuncion">Editando promocionales 2023</span>
</div>

<div class="container-fluid" style="max-width: 50vw;">
<form method="POST" action="../adm2023divox/editarpromo1" enctype="multipart/form-data">
    @csrf

    <div class="container-fluid formulario center" style="max-width: 35vw" >

    SELECCIONÁ UNA MATERIA PARA MODIFICAR

    <input class="input" type="hidden" name="archivo">

    <!-- Agrega esto donde quieras que aparezca el select en tu vista -->
<select name="id_materia">
    @foreach($materias as $id => $nombre)
        <option value="{{ $id }}">{{ $nombre }}</option>
    @endforeach
</select>


    <br>

    <button class="botonformulario" type="submit">Modificar</button>
</form>
</div>

</div>





@endsection