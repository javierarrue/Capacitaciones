<?php 
  include "../includes/verifySession.inc.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
    
    <link href="../css/datatable/datatables.min.css" rel="stylesheet" >

    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">-->
    <link rel="icon" href="../resources/AMP-LOGO-2-01.png">
    <link rel="stylesheet" href="../css/icons/bootstrap-icons.css">
    <!-- SELECT2 - ESTILOS -->
    <link href="../css/select2.css" rel="stylesheet" />
    <title>Sistema de Cursos Sugeridos</title>
  </head>
  <body>

    <!-- JSQUERY-->
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <!-- /JQUERY-->
    
    <!-- BOOTSTRAP JS -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- /BOOTSTRAP JS -->

    <!-- TOP NAV BAR-->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
      <div class="container-fluid">
      
        <!-- OFF CANVAS BUTTON --> 
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" 
          aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample" ></span>
        </button>
        <!-- /OFF CANVAS BUTTON -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown profile">
              <a class="nav-link dropdown-toggle text-end text-dark fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span><?php echo $_SESSION["firstname"] ." ". $_SESSION["lastname"];?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="perfil.php"><i class="bi bi-person me-2"></i>Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../includes/logout.inc.php"><i class="bi bi-box-arrow-in-right me-2"></i>Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>

      </div>
    </nav>
    <!-- /TOP NAV BAR-->

    <!-- OFF CANVAS (SIDE NAV)-->
    <div class="offcanvas offcanvas-start sidebar-nav text-white apm-blue" tabindex="-1" 
      id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-bs-backdrop="false">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">

          <div class="text-center mt-3">
            <img 
            src="../resources/AMP-LOGO-2-01-WHITE.png" 
            alt="" class="img-fluid" style="width:4rem;">

            <div class="fw-bold text-uppercase px-3">
              Sistema de cursos sugeridos
            </div>
            
          </div>

          <ul class="navbar-nav">
            <li class="hover-section mb-1">
              <a href="home.php" class="nav-link px-3 mt-4 active home">
                <span class="me-2">
                <i class="bi bi-house-door-fill"></i>
                </span>
                <span class="text-uppercase">Inicio</span>
              </a>
            </li>
            <li class="my-1">
              <hr class="dropdown-divider">
            </li>
            <li class="my-2">
              <div class="text-uppercase text-white text-opacity-50 px-2">
                Registrar
              </div>
            </li>
            <li class="hover-section mb-1">
              <a href="registrar_sugerido.php" class="nav-link px-3 active section-link registrar_sugerido">
                <span class="me-2">
                  <i class="bi bi-journal-text"></i>
                </span>
                <span class="text-uppercase">Cursos sugeridos</span>
              </a>
            </li>
            <li class="my-1">
              <hr class="dropdown-divider">
            </li>
            <li class="my-2">
              <div class="text-uppercase text-white text-opacity-50 px-2">
                Visualizar
              </div>
            </li>
            <li class="hover-section mb-1">
              <a href="visualizar_cargos_trabajadores.php" class="nav-link px-3 active visualizar">
                <span class="me-2">
                  <i class="bi bi-table"></i>
                </span>
                <span class="text-uppercase">Cargos</span>
              </a>
            </li>

            <li class="my-1">
              <hr class="dropdown-divider">
            </li>
            <li class="my-2">
              <div class="text-uppercase text-white text-opacity-50 px-2">
                Administrar
              </div>
            </li>
            <li class="hover-section mb-1">
              <a href="admin_usuarios.php" class="nav-link px-3 active administrar_usuarios">
                <span class="me-2">
                  <i class="bi bi-people-fill"></i>
                </span>
                <span class="text-uppercase">Usuarios</span>
              </a>
            </li>
            <li class="hover-section mb-1">
              <a href="registrar_requerido.php" class="nav-link px-3 active registrar_requerido">
                <span class="me-2">
                  <i class="bi bi-journal-medical"></i>
                </span>
                <span class="text-uppercase">Cursos requeridos</span>
              </a>
            </li>
            <li class="hover-section mb-1">
              <a href="admin_estados.php" class="nav-link px-3 active administrar_estados">
                <span class="me-2">
                <i class="bi bi-clipboard-check"></i>
                </span>
                <span class="text-uppercase">Estados</span>
              </a>
            </li>
            <!-- COLLAPSE -->
<!--
            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="me-2">
                  <i class="bi bi-layout-split"></i>
                </span>
                <span>ADMINISTRAR</span>
                <span class="right-icon ms-auto">
                  <i class="bi bi-chevron-compact-down"></i>
                </span>
              </a>
              <div class="collapse" id="collapseExample">
                <div class="">
                  <div>
                    <ul class="navbar-nav ps-3">
                      <li class="hover-section mb-1">
                        <a href="registrar_requerido.php" class="nav-link px-3 active registrar_requerido">
                          <span class="me-2">
                            <i class="bi bi-journal-medical"></i>
                          </span>
                          <span class="text-uppercase">Curso requerido</span>
                        </a>
                      </li>
                      <li class="hover-section mb-1">
                        <a href="admin_usuarios.php" class="nav-link px-3 active administrar_usuarios">
                          <span class="me-2">
                            <i class="bi bi-people-fill"></i>
                          </span>
                          <span class="text-uppercase">Usuarios</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseVisualizar" role="button" aria-expanded="false" aria-controls="collapseVisualizar">
                <span class="me-2">
                  <i class="bi bi-layout-split"></i>
                </span>
                <span>VISUALIZAR</span>
                <span class="right-icon ms-auto">
                  <i class="bi bi-chevron-compact-down"></i>
                </span>
              </a>
              <div class="collapse" id="collapseVisualizar">
                <div class="">
                  <div>
                    <ul class="navbar-nav ps-3">
                      <li class="hover-section mb-1">
                        <a href="visualizar.php" class="nav-link px-3 active visualizar">
                          <span class="me-2">
                            <i class="bi bi-table"></i>
                          </span>
                          <span class="text-uppercase">Cargos específicos</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseRegistrar" role="button" aria-expanded="false" aria-controls="collapseRegistrar">
                <span class="me-2">
                  <i class="bi bi-layout-split"></i>
                </span>
                <span class="text-uppercase">Registrar</span>
                <span class="right-icon ms-auto">
                  <i class="bi bi-chevron-compact-down"></i>
                </span>
              </a>
              <div class="collapse" id="collapseRegistrar">
                <div class="">
                  <div>
                    <ul class="navbar-nav ps-3">
                      <li class="hover-section mb-1">
                        <a href="registrar_sugerido.php" class="nav-link px-3 active registrar_requerido">
                          <span class="me-2">
                            <i class="bi bi-journal-text"></i>
                          </span>
                          <span class="text-uppercase">Cursos sugeridos</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
-->
             <!-- /COLLAPSE -->
          </ul>
        </nav>
      </div>
    </div>
    <!-- /OFF CANVAS (SIDE NAV)-->