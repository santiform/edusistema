@include('docentes.includes.headerdocentes')
  

          <a href="https://localhost/edusistema/public/docentes/mis-catedras" ><h1>Listado de Cátedras</h1>

          <p> Un listado de con las cátedras que tenés asignadas. </p></a>

          <br>


          <a href="https://localhost/edusistema/public/docentes/asistencia" ><h1>Asistencia</h1>

          <p> Herramienta para cargar la asistencia de tus cátedras. </p></a>

            <br>


          <!-- agregar esta función cuando corresponda... 

          <h1>Calificaciones (Cuatrimestrales)</h1>

          <p> En esta función encontrarás tus materias en curso,
                y tus calificaciones. </p>

            <br>


          -->


          <a href="https://docs.google.com/spreadsheets/d/1heNyFi5SujAPTWot1fI95SFx4vB_lVlo/edit#gid=1992274734" target="blank" ><h1>Modificaciones Docentes</h1>

          <p> Planilla de Google Drive donde volcás tus ausencias, previamente concensuadas con dirección. </p></a>



@include('docentes.includes.footerdocentes')




@if (session('datosSaludCompletos')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#F4F4F4',
          color: '#F4F4F4',
          background: '#00195E',
          title: 'Datos de Salud recibidos correctamente',
          showConfirmButton: false,
          timer: 4000
        })

     </script>

@endif    



