<?php
if (isset($_POST["id"])) {
    include "../classes/dbConnection.class.php";
    include "../classes/ColaboradorCursos.class.php";
    include "../classes/ColaboradorCursosController.php";

    $id = $_POST["id"];
    $estado = $_POST["estado"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $analisis = $_POST["analisis"];

    $datosEditar = array("estado" => $estado, "fecha_inicio" => $fecha_inicio, "fecha_fin" => $fecha_fin, "id" => $id, "analisis" => $analisis);

    $obj = new ColaboradorCursosController($datosEditar);
    $obj->editarCSugeridoSeleccionado();
}
