

<div class="sepfooter" ></div>

<footer class="footer">
  <div class="container-fluid" style="margin-top: 2rem;">
    <div class="row">
      <div class="col-4 mx-auto">
        <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
          <a href="https://emmu.edusistema.com.ar/estudiantes/inscripciones" class="btn">
            <span class="material-icons d-flex flex-column align-items-center justify-content-center">
              checklist
            </span>
            <p>Mis<br>Inscripciones</p>
          </a>
        </div>
      </div>

      <div class="col-4 mx-auto">
        <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
          <a href="https://emmu.edusistema.com.ar/estudiantes/historial-academico" class="btn">
            <span class="material-icons d-flex flex-column align-items-center justify-content-center">
              history
            </span>
            <p>Historial<br>Académico</p>
          </a>
        </div>
      </div>

      <div class="col-4 mx-auto">
        <div class="botonfuncion d-flex flex-column align-items-center justify-content-center">
          <a href="https://emmu.edusistema.com.ar/estudiantes/informacion-academica" class="btn">
            <span class="material-icons d-flex flex-column align-items-center justify-content-center">
              info
            </span>
            <p>Información<br>Académica</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
<script src="https://emmu.edusistema.com.ar/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- con este script de abajo hacemos que no se peudan recibir minúsculas ni letras con tilde, utilizando jquery -->
<script>
$(document).ready(function() {
  // Escucha el evento de cambio en los campos de entrada
  $('input[type="text"]').on('input', function() {
    var inputValue = $(this).val();
    var modifiedValue = inputValue.toUpperCase().replace(/[ÁÉÍÓÚáéíóúÜüÄËÏÖÜäëïöü`´]/g, function(letter) {
      // Mapea las vocales con caracteres especiales a su versión sin tilde o dieresis
      var vowelsWithAccent = 'ÁÉÍÓÚáéíóúÜüÄËÏÖÜäëïöü';
      var vowelsWithoutAccent = 'AEIOUaeiouUuAEIOUaeiouUu';
      var index = vowelsWithAccent.indexOf(letter);
      return vowelsWithoutAccent.charAt(index);
    });
    $(this).val(modifiedValue);
  });
});

</script>

</body>
</html>
