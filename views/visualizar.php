<?php include '../views/components/upperPart.php' ?>
  <script>
    document.querySelector('.visualizar').classList.add('link-active');
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
                  Visualizar direcciones
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
                      <th>Dirección</th>
                      <th>N° de departamentos</th>
                      <th>N° de trabajadores</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td> <a href="visualizar_departamentos.php">Marina Mercante</a> </td>
                        <td>5</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>Gente de Mar</td>
                        <td>2</td>
                        <td>63</td>
                    </tr>     
                    <tr>
                        <td>Puertos</td>
                        <td>1</td>
                        <td>33</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Área</th>
                      <th>N° de departamentos</th>
                      <th>N° de trabajadores</th>
                    </tr>
                  </tfoot>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </main>
 <!-- /MAIN CONTENT OF THE PAGE-->    
 <?php include '../views/components/lowerPart.php' ?>