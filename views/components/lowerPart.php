
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
  </body>


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