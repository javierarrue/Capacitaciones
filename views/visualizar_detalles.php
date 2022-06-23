<?php include '../views/components/upperPart.php' ?>
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
    <main class="mt-5 pt-2">
      <div class="container-fluid">
        <div class="row mb-2 mt-2">
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

        <div class="row mb-2 g-2">
          <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
            <div class="card shadow" style="height: 100%;">
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
                        <b> Javier Arrue</b>
                      </p>
                    </div>

                    <div class="col-6">
                      <p>
                        <span class="text-muted">Cédula</span>
                        <br>
                        <b>8-941-1079</b> 
                      </p>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <p>
                      <span class="text-muted">Dirección</span>
                      <br>
                      <b>...</b> 
                    </p>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <p>
                      <span class="text-muted"> Departamento </span>
                      <br>
                      <b>...</b>
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <p>
                      <span class="text-muted">Cargo</span>
                      <br>
                      <b>Analista</b> 
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="card shadow">
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

        <div class="row mb-2 g-1">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow">
                <div class="card-header">
                  <b>Cursos Sugeridos</b>
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
                        <th data-priority="2">Fecha Inicio</th>
                        <th data-priority="2">Fecha Fin</th>
                        <th>Validad</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-end">
                          <button type="button" class="btn text-danger action-btn" data-bs-toggle="modal" data-bs-target="#delete_" title="Eliminar usuario">
                            <i class="bi bi-trash3-fill"></i>
                          </button>
                          <button type="button" class="btn text-primary action-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Editar usuario">
                            <i class="bi bi-pencil-fill"></i>
                          </button>
                        </td>
                        <td>GAS</td>
                        <td class="" style="font-size:1.1em"> 
                          <span class="<?php echo $aceptado?>">
                            Aceptado
                          </span>
                        </td>
                        <td>
                          <select class="form-select" aria-label="Default select example">
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
                          </td>
                          <td>-</td>
                          <td>-</td>
                          <td class="" style="font-size:1.1em"> 
                            <span class="<?php echo $congruente ?>">
                              Congruente
                            </span>
                          </td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <button type="button" class="btn text-danger action-btn" data-bs-toggle="modal" data-bs-target="#delete_" title="Eliminar usuario">
                            <i class="bi bi-trash3-fill"></i>
                          </button>
                          <button type="button" class="btn text-primary action-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Editar usuario"><i class="bi bi-pencil-fill"></i></button>
                        </td>
                        <td>Investigación de accidente</td>
                          <td class="" style="font-size:1.1em"> 
                            <span class="<?php echo $aceptado ?>">
                              Aceptado
                            </span>
                          </td>
                          <td>
                            <select class="form-select" aria-label="Default select example">
                              <option> Pendiente </option>
                              <option value="1" selected> Impartido</option>
                              <option value="2"> En desarrollo</option>
                              <option value="3"> Cancelado</option>
                              <option value="3"> Para el siguiente año</option>
                              <option value="3"> En trámite de compras</option>
                              <option value="3"> En trámite con proveedor local</option>
                              <option value="3"> Solicitado a organismo internacional</option>
                              <option value="3"> A incluir en el PAC del siguiente año</option>
                              <option value="3"> Otro</option>
                            </select>
                          </td>
                          <td>
                            <input type="date" name="" id="" value="2022-03-10">
                          </td>
                          <td>
                            <input type="date" name="" id="" value="2022-03-15">
                          </td>
                          <td class="" style="font-size:1.1em"> 
                            <span class="<?php echo $noCongruente?>">
                              No congruente
                            </span>
                          </td>
                      </tr>     
                      <tr>
                        <td class="text-end">
                          <button type="button" class="btn text-danger action-btn" data-bs-toggle="modal" data-bs-target="#delete_" title="Eliminar usuario">
                                <i class="bi bi-trash3-fill"></i>
                          </button>
                          <button type="button" class="btn text-primary action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Editar usuario"><i class="bi bi-pencil-fill"></i></button>
                        </td>
                        <td>Cocina</td>
                        <td class="" style="font-size:1.1em"> 
                            <span class="<?php echo $rechazado?>">
                              Rechazado
                            </span>
                        </td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                              <option> Pendiente </option>
                              <option value="1"> Impartido</option>
                              <option value="2"> En desarrollo</option>
                              <option value="3" selected> Cancelado</option>
                              <option value="3"> Para el siguiente año</option>
                              <option value="3"> En trámite de compras</option>
                              <option value="3"> En trámite con proveedor local</option>
                              <option value="3"> Solicitado a organismo internacional</option>
                              <option value="3"> A incluir en el PAC del siguiente año</option>
                              <option value="3"> Otro</option>
                            </select>
                          </td>
                          <td>-</td>
                          <td>-</td>
                        <td class="" style="font-size:1.1em"> 
                            <span class="<?php echo $noCongruente?>">
                              No congruente
                            </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
            </div>
          </div>

        </div>

        <div class="row mb-2 g-1">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card shadow">
                <div class="card-header">
                  <b>Cursos impartidos</b>
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
 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar curso: GAS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-2">
          <div class="col-12">
            <label for="courseName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="courseName" placeholder="Curso" value="GAS">
          </div>
        </div>
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

 <?php include '../views/components/lowerPart.php' ?>