

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
<script src="https://localhost/edusistema/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>


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
