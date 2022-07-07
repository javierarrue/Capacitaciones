
<?php include '../views/components/upperPart.php';?>
<?php include '../includes/mostrarEstados.inc.php';?>

  <script>
        document.querySelector('.administrar_estados').classList.add('link-active');
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
                      Administrar estados
                  </div>
                  <div class="col-md-2 col-sm-6 text-center">
                    <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid " style="width:5rem;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- REGISTRAR NUEVO ESTADO -->
          <!-- Modal -->
          <div class="modal fade" id="nuevoEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form action="../includes/nuevoEstado.inc.php" method="POST">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registrar un nuevo estado</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 mt-3">

                      <div class="mb-1">
                        <!-- VERSION ALTERNATIVA ✓✓✓-->
                        <div class="row align-items-center mb-3">
                          <div class="col-md-12">
                            <label for="curso" class="form-label">Añadir estados</label>
                            <input class="form-control estadoText estadoInput" placeholder="Nombre del estado" type="text" aria-label="readonly input example" name="estados[0]" id="curso">
                          </div>
                        </div>
                      </div>

                      <div class="estados">
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
        <!-- /REGISTRAR NUEVO ESTADO -->

        <div class="row">
          <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-6">
                      <span class="fw-bold">Estados registrados</span>
                    </div>
                    <div class="col-6 text-end">
                      <!-- Button trigger modal -->
                      <button type="button" class="mt-2 btn register-btn text-white" data-bs-toggle="modal" data-bs-target="#nuevoEstado">
                        <i class="bi bi-clipboard-plus"></i>
                        Nuevo estado
                      </button>
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
                            <th>Estado</th>
                            <th class="text-center">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          while($estado = $estados->fetch(PDO::FETCH_ASSOC)){?>
                          <?php 
                          //Hacer highlight a linea editada:
                          //Si la variable success existe, entonces pinta en color verde la linea editada.      
                          ?>
                          <?php if(isset($_GET["successEdit"])){?>
                            <?php if($_GET["estado"] == $estado["estado"]){ ?>
                              <tr class="table-success">
                            <?php } //FIN highlight a linea editada?>
                          <?php } else{ ?>
                          <tr>
                            <?php } ?>
                            <td ><?php echo $estado["estado"]; ?></td>
                            <td class="text-center">
                              <button type="button" class="btn text-primary action-btn" data-bs-toggle="modal" data-bs-target="#editarEstado_<?php echo $estado["id_estado"]; ?>" title="Editar estado">
                                <i class="bi bi-pencil-fill"></i>
                              </button>
                              <button type="button" class="btn text-danger action-btn" data-bs-toggle="modal" data-bs-target="#delete_<?php echo $estado["id_estado"]; ?>" title="Eliminar estado">
                                <i class="bi bi-trash3-fill"></i>
                              </button>
                            </td>
                          </tr>
                            <!-- ELIMINAR estado -->
                              <div class="modal fade" id="delete_<?php echo $estado["id_estado"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el estado <?php echo $estado["estado"]; ?>?</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                      <form action="../includes/deleteEstado.inc.php" method="POST">
                                        <button value="<?php echo $estado["id_estado"]; ?>" class="btn btn-danger" name="estado_id" type="submit">Eliminar</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- /ELIMINAR ESTADO -->

                          <!-- EDITAR ESTADO -->
                                <!-- Modal -->
                                <div class="modal fade" id="editarEstado_<?php echo $estado["id_estado"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="../includes/nuevoEstado.inc.php" method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar estado</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if(isset($_GET["errorRegister"])){?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong><?php echo $_GET["errorRegister"]?></strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                        Nombre del estado
                                                        <div class="mb-3">
                                                            <input class="form-control" value="<?php echo $estado["estado"]?>" type="text" aria-label="estado" name="estado" required>
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
                             <!-- /EDITAR USUARIO -->
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
  <script src="../js/estados.js"></script>

 <?php include '../views/components/lowerPart.php' ?>