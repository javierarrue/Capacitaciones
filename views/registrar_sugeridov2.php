<?php include '../views/components/upperPart.php'; ?>
<?php include '../includes/cursosSugeridos.inc.php'; ?>

  <script>
    document.querySelector('.registrar_sugerido').classList.add('link-active');
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
                  Registrar cursos sugeridos
                </div>
                <div class="col-md-2 col-sm-6 text-center">
                  <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid " style="width:5rem;">
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>

        <form method="POST" action="../includes/nuevoCursoSugerido.inc.php">
          <div class="row mb-2">
            <div class="col-md-12">
              <div class="card shadow-sm">
                <div class="card-header fw-bold">
                    Ingrese los datos solicitados
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="direccion" class="form-label">Seleccione una dirección</label>
                      <select name="direccion" class="form-select" aria-label="Default select example" id="direccion">
                        <option class="fw-bold" selected>Direccion</option>
                        <?php foreach($direcciones as $direccion => $direccion_codigo) {?>
                          <option value=<?php echo $direccion_codigo ?>><?php echo $direccion?></option>
                        <?php }?>
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
                </div>
              </div>
            </div>
          </div>

          <!-- REGISTRAR CURSOS SUGERIDOS -->
          <div class="row mb-2" id="seccion2" style="opacity:1;">
            <div class="col-md-12">
              <div class="card shadow-sm">
                <div class="card-header fw-bold">
                  Registrar cursos sugeridos 
                </div>
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-1">
                        <div class="row align-items-center mb-3">
                          <div class="col-md-10 col-sm-12">
                            <input class="form-control cursoSugeridoInput cursoSugeridoText"  placeholder="Nombre del curso" type="text" aria-label="input example" name="cursos[0]" id="curso0" required>
                          </div>
                          <div class="col-md-2 col-sm-12">

                            <div class="btn-group" role="group" aria-label="Aceptado o No aceptado">
                              <input type="radio" class="btn-check" name="analisis0" id="btnAccept0" autocomplete="off" value="aceptado" required>
                              <label class="btn btn-outline-success" for="btnAccept0" data-bs-toggle="tooltip" data-bs-placement="top" title="Aceptar curso"><i class="bi bi-check"></i></label>

                              <input type="radio" class="btn-check" name="analisis0" id="btnNotAccept0" autocomplete="off" value="noAceptado" required>
                              <label class="btn btn-outline-primary" for="btnNotAccept0" data-bs-toggle="tooltip" data-bs-placement="top" title="Rechazar curso"> <i class="bi bi-x"></i> </label>
                            </div>
                          </div> 
                        </div>
                      </div>

                      <!-- ESPACIO PARA LA CREACION DE NUEVOS INPUTS-->
                      <div class="cursos">
                      </div>
                      <!-- /ESPACIO PARA LA CREACION DE NUEVOS INPUTS-->

                      <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="button" class="btn btn-outline-success addFieldBtn">Añadir nueva línea</button>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="d-grid gap-2 col-md-4 mx-auto">
                      <button type="submit" name="submit" class="btn btn-primary text-uppercase register-btn">Registrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /REGISTRAR CURSOS SUGERIDOS-->
          
        </form>
      </div>
    </main>
 <!-- /MAIN CONTENT OF THE PAGE-->    
   <!-- SELECT2 -->
   <script src="../js/select2.js"></script>
  <script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.form-select').select2({
        tags: true
      });
  });
  </script>
  <!-- /SELECT2 -->

 <script src="../js/suggestedCoursesv2.js"></script>
 <script src="../js/ajaxSelect.js"></script>


<?php include '../views/components/lowerPart.php' ?>