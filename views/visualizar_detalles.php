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
                        <?php echo $colaboradorDetalle["nombre"]?>
                      </p>
                    </div>

                    <div class="col-6">
                      <p>
                        <span class="text-muted">Apellido</span>
                        <br>
                        <?php echo $colaboradorDetalle["apellido"]?>
                      </p>
                    </div>

                    <div class="col-6">
                      <p>
                        <span class="text-muted">Cédula</span>
                        <br>
                         <span id="cedula_trabajador"><?php echo $colaboradorDetalle["cedula"]?></span>
                      </p>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <p>
                      <span class="text-muted">Dirección</span>
                      <br>
                      <?php echo $colaboradorDetalle["direccion"]?>
                    </p>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <p>
                      <span class="text-muted"> Departamento </span>
                      <br>
                      <?php echo $colaboradorDetalle["depto"]?>
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <p>
                      <span class="text-muted">Cargo</span>
                      <br>
                      <?php echo $colaboradorDetalle["ocupacion"]?>
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
                    <table
                      id="table1"
                      class="table table-striped data-table table-hover"
                      style="width: 100%">
                      <thead>
                        <tr>
                          <th>Curso</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for($i= 0 ; $i<count($cSugeridosColaborador);$i++){ ?>
                          <tr>
                            <td><?php echo $cSugeridosColaborador[$i]["csugerido"]?></td>
                          </tr>
                        <?php }?>
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
                    <table
                    id="table2"
                    class="table data-table table-hover table-responsive"
                    style="width: 100%">
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

                      <?php for($i= 0 ; $i<count($cSugeridosColaborador);$i++){ ?>
                        <tr id="tr_<?php echo $i?>">
                          <td class="text-end">
                            <button type="button" data-role="delete" data-id="<?php echo $i ?>" class="btn text-danger action-btn" title="Eliminar Curso" id="delete">
                              <i class="bi bi-trash3-fill"></i>
                            </button>
                            <button type="button" class="btn text-primary action-btn" data-bs-toggle="modal" data-bs-target="#edit_<?php echo $i ?>" title="Editar Curso">
                              <i class="bi bi-pencil-fill"></i>
                            </button>
                          </td>
                          <td data-target="nombre" id="csugerido-nombre_<?php echo $i?>"><?php echo $cSugeridosColaborador[$i]["csugerido"]?></td>
                          <td class="" style="font-size:1.1em" data-target="analisis"> 
                          <?php if($cSugeridosColaborador[$i]["analisis"] == "aceptado"){?>
                            <span class="<?php echo $aceptado?>">
                          <?php }else{?>
                            <span class="<?php echo $rechazado?>">
                          <?php }?>
                              <?php echo $cSugeridosColaborador[$i]["analisis"]?>
                            </span>
                          </td>
                          <td data-target="estado"><!-- ESTADOS -->
                            <select class="form-select" aria-label="Default select example">
                              <?php 
                                while($estado = $estados->fetch(PDO::FETCH_ASSOC)){?>

                                <option value="<?php echo $estado["id_estado"];?>"
                                  <?php if($cSugeridosColaborador[$i]["estado"] ==  $estado["id_estado"]){?> selected <?php }?>>
                                  <?php echo $estado["estado"];?>
                                </option>

                              <?php }
                                //Vuelvo a correr el execute().
                                //¿Porque?:
                                //PDOStatment (el cual $roles es) es un cursor que se mueve hacia adelante, por lo tanto una vez consumido, este no volvera a la posicion inicial.
                                //Por eso es necesario volver ejecutar el PDOStatmente, para reiniciar la posicion de este :=)
                               $estados->execute();  
                            ?>
                            </select>
                          </td><!-- /ESTADOS -->
                          <!-- FECHA INICIO -->
                          <td data-target="fecha_inicio"><input type="date" name="fecha_inicio" value="<?php echo $cSugeridosColaborador[$i]["fecha_inicio"]?>"> </td>
                          <!-- FECHA FIN -->
                          <td data-target="fecha_fin"><input type="date" name="fecha_fin" value="<?php echo $cSugeridosColaborador[$i]["fecha_fin"]?>"> </td>
                          <!-- CONGRUENCIA -->
                          <td class="" style="font-size:1.1em"> 
                            <span class="<?php echo $congruente ?>">
                              Congruente
                            </span>
                          </td>
                          <!-- /CONGRUENCIA -->
                        </tr>

                        <!-- Modal EDITAR-->
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
                        <!-- /MODAL EDITAR -->
                      <?php }?>

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
                    <table
                        id="table1"
                        class="table table-striped data-table table-hover"
                        style="width: 100%">
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


  <!-- ELIMINAR USUARIO -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el curso <span id="delete_nombre_csugerido"></span> ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <form action="../includes/deleteCSugeridoColaborador.inc.php" method="POST">
            <button value="" class="btn btn-danger" name="id" type="submit" id="delete_id_csugerido">Eliminar</button>
            <input type="hidden" name="cedula" value="" id="delete_cedula_trabajador">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /ELIMINAR USUARIO -->

  <script>
    $(document).ready(function(){
      $(document).on('click', 'button[data-role=delete]',function(){
        
        var id = $(this).data('id');
         /*
        
        var analisis = $('#tr_'+id).children('td[data-target=analisis]').text();
        var estado = $('#tr_'+id).children('td[data-target=estado]').text();
        var fecha_inicio = $('#tr_'+id).children('td[data-target=fecha_inicio]').text();
        var fecha_fin = $('#tr_'+id).children('td[data-target=fecha_fin]').text();
        */
        var cedula = $('#cedula_trabajador').text();
        var nombre = $('#tr_'+id).children('td[data-target=nombre]').text();

        console.log("Nombre: " + nombre)
        console.log("Cedula: " + cedula)

        document.querySelector('#delete_nombre_csugerido').textContent = nombre;
        document.querySelector('#delete_cedula_trabajador').value = cedula;
        
        $('#deleteModal').modal('toggle');
      })
    })
  </script>


 <?php include '../views/components/lowerPart.php' ?>