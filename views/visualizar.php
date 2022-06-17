<?php include '../views/components/upperPart.php' ?>
  <script>
    document.querySelector('.visualizar').classList.add('link-active');
  </script>
    <!-- MAIN CONTENT OF THE PAGE-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <!-- Título de página -->
        <div class="row mb-2">
          <div class="col-md-12 fw-bold fs-3">
            <div class="card shadow">
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
        <!-- /Título de página -->
        <!-- Formulario direccion - departamento -->
        <div class="row mb-2 mb-2">
            <div class="col-md-12">
              <div class="card shadow">
                  <div class="card-header fw-bold">
                    Seleccione los datos solicitados
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="direccion" class="form-label">Seleccione una direccion</label>
                          <select name="direccion" class="form-select" aria-label="Default select example" id="direccion">
                            <option selected>Dirección</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
      
                        <div class="col-md-6">
                          <label for="departamento" class="form-label">Seleccione un departamento</label>
                          <select name="departamento" class="form-select" aria-label="Default select example" id="departamento">
                            <option selected>Departamento</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                      </div>

                    </div>
                </div>
              </div>
        </div>
        <!-- /Formulario direccion - departamento -->

        <!-- Tabla de trabajadores -->
        <div class="row mb-2">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-header">
                <div class="card-header">
                  Lista de trabajadores
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                    id="example"
                    class="table table-hover data-table"
                    style="width: 100%">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Cargo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-end">
                            <form action="visualizar_detalles.php">
                              <button type="submit" class="text-primary action-btn">
                                <i class="bi bi-search"></i></button>
                            </form>
                        </td>
                          <td>Javier</td>
                          <td>Arrue</td>
                          <td>8-941-1079</td>
                          <td>Analista</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                            <form action="visualizar_detalles.php">
                              <button type="submit" class="text-primary action-btn"><i class="bi bi-search"></i></button>
                            </form>
                        </td>
                        <td>Carlos</td>
                          <td>Gonzalez</td>
                          <td>8-190-1009</td>
                          <td>Jefe</td>
                      </tr>     
                      <tr>
                        <td class="text-end">
                            <form action="visualizar_detalles.php">
                              <button type="submit" class="text-primary action-btn"><i class="bi bi-search"></i></button>
                            </form>
                        </td>
                        <td>Camila</td>
                          <td>Torres</td>
                          <td>8-993-231</td>
                          <td>Analista</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Cargo</th>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Tabla de trabajadores -->

      </div>
    </main>
 <!-- /MAIN CONTENT OF THE PAGE-->    
 <?php include '../views/components/lowerPart.php' ?>