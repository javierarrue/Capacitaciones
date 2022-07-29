<?php include '../views/components/upperPart.php'; ?>
<?php include '../includes/mostrarCursosRequeridos.inc.php'; ?>
<?php include '../includes/mostrarDirecciones.inc.php'; ?>

<script>
  document.querySelector('.registrar_requerido').classList.add('link-active');
</script>
<!-- MAIN CONTENT OF THE PAGE-->
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <?php if (isset($_GET["success"])) { ?>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET["success"] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-md-12 fw-bold fs-3">
        <div class="card shadow-sm mb-2">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-md-10 col-sm-6">
                Administrar cursos requeridos
              </div>
              <div class="col-md-2 col-sm-6 text-center">
                <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid " style="width:5rem;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-2 mb-2">
      <div class="col-md-12">
        <div class="card shadow-sm">
          <div class="card-header fw-bold">
            <div class="row align-items-center">
              <div class="col-6">
                Añadir cursos requeridos
              </div>
              <div class="col-6 text-end">
                <!-- Button trigger modal -->
                <button type="button" class="mt-2 btn register-btn text-white" data-bs-toggle="modal" data-bs-target="#nuevoUsuario">
                  <i class="bi bi-plus-lg"></i>
                  Nuevo curso requerido
                </button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-6">
                <span class="fw-bold">Cursos requeridos</span>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
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

              <div class="col-md-12 mb-3">
                <label for="cargo" class="form-label">Seleccione un cargo específico</label>
                <select class="form-select" name="cargo" id="cargo" onchange="mostrar();">
                  <option selected>Seleccione un departamento</option>
                </select>
              </div>
            </div>

            <div class="row">
              <!-- TABLA -->
              <div class="table-responsive">
                <table id="table1" class="table table-hover data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Curso</th>
                      <th class="text-center">Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($curso = $cursos_requeridos->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr>
                        <!--NOMBRE DEL CURSO-->
                        <td id="crequerido_nombre_<?php echo $curso["id"] ?>"> <?php echo $curso["name"]; ?> </td>
                        <!--BOTONES DE ACCION-->
                        <td class="text-center">
                          <!-- BOTON - EDITAR -->
                          <button type="button" data-role="edit" data-id="<?php echo $curso["id"] ?>" class="btn text-primary action-btn" title="Editar usuario">
                            <i class="bi bi-pencil-fill"></i>
                          </button>
                          <!-- BOTON - ELIMINAR -->
                          <button type="button" data-role="delete" data-id="<?php echo $curso["id"] ?>" class="btn text-danger action-btn" title="Eliminar usuario">
                            <i class="bi bi-trash3-fill"></i>
                          </button>
                        </td>
                      </tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!--/ TABLA -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- MODAL - REGISTRAR NUEVO CURSO -->
<div class="modal fade" id="nuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="../includes/nuevoCursoRequerido.inc.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar un nuevo curso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-6 col-md-12 mb-3">
              <label for="direccionModal" class="form-label">Seleccione una dirección</label>
              <select onchange="cargarDepartamentos()" name="direccionModal" class="form-select-modal" style="width: 100%;" aria-label="Seleccion de direccion" id="direccionModal">
                <option class="fw-bold" selected>Direccion</option>
                <?php foreach ($direcciones as $direccion => $direccion_codigo) { ?>
                  <option value=<?php echo $direccion_codigo ?>><?php echo $direccion ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-lg-6 col-md-12 mb-3">
              <label for="departamentoModal" class="form-label">Seleccione un departamento</label>
              <select onchange="cargarCargos()" name="departamentoModal" class="form-select-modal" style="width: 100%;" aria-label="Seleccion de departamento" id="departamentoModal">
                <option selected>Seleccione una Dirección</option>
              </select>
            </div>

            <div class="col-lg-12 col-md-12 mb-3">
              <label for="cargoModal" class="form-label">Seleccione un cargo específico</label>
              <select class="form-select-modal" name="cargoModal" id="cargoModal" aria-label="Seleccion de Cargo" onchange="mostrar();" style="width: 100%;">
                <option selected>Seleccione un departamento</option>
              </select>
            </div>

          </div>
          <div class=" row">
            <div class="col-lg-12 col-md-12 mt-3">

              <div class="mb-1">
                <div class="row align-items-center mb-3">
                  <div class="col-md-12">
                    <label for="curso" class="form-label">Añadir cursos requeridos</label>
                    <input class="form-control cursoSugeridoText cursoSugeridoInput" placeholder="Nombre del curso" type="text" aria-label="readonly input example" name="cursos[0]" id="curso">
                  </div>
                </div>
              </div>

              <div class="cursos">
              </div>

              <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-outline-success addFieldBtn">Añadir nueva línea</button>
              </div>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-uppercase" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" name="submit" class="btn register-btn text-uppercase text-white">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /MODAL - REGISTRAR NUEVO CURSO -->

<!-- MODAL - EDITAR CURSO -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar curso: <b id="edit_nombre_crequerido"></b> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- EDITAR DATOS -->
        <div class="tab-pane fade show active" id="editModal" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <?php if (isset($_GET["errorEdit"])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?php echo $_GET["errorEdit"] ?></strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php } ?>
          <form action="../includes/editUser.inc.php" method="POST">
            <div class="row mt-2">
              <div class="col-12">
                Nombre del curso
                <div class="mb-3">
                  <input id="editar_nombre" name="firstname" class="form-control" type="text" aria-label="readonly input example">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <input id="id_curso" type="hidden" name="id_curso">
              <input id="nombre_viejo" type="hidden" name="cursoNombre_old">
              <button type="submit" class="btn btn-primary" name="submit">Guardar Cambios</button>
            </div>
          </form>
        </div>
        <!--/EDITAR DATOS -->
      </div>
    </div>
  </div>
</div>
<!-- MODAL - EDITAR CURSO -->

<!-- MODAL - ELIMINAR CURSO -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el curso <b id="delete_nombre_crequerido"></b> ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form action="../includes/deleteUser.inc.php" method="POST">
          <button class="btn btn-danger" name="cursoNombre" type="submit">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /ELIMINAR -->

<!-- /MAIN CONTENT OF THE PAGE-->
<script src="../js/requiredCourses.js"></script>
<script src="../js/modalDinamicos/modal_registrar_requerido.js"></script>

<!-- SELECT2 -->
<script src="../js/select2.js"></script>
<script>
  $(document).ready(function() {
    $('.form-select').select2();
  });
  $(document).ready(function() {
    $('.form-select-modal').select2({
      dropdownParent: $('#nuevoUsuario')
    });
  });
</script>
<!-- /SELECT2 -->

<script src="../js/ajaxSelect.js"></script>
<?php include '../views/components/lowerPart.php' ?>