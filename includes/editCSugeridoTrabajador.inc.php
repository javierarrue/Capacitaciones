<?php
if(isset($_POST["id"])){
    include "../classes/dbConnection.class.php";
    include "../classes/ColaboradorCursos.class.php";
    include "../classes/ColaboradorCursosController.php";

    $datosEditar = array("estado" => $_POST["estado"], "analisis" => $_POST["analisis"]);

}