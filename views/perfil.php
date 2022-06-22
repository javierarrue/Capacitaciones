<?php include '../views/components/upperPart.php' ?>
    <!-- MAIN CONTENT OF THE PAGE-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-md-12 fs-3">
            <div class="card shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-md-10 col-sm-6">
                      Perfil de usuario
                  </div>
                  <div class="col-md-2 col-sm-6 text-center">
                    <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid " style="width:5rem;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">

        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Editar datos de usuario
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control" type="text" value="<?php echo $_SESSION["firstname"]?>" aria-label="input example" id="name">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido</label>
                        <input class="form-control" type="text" value="<?php echo $_SESSION["lastname"]?>" aria-label="input example" id="lastname">
                      </div>
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
    </main>
 <!-- /MAIN CONTENT OF THE PAGE-->    
 <?php include '../views/components/lowerPart.php' ?>