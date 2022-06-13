<?php include '../views/components/upperPart.php' ?>
  <script>
    document.querySelector('.home').classList.add('link-active');
  </script>

  <!-- MAIN CONTENT OF THE PAGE-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-md-12 fs-3">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-md-10 col-sm-6">
                      Bienvenido al sistema, <?php echo $_SESSION["firstname"] ." ". $_SESSION["lastname"];?>
                  </div>
                  <div class="col-md-2 col-sm-6 text-center">
                    <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid " style="width:5rem;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-1">
          <div class="col-md-6 col-sm-12">
            <div class="card shadow-sm mb-1 rounded">
                <div class="card-body mx-3">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <small>Cursos Pendientes</small>
                      <h4 class="card-title">25</h4>
                    </div>
                    <div class="col-4 text-end">
                     <h1><i class="bi bi-hourglass-split text-primary"></i></h1>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card shadow-sm mb-1 rounded">
              <div class="card-body mx-3">
                <div class="row align-items-center">
                  <div class="col-8">
                    <small>Cursos Impartidos</small>
                    <h4 class="card-title">194</h4>
                  </div>
                  <div class="col-4 text-end">
                    <span class="fs-1"><i class="bi bi-file-earmark-check-fill text-success"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card shadow-sm rounded">
                <div class="card-body mx-3">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <small>Cursos Cancelados</small>
                      <h4 class="card-title">15</h4>
                    </div>
                    <div class="col-4 text-end">
                      <h1><i class="bi bi-file-earmark-excel-fill text-danger"></i></h1>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card shadow-sm rounded">
                <div class="card-body mx-3">
                  <div class="row justify-content-end">
                    <div class="col-10">
                      <small>Programado para el siguiente año</small>
                      <h4 class="card-title">54</h4>
                    </div>
                    <div class="col-2 text-end">
                      <h1><i class="bi bi-calendar-check text-secondary"></i></h1>
                    </div>
                  </div>
                </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-header">
                  Data tables
                </div>
                <div class="card-body">
                  <!-- GRÁFICA -->
                  <div>
                    <canvas id="myChart"></canvas>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </main>
  <!-- /MAIN CONTENT OF THE PAGE-->    
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/charts.js"></script>

<?php include '../views/components/lowerPart.php' ?>