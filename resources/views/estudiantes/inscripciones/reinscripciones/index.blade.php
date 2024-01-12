@include('estudiantes.includes.headerestudiantes')


<div class="container center" style="background-color: darkorange;" >
<form class="form" method="POST" action="../public/adm2023divox/guardar-datos-de-salud" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="archivo">

    DNI:
    <input type="text" name="campo1">

    <br>

    NOMRBE Y APELLIDO:
    <input type="text" name="campo2">
    <!-- Agrega más campos según tu formulario -->
    <button type="submit">Guardar</button>
</form>

</div>






@include('estudiantes.includes.footerestudiantes')