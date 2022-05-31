<?php include '../views/components/upperPart.php' ?>
    <!-- MAIN CONTENT OF THE PAGE-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 fw-bold fs-3">
            <div class="card">
              <div class="card-body">

                <div class="row align-items-center">
                    <div class="col-md-10 col-sm-6">
                        Registrar un nuevo usuario
                    </div>
                    <div class="col-md-2 col-sm-6 text-center">
                        <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid " style="width:5rem;">
                    </div>
                </div>
              </div>
            </div>
            </div>
        </div>

        <form action="">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-header">
                    Inserte los datos solicitados
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        Nombre
                        <div class="mb-3">
                          <input class="form-control" type="text" value="..." aria-label="readonly input example">
                        </div>
                      </div>

                      <div class="col-md-6 mb-3">
                        Apellido
                        <div class="mb-3">
                          <input class="form-control" type="text" value="..." aria-label="readonly input example">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        Usuario
                        <div class="mb-3">
                          <input class="form-control" type="text" value="..." aria-label="readonly input example">
                        </div>
                      </div>

                      <div class="col-md-6 mb-3">
                        Contraseña
                        <div class="mb-3">
                          <input class="form-control" type="text" value="..." aria-label="readonly input example">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Seleccionar Rol</option>
                          <option value="1">Admin</option>
                          <option value="2">Usuario</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="d-grid gap-2 col-md-4 mx-auto">
                        <button type="submit" class="btn btn-primary text-uppercase register-btn">Registrar</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
    </main>
 <!-- /MAIN CONTENT OF THE PAGE-->    
 <?php include '../views/components/lowerPart.php' ?>