<?php
if(isset($_POST["submit"])){
    include "../classes/dbConnection.class.php";
    include "../classes/CRequeridos.class.php";
    include "../classes/CRequeridosController.php";

    $cursos = $_POST["cursos"];
    $obj = new CRequeridoController($cursos);
    $obj->createNewCourse();

    header("location: ../views/registrar_requerido.php?success=Cursos registrados con éxito.");
}