@extends('adm2023divox.layouts.app')

@section('content')

<div class="container center diverror" >

      <span  class="material-icons" style="font-size: 9rem; color: #E45D58;">
error
</span>
       
       <p><b>Código de error: Ax001</b></p> 

       <p>Hola, {{ Auth::user()->name }}</p>

       <p>¡No estás autorizado para visitar esta sección!</p>


</div>



</div>




@endsection