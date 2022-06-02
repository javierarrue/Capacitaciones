
<?php include '../views/components/upperPart.php';?>
<?php include '../includes/showUsers.inc.php';?>

  <script>
        document.querySelector('.administrar_usuarios').classList.add('link-active');
        /* --> MOSTRAR MODAL EN CARGA
        $(document).ready(function(){
        $("#nuevoUsuario").modal('show');
      });
      */
  </script>

  <!-- MAIN CONTENT OF THE PAGE-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 fw-bold fs-3">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-md-10 col-sm-6">
                      Administrar usuarios
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
                  <h5 class="modal-title" id="exampleModalLabel">Registrar un nuevo usuario</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      Nombre
                      <div class="mb-3">
                        <input class="form-control" type="text" aria-label="firstname" name="firstname" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      Apellido
                      <div class="mb-3">
                        <input class="form-control" type="text" aria-label="lastname" name="lastname" required>
                      </div>
                    </div>
                  </div>          
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      Usuario
                      <div class="mb-3">
                        <input class="form-control" type="text" aria-label="username" name="username" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      Contraseña
                      <div class="mb-3">
                        <input class="form-control" type="password" aria-label="password" name="password" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      Seleccionar rol
                      <select class="form-select" aria-label="rol" name="rol" required>
                        <option value="1">Admin</option>
                        <option value="3">Usuario</option>
                      </select>
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
            <div class="card">
              <div class="card-header">
                <div class="card-header">
                  <!-- Button trigger modal -->
                  <button type="button" class="mt-2 btn register-btn text-white" data-bs-toggle="modal" data-bs-target="#nuevoUsuario">
                    <i class="bi bi-person-plus-fill"></i>
                    Nuevo usuario
                  </button>
                </div>
                <div class="card-body">
                  <div class="row">
                    <!-- TABLA -->
                    <div class="table-responsive">
                      <table
                        id="example"
                        class="table table-striped data-table"
                        style="width: 100%">
                        <thead>
                          <tr>
                            <th>Accion</th>
                            <th>Rol</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <!--<th>Editar</th>
                            <th>Eliminar</th>-->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while($user = $users->fetch(PDO::FETCH_ASSOC)){?>
                          <tr>
                            <!-- EDITAR/ELIMINAR USUARIO -->
                            <td>
                              <a class="nav-link nav-item" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                  <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editarUsuario_<?php echo $user["user"]; ?>">
                                    Editar
                                  </a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_<?php echo $user["user"]; ?>">
                                    Eliminar
                                  </a>
                                </li>
                              </ul>
                            </td>
                            <!--/ EDITAR/ELIMINAR USUARIO -->
                            <td><?php echo $user["rol_id"]; ?></td>
                            <td><?php echo $user["firstname"]; ?></td>
                            <td><?php echo $user["lastname"]; ?></td>
                            <td><?php echo $user["user"]; ?></td>
                            
                            <!-- EDITAR USUARIO -->
                            <!-- <td> -->
                              <!--
                              <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editarUsuario_">
                                <i class="bi bi-pencil-square"></i>
                              </button>
                              -->
                                <!-- Modal -->
                              <div class="modal fade" id="editarUsuario_<?php echo $user["user"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="../includes/editUser.inc.php" method="POST">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar datos de usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-6 col-sm-12">
                                            Nombre
                                            <div class="mb-3">
                                              <input name="firstname" class="form-control" type="text" value="<?php echo $user["firstname"]; ?>" aria-label="readonly input example">
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-sm-12">
                                            Apellido
                                            <div class="mb-3">
                                              <input name="lastname" class="form-control" type="text" value="<?php echo $user["lastname"]; ?>" aria-label="readonly input example">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6 col-sm-12">
                                            Usuario
                                            <div class="mb-3">
                                              <input name="username" class="form-control" type="text" value="<?php echo $user["user"]; ?>" aria-label="readonly input example">
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-sm-12">
                                            Contraseña
                                            <div class="mb-3">
                                              <input name="password" class="form-control" type="text" value="" aria-label="readonly input example">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-mn-12">
                                            <select name="rol" class="form-select" aria-label="Default select example">
                                              <option selected>Seleccionar Rol</option>
                                              <option value="1">Admin</option>
                                              <option value="2">Usuario</option>
                                            </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-primary" name="submit">Guardar Cambios</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div> 
                            <!-- </td> -->
                            <!-- /EDITAR USUARIO -->

                            <!-- ELIMINAR USUARIO -->
                            <!-- <td> -->

                              <!--
                              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_">
                                  <i class="bi bi-trash3-fill"></i>
                              </button> -->

                                <!-- Modal -->
                              <div class="modal fade" id="delete_<?php echo $user["user"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el usuario <?php echo $user["user"]; ?>?</h5>
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
                            <!-- </td> -->
                            <!-- /ELIMINAR USUARIO -->

                          </tr>
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
      </div>
    </main>
  <!-- /MAIN CONTENT OF THE PAGE-->    


 <?php include '../views/components/lowerPart.php' ?>