
<?php include '../views/components/upperPart.php';?>
<?php include '../includes/mostrarCursosRequeridos.inc.php';?>

  <script>
        document.querySelector('.registrar_requerido').classList.add('link-active');
  </script>
  <!-- MAIN CONTENT OF THE PAGE-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <?php if(isset($_GET["success"])){?>
          <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $_GET["success"]?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        </div>
        <?php }?>
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
        <!-- Formulario direccion - departamento -->
        <div class="row mb-2 mb-2">
          <div class="col-md-12">
            <div class="card shadow-sm">
              <div class="card-header fw-bold">
                <div class="row">
                  <div class="col-6">
                    Seleccione los datos solicitados
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
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <label for="direccion" class="form-label">Seleccione una dirección</label>
                    <select name="direccion" class="form-select" aria-label="Default select example" id="direccion">
                      <option selected>Dirección</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="departamento" class="form-label">Seleccione un departamento</label>
                    <select name="departamento" class="form-select" aria-label="Default select example" id="departamento">
                      <option selected>Departamento</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="cargo" class="form-label">Seleccione un cargo</label>
                    <select name="cargo" class="form-select" aria-label="Default select example" id="cargo">
                      <option selected>Cargo</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Formulario direccion - departamento -->

        <!-- REGISTRAR NUEVO USUARIO -->
          <!-- Modal -->
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
                      <label for="direccion1" class="form-label">Seleccione una direccion</label>
                      <br>
                      <select name="direccion1" class="form-select-modal" aria-label="Default select example" id="direccion1" style="width: 100%;">
                        <option selected>Dirección</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 mb-3">
                      <label for="departamento1" class="form-label">Seleccione un departamento</label>
                      <br>
                      <select name="departamento1" class="form-select-modal" aria-label="Default select example" id="departamento1" style="width: 100%;">
                        <option selected>Departamento</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    <div class="col-lg-12 col-md-12 mb-3">
                      <label for="cargo1" class="form-label">Seleccione un cargo específico</label>
                      <br>
                      <select name="cargo1" class="form-select-modal" aria-label="Default select example" id="cargo1" style="width: 100%;">
                        <option selected>Cargo específico	</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 mt-3">

                      <div class="mb-1">
                        <!-- VERSION ALTERNATIVA ✓✓✓-->
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
          <!-- /Modal -->
        <!-- /REGISTRAR NUEVO USUARIO -->
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
                  <div class="row">
                    <!-- TABLA -->
                    <div class="table-responsive">
                      <table
                        id="table1"
                        class="table table-hover data-table"
                        style="width: 100%">
                        <thead>
                          <tr>
                            <th>Curso</th>
                            <th class="text-center">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while($curso = $cursos_requeridos->fetch(PDO::FETCH_ASSOC)){?>
                          <tr>
                            <td><?php echo $curso["name"]; ?></td>
                            <td class="text-center">
                              <button type="button" class="btn text-primary action-btn" data-bs-toggle="modal" data-bs-target="#editarUsuario_<?php echo $curso["id"]; ?>" title="Editar usuario">
                                <i class="bi bi-pencil-fill"></i>
                              </button>
                              <button type="button" class="btn text-danger action-btn" data-bs-toggle="modal" data-bs-target="#delete_<?php echo $curso["id"]; ?>" title="Eliminar usuario">
                                  <i class="bi bi-trash3-fill"></i>
                              </button>
                                <!-- Modal -->
                            </td>
                          </tr>
                          
                          <!-- EDITAR -->
                          <div class="modal fade" id="editarUsuario_<?php echo $curso["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Editar curso: <?php echo $curso["name"]?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <!-- EDITAR DATOS -->
                                  <div class="tab-pane fade show active" id="user-tab-<?php echo $curso["id"]?>" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                  <?php if(isset($_GET["errorEdit"])){?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <strong><?php echo $_GET["errorEdit"]?></strong>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php } ?>
                                    <form action="../includes/editUser.inc.php" method="POST">
                                      <div class="row mt-2">
                                        <div class="col-12">
                                          Nombre del curso
                                          <div class="mb-3">
                                            <input name="firstname" class="form-control" type="text" value="<?php echo $curso["name"]; ?>" aria-label="readonly input example">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input type="hidden" name="id_curso" value="<?php echo $curso["id"]?>">
                                        <input type="hidden" name="cursoNombre_old" value="<?php echo $curso["name"]?>">
                                        <button type="submit" class="btn btn-primary" name="submit">Guardar Cambios</button>
                                      </div>
                                    </form>
                                  </div>
                                  <!--/EDITAR DATOS -->
                                </div>
                              </div>
                            </div> 
                          </div>
                          <!-- EDITAR -->
                          <!-- ELIMINAR -->
                          <div class="modal fade" id="delete_<?php echo $curso["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el curso <?php echo $curso["name"]; ?>?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                  <form action="../includes/deleteUser.inc.php" method="POST">
                                    <button value="<?php echo $curso["name"]; ?>" class="btn btn-danger" name="cursoNombre" type="submit">Eliminar</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /ELIMINAR -->
                          <?php }?>
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
  <!-- /MAIN CONTENT OF THE PAGE-->    
 <script src="../js/requiredCourses.js"></script>
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
  
 <?php include '../views/components/lowerPart.php' ?>