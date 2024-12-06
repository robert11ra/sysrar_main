<script src="../../public/js/jquery-3.6.3.min.js"></script>
<script src="../../public/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../../public/node_modules/select2/dist/js/select2.min.js"></script>
<script src="../../js/app.js"></script>

<script src="../../public/css/DataTables/datatables.min.js"></script>
<script src="../../public/js/chart.js"></script>
<script src="../../public/js/moment.min.js"></script>
<script src="../../public/js/daterangepicker.min.js"></script>
<script src="../../public/js/bootstrap.bundle.min.js"></script>

<script>
  
  if ($("#gif-carga").length) {
    window.onload = function() {
      // Eliminar la clase "ocultar" del div
      document.getElementById("gif-carga").classList.remove("ocultar");

      // Mostrar el div después de un breve retraso (opcional)
      document.getElementById("gif-carga").style.display = "block";
    };
  }
</script>