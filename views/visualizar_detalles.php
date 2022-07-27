<?php include '../views/components/upperPart.php' ?>
<?php include '../includes/mostrarDetalleColaborador.inc.php' ?>

<?php
$noCongruente = 'rounded-pill badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-10 fw-normal';
$congruente = 'rounded-pill badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 fw-normal';
$aceptado = 'rounded-pill badge bg-success bg-opacity-10 text-success border border-success border-opacity-10 fw-normal';
$rechazado = 'rounded-pill badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-10 fw-normal';
?>
<script>
  document.querySelector('.visualizar').classList.add('link-active');
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

    <div class="row mb-2 g-2">
      <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card shadow-sm" style="height: 100%;">
          <div class="card-header">
            <div class="row">
              <div class="col-8">
                <b>Datos del trabajador</b>
              </div>
              <div class="col-4 text-end">
                <a class="text-end" href="visualizar.php">
                  <i class="bi bi-arrow-left-short"></i>
                  Volver
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">

              <div class="col-6">
                <p>
                  <span class="text-muted">Nombre</span>
                  <br>
                  <?php echo $colaboradorDetalle["nombre"] ?>
                </p>
              </div>

              <div class="col-6">
                <p>
                  <span class="text-muted">Apellido</span>
                  <br>
                  <?php echo $colaboradorDetalle["apellido"] ?>
                </p>
              </div>

              <div class="col-6">
                <p>
                  <span class="text-muted">Cédula</span>
                  <br>
                  <span id="cedula_trabajador"><?php echo $colaboradorDetalle["cedula"] ?></span>
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-12">
                <p>
                  <span class="text-muted">Dirección</span>
                  <br>
                  <?php echo $colaboradorDetalle["direccion"] ?>
                </p>
              </div>
              <div class="col-lg-6 col-md-12">
                <p>
                  <span class="text-muted"> Departamento </span>
                  <br>
                  <?php echo $colaboradorDetalle["depto"] ?>
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <p>
                  <span class="text-muted">Cargo</span>
                  <br>
                  <?php echo $colaboradorDetalle["ocupacion"] ?>
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-8 col-md-12 col-sm-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <b>Cursos requeridos</b>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table1" class="table table-striped data-table table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th>Curso</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i = 0; $i < count($cSugeridosColaborador); $i++) { ?>
                    <tr>
                      <td><?php echo $cSugeridosColaborador[$i]["csugerido"] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-2 g-1">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <b>Cursos Sugeridos para el cargo</b>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table2" class="table data-table table-hover table-responsive" style="width: 100%">
                <thead>
                  <tr>
                    <th class="actionbtn_row" data-priority="1"></th>
                    <th data-priority="1">Curso</th>
                    <th data-priority="1">Análisis</th>
                    <th>Estado</th>
                    <th data-priority="1">Fecha Inicio</th>
                    <th data-priority="1">Fecha Fin</th>
                    <th>Validad</th>
                  </tr>
                </thead>
                <tbody>

                  <?php for ($i = 0; $i < count($cSugeridosColaborador); $i++) { ?>
                    <tr id="tr_<?php echo $i ?>">
                      <!-- BOTONES DE ACCION -->
                      <td class="text-end">
                        <button type="button" data-role="delete" data-id="<?php echo $i ?>" class="btn text-danger action-btn" title="Eliminar Curso" id="delete">
                          <i class="bi bi-trash3-fill"></i>
                        </button>
                        <button type="button" data-role="edit" data-id="<?php echo $i ?>" class="btn text-primary action-btn" title="Editar Curso">
                          <i class="bi bi-pencil-fill"></i>
                        </button>
                      </td>
                      <!-- NOMBRE DEL CURSO -->
                      <td id="csugerido_nombre_<?php echo $i ?>">
                        <?php echo $cSugeridosColaborador[$i]["csugerido"] ?>
                      </td>
                      <!-- ANALISIS -->
                      <td class="" style="font-size:1.1em" id="analisis_<?php echo $i ?>">
                        <?php if ($cSugeridosColaborador[$i]["analisis"] == "aceptado") { ?>
                          <span class="<?php echo $aceptado ?>">
                          <?php } else { ?>
                            <span class="<?php echo $rechazado ?>">
                            <?php } ?>
                            <?php echo $cSugeridosColaborador[$i]["analisis"] ?>
                            </span>
                      </td>
                      <!-- ESTADOS -->
                      <td>
                        <select class="form-select" aria-label="Default select example">
                          <?php
                          while ($estado = $estados->fetch(PDO::FETCH_ASSOC)) { ?>

                            <option value="<?php echo $estado["id_estado"]; ?>" <?php if ($cSugeridosColaborador[$i]["estado"] ==  $estado["id_estado"]) { ?> selected id="estado_<?php echo $i ?>" <?php } ?>>
                              <?php echo $estado["estado"]; ?>
                            </option>

                          <?php }
                          //Vuelvo a correr el execute().
                          //¿Porque?:
                          //PDOStatment (el cual $roles es) es un cursor que se mueve hacia adelante, por lo tanto una vez consumido, este no volvera a la posicion inicial.
                          //Por eso es necesario volver ejecutar el PDOStatmente, para reiniciar la posicion de este :=)
                          $estados->execute();
                          ?>
                        </select>
                      </td>
                      <!-- /ESTADOS -->
                      <!-- FECHA INICIO -->
                      <td>
                        <input id="fecha_inicio_<?php echo $i ?>" type="date" name="fecha_inicio" value="<?php echo $cSugeridosColaborador[$i]["fecha_inicio"] ?>">
                      </td>
                      <!-- FECHA FIN -->
                      <td>
                        <input id="fecha_fin_<?php echo $i ?>" type="date" name="fecha_fin" value="<?php echo $cSugeridosColaborador[$i]["fecha_fin"] ?>">
                      </td>
                      <!-- CONGRUENCIA -->
                      <td class="" style="font-size:1.1em">
                        <span class="<?php echo $congruente ?>">
                          Congruente
                        </span>
                        <!-- ID DE CURSO SUGERIDO. Referencia para ejecutar la eliminacion de un curso seleccionado-->
                        <input type="hidden" name="" id="id_csugerido_<?php echo $i ?>" value="<?php echo $cSugeridosColaborador[$i]["id"] ?>">
                      </td>
                      <!-- /CONGRUENCIA -->
                    </tr>

                    <!-- Modal EDITAR-->
                    <!--
                        <div class="modal fade" id="edit_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar curso: <?php echo $cSugeridosColaborador[$i]["csugerido"] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-6">
                                    <label for="status" class="form-label">Estado</label>
                                    <select class="form-select" aria-label="Default select example" id="status">
                                      <option selected> Pendiente </option>
                                      <option value="1"> Impartido</option>
                                      <option value="2"> En desarrollo</option>
                                      <option value="3"> Cancelado</option>
                                      <option value="3"> Para el siguiente año</option>
                                      <option value="3"> En trámite de compras</option>
                                      <option value="3"> En trámite con proveedor local</option>
                                      <option value="3"> Solicitado a organismo internacional</option>
                                      <option value="3"> A incluir en el PAC del siguiente año</option>
                                      <option value="3"> Otro</option>
                                    </select>
                                  </div>
                                  <div class="col-6">
                                    <label for="analisis" class="form-label">Análisis</label>
                                    <select class="form-select" aria-label="Default select example" id="analisis">
                                      <option selected> Aceptado </option>
                                      <option value="1"> Rechazado</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary register-btn">Guardar cambios</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        -->
                    <!-- /MODAL EDITAR -->
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row mb-2 g-1">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <b>Cursos impartidos por el trabajador</b>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table1" class="table table-striped data-table table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th>Curso</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>GAS</td>
                  </tr>
                  <tr>
                    <td>Excel</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>
<!-- /MAIN CONTENT OF THE PAGE-->

<!-- MODAL - EDITAR CURSO-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar curso: <b id="edit_nombre_csugerido"></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!--ESTADO-->
          <div class="col-6">
            <label for="status" class="form-label">Estado</label>
            <select class="form-select" aria-label="Default select example" id="edit_estado" name="estado">
              <?php
              while ($estado = $estados->fetch(PDO::FETCH_ASSOC)) { ?>

                <option value="<?php echo $estado["id_estado"]; ?>">
                  <?php echo $estado["estado"]; ?>
                </option>

              <?php }
              //Vuelvo a correr el execute().
              //¿Porque?:
              //PDOStatment (el cual $roles es) es un cursor que se mueve hacia adelante, por lo tanto una vez consumido, este no volvera a la posicion inicial.
              //Por eso es necesario volver ejecutar el PDOStatmente, para reiniciar la posicion de este :=)
              $estados->execute();
              ?>
            </select>
          </div>
          <!--ANALISIS-->
          <div class="col-6">
            <label for="analisis" class="form-label">Análisis</label>
            <select class="form-select" aria-label="Default select example" id="analisis" name="analisis">
              <option selected> Aceptado </option>
              <option value="1"> Rechazado</option>
            </select>
          </div>
        </div>
        <div class="row pt-2">
          <!-- FECHA INICIO -->
          <div class="col-6">
            <label for="analisis" class="edit_fecha_inicio">Fecha de inicio</label>
            <input type="date" name="edit_fecha_inicio" class="form-control" id="edit_fecha_inicio">
          </div>
          <!-- FECHA FIN -->
          <div class="col-6">
            <label for="analisis" class="edit_fecha_fin">Fecha de finalización</label>
            <input type="date" name="edit_fecha_fin" class="form-control" id="edit_fecha_fin">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary register-btn">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL - EDITAR CURSO-->

<!-- MODAL - ELIMINAR CURSO -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el curso <b id="delete_nombre_csugerido"></b> ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form action="../includes/deleteCSugeridoColaborador.inc.php" method="POST">
          <button value="" class="btn btn-danger" name="id" type="submit" id="delete_id">Eliminar</button>
          <input type="hidden" name="cedula" value="" id="delete_cedula_trabajador">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /MODAL - ELIMINAR CURSO -->

<script>
  $(document).on('click', 'button[data-role=delete]', function() {

    var id = $(this).data('id');
    var cedula = document.querySelector('#cedula_trabajador').textContent;
    var nombre = document.querySelector('#csugerido_nombre_' + id).innerText;
    var id_csugerido = document.querySelector('#id_csugerido_' + id).value;

    document.querySelector('#delete_nombre_csugerido').textContent = nombre;
    document.querySelector('#delete_id').value = id_csugerido;
    document.querySelector('#delete_cedula_trabajador').value = cedula;

    $('#deleteModal').modal('toggle');
  })

  $(document).on('click', 'button[data-role=edit]', function() {

    var id = $(this).data('id');

    var nombre = document.querySelector('#csugerido_nombre_' + id).innerText;
    var analisis = document.querySelector('#analisis_' + id).innerText;
    var estado = document.querySelector('#estado_' + id).value;
    var fecha_inicio = document.querySelector('#fecha_inicio_' + id).value;
    var fecha_fin = document.querySelector('#fecha_fin_' + id).value;

    var edit_estado = document.querySelector('#edit_estado').options;
    for (let i = 0; i < edit_estado.length; i++) {
      if (edit_estado[i].value == estado) {
        console.log(edit_estado[i].innerText)
        edit_estado[i].setAttribute('selected', '');
      }
    }
    document.querySelector('#edit_nombre_csugerido').textContent = nombre;
    document.querySelector('#edit_fecha_inicio').value = fecha_inicio;
    document.querySelector('#edit_fecha_fin').value = fecha_fin;

    $('#editModal').modal('toggle');

  })
</script>


<?php include '../views/components/lowerPart.php' ?>