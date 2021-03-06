
<?php include '../views/components/upperPart.php';?>
<?php include '../includes/administrateUsers.inc.php';?>

  <script>
        document.querySelector('.administrar_usuarios').classList.add('link-active');
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
                  <?php if(isset($_GET["errorRegister"])){?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $_GET["errorRegister"]?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php } ?>
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
                      Seleccionar rol
                      <select class="form-select" aria-label="rol" name="rol" required>
                        <?php
                          while($userRol = $roles->fetch(PDO::FETCH_ASSOC)){?>
                          <option 
                            value="<?php echo $userRol["id"]?>">
                              <?php echo $userRol["rol_name"]?>
                          </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      Contrase??a
                      <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary" type="button" id="showPassword1"><i id="eye1" class="bi bi-eye-fill"></i></button>
                        <input id="password1" name="password1" type="password" class="form-control"">
                      </div>
                    </div>
                    <div class="col-md-6">
                      Repetir contrase??a
                      <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary" type="button" id="showPassword2"><i id="eye2" class="bi bi-eye-fill"></i></button>
                        <input id="password2" name="password2" type="password" class="form-control"">
                      </div>
                    </div>
                  </div>
                  <div class="row">

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
                      <span class="fw-bold">Usuarios del sistema</span>
                    </div>
                    <div class="col-6 text-end">
                      <!-- Button trigger modal -->
                      <button type="button" class="mt-2 btn register-btn text-white" data-bs-toggle="modal" data-bs-target="#nuevoUsuario">
                        <i class="bi bi-person-plus-fill"></i>
                        Nuevo usuario
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
                            <th>Rol</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th class="text-center">Acci??n</th>
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
                            <!-- ELIMINAR USUARIO -->
                              <div class="modal fade" id="delete_<?php echo $user["user"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">??Desea eliminar el usuario <?php echo $user["user"]; ?>?</h5>
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

                          <!-- EDITAR USUARIO -->
                                <!-- Modal -->
                                <div class="modal fade" id="editarUsuario_<?php echo $user["user"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Editar datos de usuario: <?php echo $user["user"]?></h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#user-tab-<?php echo $user["id"]?>" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Editar Usuario</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#password-tab-<?php echo $user["id"]?>" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Editar Contrase??a</button>
                                        </li>
                                      </ul>
                                      <div class="tab-content" id="myTabContent">
                                        <!-- EDITAR DATOS -->
                                        <div class="tab-pane fade show active" id="user-tab-<?php echo $user["id"]?>" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                          <?php if(isset($_GET["errorEdit"])){?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong><?php echo $_GET["errorEdit"]?></strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                          <?php } ?>
                                          <form action="../includes/editUser.inc.php" method="POST">
                                            <div class="row mt-2">
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
                                                  <input name="username_new" class="form-control" type="text" value="<?php echo $user["user"]; ?>" aria-label="readonly input example">
                                                </div>
                                              </div>
                                              <div class="col-md-6 col-sm-12">
                                                <div class="col-md-12 mb-3">
                                                  Seleccionar rol
                                                  <select class="form-select" aria-label="rol" name="rol_id" required>
                                                    <?php
                                                        //Vuelvo a correr el execute().
                                                        //??Porque?:
                                                        //PDOStatment (el cual $roles es) es un cursor que se mueve hacia adelante, por lo tanto una vez consumido, este no volvera a la posicion inicial.
                                                        //Por eso es necesario volver ejecutar el PDOStatmente, para reiniciar la posicion de este :=)
                                                        $roles->execute();                       
                                                        while($rol = $roles->fetch(PDO::FETCH_ASSOC)){
                                                      ?>
                                                      <option 
                                                        value="<?php echo $rol["id"]?>"
                                                          <?php if($user["rol_name"] ==  $rol["rol_name"]){?> 
                                                            selected 
                                                          <?php }?>
                                                        >
                                                          <?php echo $rol["rol_name"]?>
                                                      </option>
                                                    <?php }?>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                              <input type="hidden" name="user_id" value="<?php echo $user["id"]?>">
                                              <input type="hidden" name="username_old" value="<?php echo $user["user"]?>">
                                              <button type="submit" class="btn btn-primary" name="submit">Guardar Cambios</button>
                                            </div>
                                          </form>
                                        </div>
                                        <!--/EDITAR DATOS -->
                                        <!-- EDITAR CONTRASE??A-->
                                        <div class="tab-pane fade" id="password-tab-<?php echo $user["id"]?>" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                          <?php if(isset($_GET["errorEdit"])){?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <strong><?php echo $_GET["errorEdit"]?></strong>
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php } ?>  
                                          <form action="../includes/editPassword.inc.php" method="POST">
                                            <div class="row mt-2">
                                              <div class="col-md-12">
                                              Contrase??a
                                              <div class="input-group mb-3">
                                                <button class="btn btn-outline-secondary" type="button" onclick="showOrhidePassword1(<?php echo $user["id"]?>)">
                                                  <i id="eye1-<?php echo $user["id"]?>" class="bi bi-eye-fill"></i>
                                                </button>
                                                <input id="password1-<?php echo $user["id"]?>" name="password1" type="password" class="form-control"">
                                              </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-12">
                                                Repetir contrase??a
                                                <div class="input-group mb-3">
                                                  <button class="btn btn-outline-secondary" type="button" onclick="showOrhidePassword2(<?php echo $user["id"]?>)">
                                                    <i id="eye2-<?php echo $user["id"]?>" class="bi bi-eye-fill"></i>
                                                  </button>
                                                  <input id="password2-<?php echo $user["id"]?>" name="password2" type="password" class="form-control"">
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                                                  <input type="hidden" name="user_id" value="<?php echo $user["id"]?>">
                                                  <input type="hidden" name="username" value="<?php echo $user["user"]?>">
                                                  <button type="submit" class="btn btn-primary" name="submit">Guardar Cambios</button>
                                                </div>
                                            </div>
                                          </form>
                                        </div>
                                        <!-- /EDITAR CONTRASE??A-->
                                      </div>
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

<script>

  //BOTON - ESCONDER Y MOSTRAR CONTRASE??A
  var btn1 = document.querySelector("#showPassword1");
  var passwordInput1 = document.querySelector("#password1");
  var btn2 = document.querySelector("#showPassword2");
  var passwordInput2 = document.querySelector("#password2");
  var eye1 = document.querySelector("#eye1");
  var eye2 = document.querySelector("#eye2");

  btn1.addEventListener('click', () => {
    if(passwordInput1.type == "text"){
      passwordInput1.type = "password";
      eye1.classList = "bi bi-eye-fill";
    }else if(passwordInput1.type == "password"){
      passwordInput1.type = "text";
      eye1.className = "bi bi-eye-slash-fill";
    }
    
  });

  btn2.addEventListener('click', () => {
    if(passwordInput2.type == "text"){
      passwordInput2.type = "password";
      eye2.classList = "bi bi-eye-fill";
    }else if(passwordInput2.type == "password"){
      passwordInput2.type = "text";
      eye2.className = "bi bi-eye-slash-fill";
    }
    
  });

function showOrhidePassword1(id){
  var passwordInput1 = document.querySelector("#password1-"+id);
  var eye1 = document.querySelector("#eye1-"+id);
  
  if(passwordInput1.type == "text"){
      passwordInput1.type = "password";
      eye1.classList = "bi bi-eye-fill";
    }else if(passwordInput1.type == "password"){
      passwordInput1.type = "text";
      eye1.className = "bi bi-eye-slash-fill";
    }
}

function showOrhidePassword2(id){
  var passwordInput2 = document.querySelector("#password2-"+id);
  var eye2 = document.querySelector("#eye2-"+id);

  if(passwordInput2.type == "text"){
      passwordInput2.type = "password";
      eye2.classList = "bi bi-eye-fill";
    }else if(passwordInput2.type == "password"){
      passwordInput2.type = "text";
      eye2.className = "bi bi-eye-slash-fill";
    }
}

</script>
 <?php include '../views/components/lowerPart.php' ?>