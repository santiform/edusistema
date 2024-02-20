@extends('adm2023divox.layouts.app')


@section('content')



<div class="container-fluid center diverror" style="color: #f4f4f4; padding-block: 2rem;">

	

	<span class="material-icons" style="font-size: 100px;">
task_alt
</span> <br>
	<p  style="font-size: 22 px;">¡Calificaciones guardadas correctamente!</p>

<a href="https://localhost/edusistema/public/adm2023divox/calificaciones-seccion" style="display: inline-block; margin-top: 1rem; border: 2px solid white; border-radius: 20px; padding: 0.5rem; text-decoration: none; color: white;">

    <span style="vertical-align: middle;" class="material-icons">
        history
    </span>

    <span style="font-size: 20px;">Volver</span>

</a>



</div>

@endsection              



@section('js')


<!-- Agrega el código JavaScript y jQuery para implementar el filtro de búsqueda -->
<script>
$(document).ready(function(){
  $('#search').on('keyup', function(){
    var query = $(this).val().toLowerCase();
    $('.search-table tbody tr').filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
    });
  });
});
</script>


@endsection              
