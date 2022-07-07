
<?php include '../views/components/upperPart.php';?>
<?php include '../includes/administrateUsers.inc.php';?>

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
        <!-- REGISTRAR NUEVO USUARIO -->
          <!-- Modal -->
        <div class="modal fade" id="nuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="../includes/signupUser.inc.php" method="POST">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registrar un nuevo estado</h5>
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
                        <input class="form-control" type="text" aria-label="estado" name="estado" required>
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
                      <span class="fw-bold">Estados registrados</span>
                    </div>
                    <div class="col-6 text-end">
                      <!-- Button trigger modal -->
                      <button type="button" class="mt-2 btn register-btn text-white" data-bs-toggle="modal" data-bs-target="#nuevoUsuario">
                        <i class="bi bi-person-plus-fill"></i>
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
                          while($user = $users->fetch(PDO::FETCH_ASSOC)){?>
                          <?php 
                          //Hacer highlight a linea editada:
                          //Si la variable success existe, entonces pinta en color verde la linea editada.      
                          ?>
                          <?php if(isset($_GET["success"])){?>
                            <?php if($_GET["username"] == $user["user"]){ ?>
                              <tr class="table-success">
                            <?php } //FIN highlight a linea editada?>
                          <?php } else{ ?>
                          <tr>
                            <?php } ?>
                            <td ><?php echo $user["rol_name"]; ?></td>
                            <td><?php echo $user["firstname"]; ?></td>
                            <td><?php echo $user["lastname"]; ?></td>
                            <td><?php echo $user["user"]; ?></td>
                            <td class="text-center">
                              <button type="button" class="btn text-primary action-btn" data-bs-toggle="modal" data-bs-target="#editarUsuario_<?php echo $user["user"]; ?>" title="Editar usuario">
                                <i class="bi bi-pencil-fill"></i>
                              </button>
                              <button type="button" class="btn text-danger action-btn" data-bs-toggle="modal" data-bs-target="#delete_<?php echo $user["user"]; ?>" title="Eliminar usuario">
                                <i class="bi bi-trash3-fill"></i>
                              </button>

                            </td>
                          </tr>
                            <!-- ELIMINAR estado -->
                              <div class="modal fade" id="delete_<?php echo $user["user"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el estado <?php echo $user["user"]; ?>?</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                      <form action="../includes/deleteUser.inc.php" method="POST">
                                        <button value="<?php echo $user["user"]; ?>" class="btn btn-danger" name="username" type="submit">Eliminar</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- /ELIMINAR USUARIO -->

                          <!-- EDITAR ESTADO -->

                          <!-- /EDITAR ESTADO -->
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


 <?php include '../views/components/lowerPart.php' ?>