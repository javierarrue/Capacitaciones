<?php require('../includes/config.php'); ?>
<?php include '../views/components/upperPart.php' ?>
<?php include '../includes/mostrarDirecciones.inc.php'; ?>

<script>
  document.querySelector('.visualizar').classList.add('link-active');
</script>
<!-- MAIN CONTENT OF THE PAGE-->
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <!-- Título de página -->
    <div class="row mb-2">
      <div class="col-md-12 fw-bold fs-3">
        <div class="card shadow-sm">
          <div class="card-body">

            <div class="row align-items-center">
              <div class="col-md-10 col-sm-6">
                Visualizar cargos y trabajadores
              </div>
              <div class="col-md-2 col-sm-6 text-center">
                <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid " style="width:5rem;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Título de página -->
    <!-- Formulario direccion - departamento -->
    <div class="row mb-2">
      <div class="col-md-12">
        <div class="card shadow-sm">
          <div class="card-header fw-bold">
            Ingrese los datos solicitados
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Seleccione una dirección</label>
                <select name="direccion" class="form-select" aria-label="Default select example" id="direccion">
                  <option class="fw-bold" selected>Direccion</option>
                  <?php foreach ($direcciones as $direccion => $direccion_codigo) { ?>
                    <option value=<?php echo $direccion_codigo ?>><?php echo $direccion ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="departamento" class="form-label">Seleccione un departamento</label>
                <select name="departamento" class="form-select" aria-label="Default select example" id="departamento">
                  <option selected>Seleccione una Dirección</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- /Formulario direccion - departamento -->

    <!-- Tabla de trabajadores -->
    <div class="row mb-2">
      <div class="col-md-12">
        <div class="card shadow-sm">
          <div class="card-header fw-bold">
            Lista de trabajadores
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table_cargos_trabajadores" class="table table-hover data-table" style="width: 100%">
                <thead>
                  <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Cargo</th>
                  </tr>
                </thead>
                <!--<tbody id="cargoTrabajadores-tabla">
                    </tbody>-->
                <!--
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Cargo</th>
                      </tr>
                    </tfoot>
                    -->
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- /Tabla de trabajadores -->

  </div>
</main>
<!-- /MAIN CONTENT OF THE PAGE-->
<!-- SELECT2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.form-select').select2();
  });
</script>
<script src="../js/ajaxTable.js"></script>
<!-- /SELECT2 -->
<?php include '../views/components/lowerPart.php' ?>