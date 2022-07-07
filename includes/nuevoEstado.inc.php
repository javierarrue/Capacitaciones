<?php
if(isset($_POST["submit"])){
    include "../classes/dbConnection.class.php";
    include "../classes/Estados.class.php";
    include "../classes/EstadosController.php";

    $estados = $_POST["estados"];

    $obj = new EstadosController($estados);

    $obj->createNewStatus();
    header("location: ../views/admin_estados.php?success=Cursos registrados con éxito.");
    
}