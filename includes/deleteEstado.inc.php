<?php
if(isset($_POST["estado_id"])){
    include "../classes/dbConnection.class.php";
    include "../classes/Estados.class.php";
    include "../classes/EstadosController.php";

    $estadoId = $_POST["estado_id"];

    $obj = new EstadosController($estadoId);

    $obj->deleteEstado();

    header("location: ../views/admin_estados.php?success=Curso eliminado.");
    
}