
    
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/datatable/datatables.min.js"></script>
    <script src="../js/datatable/pdfmake.min.js"></script>
    <script src="../js/datatable/vfs_fonts.js"></script>
    <script src="../js/script.js"></script>
  </body>

<!-- BOOTSTRAP TOOLTIP -->
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>

  <!-- ERROR DE REGISTRO DE USUARIO NUEVO -->
  <?php if(isset($_GET["errorRegister"])){?>
  <script type="text/javascript">
          $(window).on('load', function() {
              $('#nuevoUsuario').modal('show');
          });
  </script>
  <?php } else if(isset($_GET["errorEdit"])){?>
    <script type="text/javascript">
          $(window).on('load', function() {
              $('#editarUsuario_<?php echo $_GET["user"]?>').modal('show');
          });
    </script>
  <?php } ?>

</html>