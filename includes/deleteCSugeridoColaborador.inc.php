<?php
if(isset($_POST["id"])){
    include "../classes/dbConnection.class.php";
    include "../classes/ColaboradorCursos.class.php";
    include "../classes/ColaboradorCursosController.php";

    $cSugeridosObj = new ColaboradorCursosController($_POST["id"]);
    $cSugeridosObj->eliminarCSugeridoSeleccionado();

    header("location: ../views/visualizar_detalles.php?cedula=".$_POST["cedula"]."&success=Curso eliminado con éxito.");
}