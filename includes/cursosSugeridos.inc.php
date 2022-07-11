<?php
include "../classes/dbConnection.class.php";
include "../classes/dbConnection_SqlServer.class.php";
include "../classes/Direcciones.class.php";
include "../classes/DireccionesController.php";
include "../classes/CSugeridos.class.php";
include "../classes/CSugeridosController.php";

$csugeridos = new CSugeridosController("","","","","");
$obj = new DireccionesController();

$cursos_sugeridos = $csugeridos->mostrarTodosLosCursos();
$direcciones = $obj->showDirections();
