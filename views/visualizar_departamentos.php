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
                Visualizar Departamentos
              </div>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-header">
                <a href="visualizar.html">  Visualizar Áreas </a> < Visualizar Departamentos
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                  id="example"
                  class="table table-striped data-table"
                  style="width: 100%">
                  <thead>
                    <tr>
                      <th>Departamento</th>
                      <th>N° de trabajadores</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td> <a href="visualizar_trabajadores.php">Departamento de infraestructura</a> </td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Departamento de análisis y desarrollo</td>
                        <td>2</td>
                    </tr>     
                    <tr>
                        <td>Departamento de seguridad Informática</td>
                        <td>1</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Departamento de innovación</th>
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