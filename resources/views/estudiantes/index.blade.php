@include('estudiantes.includes.headerestudiantes')
  

          <h1>Bienvenido/a</h1>

          <p> En la sección superior, podés cerrar la sesión.
                En la sección inferior tenés acceso a las funciones de
                la plataforma. </p>

          <br>


          <h1>Inscripciones</h1>

          <p> En esta función encontrarás los formularios y 
            resultados de tus inscripciones a materias y
            exámenes. </p>

            <br>


          <h1>Historial Académico</h1>

          <p> En esta función encontrarás tus materias en curso,
                y tus calificaciones. </p>

            <br>


          <h1>Información Académica</h1>

          <p> En esta función encontrarás información pertinente
                a la institución. Como calendario académico, planes
                de estudio y programas de materias. </p>



@include('estudiantes.includes.footerestudiantes')




@if (session('datosSaludCompletos')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: 'Datos de Salud recibidos correctamente',
          showConfirmButton: false,
          timer: 4000
        })

     </script>

@endif    





@if (session('datosRetiroCompletos')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#002D18',
          color: '#F4F4F4',
          background: '#006D55',
          title: 'Datos de Retiro recibidos correctamente',
          showConfirmButton: false,
          timer: 4000
        })

     </script>

@endif    
