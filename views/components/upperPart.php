<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="icon" href="../resources/AMP-LOGO-2-01.png">

    <title>Sistema de Cargos Específicos</title>
  </head>
  <body>

    <!-- TOP NAV BAR-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container-fluid">
      
        <!-- OFF CANVAS BUTTON --> 
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" 
          aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample" ></span>
        </button>
        <!-- /OFF CANVAS BUTTON -->

        <!--
        <a class="navbar-brand fw-bold text-uppercase me-auto ms-1" href="#">SISTEMA DE CARGOS ESPECÍFICOS</a>
        -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown profile">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-uppercase" href="perfil.php">Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-uppercase" href="index.php">Cerrar Sesión</a></li>
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
              SISTEMA DE CARGOS ESPECÍFICOS
            </div>
            
          </div>

          <ul class="navbar-nav">
            <li class="mt-3 mb-2">
              <div class="fw-bold text-uppercase px-3">
                Menú
              </div>
            </li>
            <li class="hover-section mb-1">
              <a href="home.php" class="nav-link px-3 active home">
                <span class="me-2">
                  <i class="bi bi-house-door"></i>
                </span>
                <span class="text-uppercase">Inicio</span>
              </a>
            </li>
            <li class="hover-section mb-1">
              <a href="registrar_sugerido.php" class="nav-link px-3 active section-link registrar_sugerido">
                <span class="me-2">
                  <i class="bi bi-journal-text"></i>
                </span>
                <span class="text-uppercase">Curso sugerido</span>
              </a>
            </li>
            <li class="hover-section mb-1">
              <a href="visualizar.php" class="nav-link px-3 active visualizar">
                <span class="me-2">
                  <i class="bi bi-table"></i>
                </span>
                <span class="text-uppercase">Visualizar</span>
              </a>
            </li>
            <li class="hover-section mb-1">
              <a href="registrar_usuario.php" class="nav-link px-3 active registrar_usuario">
                <span class="me-2">
                  <i class="bi bi-person-plus-fill"></i>
                </span>
                <span class="text-uppercase">Registrar Usuario</span>
              </a>
            </li>
            <li class="hover-section mb-1">
              <a href="admin_usuarios.php" class="nav-link px-3 active administrar_usuarios">
                <span class="me-2">
                  <i class="bi bi-people-fill"></i>
                </span>
                <span class="text-uppercase">Administrar Usuarios</span>
              </a>
            </li>
            <li class="hover-section mb-1">
              <a href="registrar_requerido.php" class="nav-link px-3 active registrar_requerido">
                <span class="me-2">
                  <i class="bi bi-journal-medical"></i>
                </span>
                <span class="text-uppercase">Curso requerido</span>
              </a>
            </li>
            <li class="my-4">
              <hr class="dropdown-divider">
            </li>
            <!-- COLLAPSE -->
            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="me-2">
                  <i class="bi bi-layout-split"></i>
                </span>
                <span>Layouts</span>
                <span class="right-icon ms-auto">
                  <i class="bi bi-chevron-compact-down"></i>
                </span>
              </a>
              <div class="collapse" id="collapseExample">
                <div class="">
                  <div>
                    <ul class="navbar-nav ps-3">
                      <li>
                        <a href="" class="nav-link">
                          <span class="me-2 px-3">
                            <i class="bi bi-layout-split"></i>
                          </span>
                          <span>Layouts</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
             <!-- /COLLAPSE -->
          </ul>
        </nav>
      </div>
    </div>
    <!-- /OFF CANVAS (SIDE NAV)-->
    
    <!-- LINK ACTIVE -->