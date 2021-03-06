<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login-style.css">
</head>
<body>   
    <section class="login">
        <div class="container" >
            <div class="row align-items-center bg-light">
                <!-- Image columna -->
                <div class="col-lg-5 d-none d-lg-block text-center img"> 
                    <!-- <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid"> -->
                </div> 
                <!-- /Image --> 

                <!-- Form columna-->
                <div class="col-lg-7 pb-5"> 
                    <div class="text-center">
                        <img src="../resources/AMP-LOGO-2-01.png" alt="" class="img-fluid" width="80">
                    </div>
                    <h1 class="text-center">Bienvenido</h1>
                    <h5 class="text-center text-muted mb-4">Al Sistema de Cursos sugeridos</h3>
                    <?php if(isset($_GET["error"])){?>
                        <h5 class="text-danger text-center"><?php echo $_GET["error"];?></h5>
                    <?php }?>
                    <form action="../includes/login.inc.php" method="POST">
                        <div class="form-floating col-9 mb-3 mx-auto">
                            <input type="text" placeholder="Usuario" class="form-control" id="user" name="username">
                            <label for="user" class="form-label text-muted">Usuario</label>
                        </div>
                        
                        <div class="form-floating col-9 mb-3 mx-auto">
                            <input type="password" placeholder="Contraseña" class="form-control" id="password" name="password">
                            <label for="password" class="form-label text-muted">Contraseña</label> 
                        </div>

                        <div class="d-grid gap-2 col-9 mx-auto">
                            <input class="btn text-white login-btn text-uppercase" type="submit" value="Acceder" name="submit">
                        </div>
                    </form>
                </div>
                <!-- /Form -->           
            </div>
        </div>
    </section>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
</body>
</html>