<?php include '../views/components/upperPart.php' ?>
  <script>
    document.querySelector('.home').classList.add('link-active');
  </script>

  <!-- MAIN CONTENT OF THE PAGE-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-12 fs-3">
            <div class="card shadow">
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

        <div class="row g-2 mb-2">

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="content">
              <div class="card shadow rounded card-pendientes card-homepage">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <small class="text-primary">Pendientes</small>
                      <h5 class="card-title">25</h5>
                    </div>
                    <div class="col-4 text-end">
                      <h1><i class="bi bi-hourglass-split text-primary"></i></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="content">
              <div class="card shadow rounded card-impartidos card-homepage">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                    <small class="text-success">Impartidos</small>
                      <h5 class="card-title">194</h5>
                    </div>
                    <div class="col-4 text-end">
                      <h1><i class="bi bi-file-earmark-check-fill text-success"></i></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="content">
              <div class="card shadow rounded card-cancelados card-homepage">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <small class="text-danger">Cancelados</small>
                      <h5 class="card-title">15</h5>
                    </div>
                    <div class="col-4 text-end">
                      <h1><i class="bi bi-file-earmark-excel-fill text-danger"></i></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="content">
              <div class="card shadow rounded card-en-desarrollo card-homepage">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8 text-wrap">
                      <small class="text-dark">En desarrollo</small>
                      <h5 class="card-title">15</h5>
                    </div>
                    <div class="col-4 text-end">
                      <h1><i class="bi bi-person-workspace text-dark"></i></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- SECCION GRAFICAS 1 -->
        <div class="row g-2">

          <div class="col-md-8 col-sm-12">
            <div class="content">
              <div class="card shadow">
                  <div class="card-header text-center fw-bold">
                    Estado de los cursos sugeridos
                  </div>
                  <div class="card-body">
                    <!-- GRÁFICA -->
                    <div>
                      <canvas id="courses"></canvas>
                    </div>

                  </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-12">
            <div class="content">
              <div class="card shadow" style="height: 100%;">
                <div class="card-header text-center fw-bold">
                  Departamentos con mas cursos sugeridos
                </div>
                <div class="card-body">
                  <!-- GRÁFICA -->
                  <div>
                    <canvas id="direcciones"></canvas>
                  </div>
                </div>
              </div>
          </div>
          </div>

      </div>
      <!-- /SECCION GRAFICAS 1-->

  
    </main>
  <!-- /MAIN CONTENT OF THE PAGE-->    
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/charts.js"></script>

<?php include '../views/components/lowerPart.php' ?>