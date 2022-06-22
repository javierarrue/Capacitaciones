<?php include '../views/components/upperPart.php' ?>
  <script>
    document.querySelector('.registrar_sugerido').classList.add('link-active');
  </script>

    <!-- MAIN CONTENT OF THE PAGE-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-12 fw-bold fs-3">
            <div class="card shadow">
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

        <form method="get" action="registrar_sugerido.php">
          <div class="row mb-2">
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-header fw-bold">
                    Ingrese los datos solicitados
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="direccion" class="form-label">Seleccione una dirección</label>
                      <select name="direccion" class="form-select" aria-label="Default select example" id="direccion">
                        <option selected>Dirección</option>
                        <option value="1">Dirección 3</option>
                        <option value="2">Dirección 2</option>
                        <option value="3">Dirección 3</option>
                      </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                      <label for="departamento" class="form-label">Seleccione un departamento</label>
                      <select name="departamento" class="form-select" aria-label="Default select example" id="departamento">
                        <option selected>Departamento</option>
                        <option value="Departamento 1">Departamento </option>
                        <option value="Departamento 2">Departamento 2</option>
                        <option value="Departamento 3">Departamento 3</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="cargo" class="form-label">Seleccione un cargo específico</label>
                      <select class="form-select" name="cargo" id="cargo" onchange="mostrar();">
                        <option value="AL">Jefe</option>
                        <option value="WY">Analista</option>
                        <option value="WY">Secretaria</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- REGISTRAR CURSOS SUGERIDOS -->
          <div class="row mb-2" id="seccion2" style="opacity:0;">
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-header fw-bold">
                Registrar cursos sugeridos 
                </div>
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-1">
                        <div class="row align-items-center mb-3">
                          <div class="col-md-10 col-sm-12">
                            <input class="form-control cursoSugeridoInput cursoSugeridoText" type="text" aria-label="input example" name="cursos[0]" id="curso0" required>
                          </div>
                          <div class="col-md-2 col-sm-12">

                            <div class="btn-group" role="group" aria-label="Aceptado o No aceptado">
                              <input type="radio" class="btn-check" name="analisis" id="btnAccept0" autocomplete="off" value="aceptado" required>
                              <label class="btn btn-outline-success" for="btnAccept0" data-bs-toggle="tooltip" data-bs-placement="top" title="Aceptar curso"><i class="bi bi-check"></i></label>

                              <input type="radio" class="btn-check" name="analisis" id="btnNotAccept0" autocomplete="off" value="noAceptado" required>
                              <label class="btn btn-outline-primary" for="btnNotAccept0" data-bs-toggle="tooltip" data-bs-placement="top" title="Rechazar curso"> <i class="bi bi-x"></i> </label>
                            </div>

                          <!--
                            <button class="btn btn-outline-success btn-sm" type="button" onclick="accept();" id="accept0"> <i class="bi bi-check"></i> </button>
                            <button class="btn btn-outline-primary btn-sm" type="button" onclick="notAccept();" id="notAccept0"> <i class="bi bi-x"></i> </button>
                          -->
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
                      <!--
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-2 fw-bold">Cursos oficiales</div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header">
                              <div class="card-header">
                                Data tables
                              </div>
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table
                                  id="example"
                                  class="table table-striped data-table"
                                  style="width: 100%">
                                    <thead>
                                      <tr>
                                        <th>Curso</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Excel</td>
                                      </tr>
                                      <tr>
                                        <td>Linux</td>
                                      </tr>     
                                      <tr>
                                        <td>PHP</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      -->
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
          <!-- /REGISTRAR CURSOS SUGERIDOS-->
          
        </form>
      </div>
    </main>
 <!-- /MAIN CONTENT OF THE PAGE-->    
 <script src="../js/suggestedCourses.js"></script>

  <!-- SELECT2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.form-select').select2();
  });
  </script>
  <!-- /SELECT2 -->
<?php include '../views/components/lowerPart.php' ?>